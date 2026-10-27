<script setup>
import { onMounted, onUnmounted, ref } from 'vue';

// Dark warp burst: warm light streaks erupt from a dark core, with drifting bokeh and pointer parallax.
const props = defineProps({ focusX: { type: Number, default: 0.64 }, focusY: { type: Number, default: 0.48 } });
const canvas = ref(null);
const root = ref(null);

const COLORS = ['255,70,40', '255,120,30', '255,170,40', '255,215,90', '235,35,45', '255,245,200', '255,95,60'];
let ctx, w, h, dpr, raf, io, visible = true, core;
let streaks = [], bokeh = [];
const pointer = { x: 0, y: 0, tx: 0, ty: 0 };

const spawn = (p = {}, fresh = false) => {
    p.a = Math.random() * Math.PI * 2;
    p.d = core + (fresh ? Math.random() * Math.max(w, h) * 0.8 : Math.random() * 30);
    p.v = 0.6 + Math.random() * 2.4;
    p.c = COLORS[(Math.random() * COLORS.length) | 0];
    p.wd = 0.4 + Math.random() * 1.8;
    return p;
};

const resize = () => {
    dpr = Math.min(window.devicePixelRatio || 1, 2);
    w = root.value.clientWidth;
    h = root.value.clientHeight;
    core = Math.min(w, h) * 0.11;
    canvas.value.width = w * dpr;
    canvas.value.height = h * dpr;
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    streaks = Array.from({ length: Math.round(Math.min(1400, (w * h) / 900)) }, () => spawn({}, true));
    bokeh = Array.from({ length: 26 }, () => ({
        x: Math.random() * w, y: Math.random() * h, r: 4 + Math.random() * 22,
        vx: (Math.random() - 0.5) * 0.25, vy: (Math.random() - 0.5) * 0.25,
        c: COLORS[(Math.random() * COLORS.length) | 0], o: 0.05 + Math.random() * 0.18,
    }));
};

const draw = (animate = true) => {
    pointer.x += (pointer.tx - pointer.x) * 0.05;
    pointer.y += (pointer.ty - pointer.y) * 0.05;
    const fx = w * props.focusX + pointer.x * 30;
    const fy = h * props.focusY + pointer.y * 20;

    // Deep red field with a dark "eye" at the core
    const bg = ctx.createRadialGradient(fx, fy, 0, fx, fy, Math.hypot(w, h) * 0.7);
    bg.addColorStop(0, '#0a0102');
    bg.addColorStop(core / (Math.hypot(w, h) * 0.7), '#140304');
    bg.addColorStop(0.28, '#5c0d0a');
    bg.addColorStop(0.6, '#3a0807');
    bg.addColorStop(1, '#160203');
    ctx.globalCompositeOperation = 'source-over';
    ctx.fillStyle = bg;
    ctx.fillRect(0, 0, w, h);

    ctx.globalCompositeOperation = 'lighter';
    for (const b of bokeh) {
        if (animate) { b.x += b.vx; b.y += b.vy; }
        const g = ctx.createRadialGradient(b.x, b.y, 0, b.x, b.y, b.r);
        g.addColorStop(0, `rgba(${b.c},${b.o})`);
        g.addColorStop(1, `rgba(${b.c},0)`);
        ctx.fillStyle = g;
        ctx.beginPath();
        ctx.arc(b.x, b.y, b.r, 0, Math.PI * 2);
        ctx.fill();
    }

    const maxD = Math.hypot(w, h) * 0.8;
    for (const p of streaks) {
        const prev = p.d;
        if (animate) { p.v *= 1.018; p.d += p.v; }
        if (p.d > maxD) spawn(p);
        const cos = Math.cos(p.a), sin = Math.sin(p.a);
        const tail = Math.max(6, (p.d - prev) * 14);
        const t = (p.d - core) / (maxD - core);
        const alpha = Math.min(1, t * 6) * (1 - t * 0.85) * 0.9;
        ctx.strokeStyle = `rgba(${p.c},${alpha})`;
        ctx.lineWidth = p.wd * (0.5 + t * 2.4);
        ctx.beginPath();
        ctx.moveTo(fx + cos * Math.max(core, p.d - tail), fy + sin * Math.max(core, p.d - tail));
        ctx.lineTo(fx + cos * p.d, fy + sin * p.d);
        ctx.stroke();
    }
    ctx.globalCompositeOperation = 'source-over';

    if (animate && visible) raf = requestAnimationFrame(() => draw(true));
};

const onPointer = (e) => {
    pointer.tx = (e.clientX / window.innerWidth - 0.5) * 2;
    pointer.ty = (e.clientY / window.innerHeight - 0.5) * 2;
};

onMounted(() => {
    ctx = canvas.value.getContext('2d');
    resize();
    if (matchMedia('(prefers-reduced-motion: reduce)').matches) {
        draw(false);
        return;
    }
    window.addEventListener('resize', resize);
    window.addEventListener('pointermove', onPointer, { passive: true });
    io = new IntersectionObserver(([e]) => {
        visible = e.isIntersecting;
        cancelAnimationFrame(raf);
        if (visible) draw(true);
    });
    io.observe(root.value);
});

onUnmounted(() => {
    cancelAnimationFrame(raf);
    io?.disconnect();
    window.removeEventListener('resize', resize);
    window.removeEventListener('pointermove', onPointer);
});
</script>

<template>
    <div ref="root" class="absolute inset-0 overflow-hidden bg-[#1a0303]" aria-hidden="true">
        <canvas ref="canvas" class="absolute inset-0 h-full w-full" />
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_40%,rgba(0,0,0,.45)_100%)]" />
    </div>
</template>
