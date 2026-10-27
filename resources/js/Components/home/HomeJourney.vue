<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';
import { ArrowRight } from '@lucide/vue';
import AppButton from '@/Components/ui/AppButton.vue';
import CountUp from '@/Components/ui/CountUp.vue';
import { useScrollProgress } from '@/composables/useScrollProgress';

const props = defineProps({ divisions: Array, phases: Array });

/* ---------- Geometry (schematic, not to scale) ---------- */
const outline = [
    [88.45, 26.6], [88.95, 26.25], [89.1, 25.95], [89.85, 25.95], [89.85, 25.3], [90.6, 25.18], [91.2, 25.2], [92.0, 25.1],
    [92.45, 24.85], [92.3, 24.3], [91.9, 24.15], [91.4, 24.1], [91.15, 23.6], [91.35, 23.1], [91.6, 22.95], [91.85, 23.4],
    [92.2, 23.6], [92.35, 23.0], [92.6, 22.0], [92.6, 21.4], [92.3, 20.7], [92.0, 21.2], [91.85, 22.0], [91.7, 22.5],
    [91.4, 22.7], [90.9, 22.6], [90.5, 22.1], [90.1, 21.9], [89.6, 21.8], [89.1, 21.65], [88.95, 22.6], [88.9, 23.2],
    [88.6, 23.6], [88.7, 24.1], [88.1, 24.5], [88.05, 24.9], [88.4, 25.2], [88.1, 25.8], [88.2, 26.2],
];
const project = ([lon, lat]) => [(lon - 87.9) * 78 + 10, (26.75 - lat) * 78 + 10];
const poly = outline.map(project);
const outlinePath = `M${poly.map((p) => p.map((n) => n.toFixed(1)).join(',')).join('L')}Z`;

const inside = ([x, y]) => {
    let hit = false;
    for (let i = 0, j = poly.length - 1; i < poly.length; j = i++) {
        const [xi, yi] = poly[i], [xj, yj] = poly[j];
        if (yi > y !== yj > y && x < ((xj - xi) * (y - yi)) / (yj - yi) + xi) hit = !hit;
    }
    return hit;
};
// Deterministic pseudo-random so the illustrative layout is stable between renders.
const rng = (seed) => () => ((seed = (seed * 16807) % 2147483647) - 1) / 2147483646;
const scatter = (count, seed, minGap) => {
    const rand = rng(seed), pts = [];
    for (let tries = 0; pts.length < count && tries < 20000; tries++) {
        const p = [30 + rand() * 340, 20 + rand() * 450];
        if (inside(p) && pts.every((q) => Math.hypot(q[0] - p[0], q[1] - p[1]) > minGap)) pts.push(p);
    }
    return pts;
};
const campuses = scatter(100, 7, 13);
const roadshows = scatter(12, 99, 55);

const pins = props.divisions.map((d) => ({ ...d, xy: project([d.lon, d.lat]) }));
const hub = pins.find((d) => d.grand).xy;
const routes = pins.filter((d) => !d.grand).map((d) => {
    const [x1, y1] = d.xy, [x2, y2] = hub;
    const mx = (x1 + x2) / 2, my = (y1 + y2) / 2, len = Math.hypot(x2 - x1, y2 - y1);
    const cx = mx + (-(y2 - y1) / len) * len * 0.22, cy = my + ((x2 - x1) / len) * len * 0.22;
    return { slug: d.slug, d: `M${x1},${y1} Q${cx.toFixed(1)},${cy.toFixed(1)} ${x2},${y2}` };
});

/* ---------- Scroll story ---------- */
const story = ref(null);
const p = useScrollProgress(story, { mode: 'sticky' });
const clamp = (v) => Math.min(1, Math.max(0, v));
const phase = computed(() => Math.min(3, Math.floor(p.value * 4)));
const local = (i) => clamp((p.value - i * 0.25) / 0.2); // 0→1 within phase i

const campusShown = computed(() => Math.round(100 * local(0)));
const counter = computed(() => [100, 12, 8, 1][phase.value]);
const counterLabel = computed(() => props.phases[phase.value]?.title);

/* ---------- Enter draw + pointer tilt ---------- */
const entered = ref(false);
const tilt = ref({ x: 0, y: 0 });
const stage = ref(null);
let io;
const onMove = (e) => {
    const r = stage.value.getBoundingClientRect();
    tilt.value = { x: ((e.clientY - r.top) / r.height - 0.5) * -8, y: ((e.clientX - r.left) / r.width - 0.5) * 10 };
};
onMounted(() => {
    io = new IntersectionObserver(([e]) => e.isIntersecting && ((entered.value = true), io.disconnect()), { threshold: 0.15 });
    io.observe(stage.value);
});
onUnmounted(() => io?.disconnect());

const phaseColor = ['#00B8D9', '#10B981', '#2563EB', '#E11D48'];
</script>

<template>
    <section ref="story" class="relative h-[420vh] bg-canvas">
        <div class="sticky top-0 flex h-[100svh] items-center overflow-hidden">
            <div class="absolute inset-0 bg-grid opacity-60 mask-fade-b" />
            <div class="absolute top-1/2 right-[18%] h-[38rem] w-[38rem] -translate-y-1/2 rounded-full blur-3xl transition-colors duration-1000" :style="{ background: `${phaseColor[phase]}14` }" />

            <div class="relative container-x grid w-full items-center gap-6 pt-16 lg:grid-cols-[0.9fr_1.1fr] lg:gap-12">
                <!-- Narrative -->
                <div class="order-2 lg:order-1">
                    <p class="eyebrow"><span class="h-px w-8 bg-current" />The National Journey</p>
                    <h2 class="mt-4 hidden text-4xl leading-[1.05] font-extrabold sm:text-5xl lg:block">From 100 campuses<br />to one grand stage.</h2>

                    <ol class="mt-4 space-y-1 lg:mt-10">
                        <li v-for="(ph, i) in phases" :key="ph.title" :class="['relative pl-6 transition-all duration-500', phase === i ? 'opacity-100' : 'hidden opacity-35 lg:block']">
                            <span class="absolute top-0 left-0 h-full w-[3px] overflow-hidden rounded-full bg-line">
                                <span class="block w-full rounded-full transition-[height] duration-150" :style="{ height: `${(phase > i ? 1 : phase === i ? local(i) : 0) * 100}%`, background: phaseColor[i] }" />
                            </span>
                            <div class="py-3">
                                <p class="text-xs font-bold tracking-[0.16em] uppercase" :style="{ color: phaseColor[i] }">Phase 0{{ i + 1 }} · {{ ph.count }}</p>
                                <h3 :class="['font-display font-extrabold transition-all duration-500', phase === i ? 'text-2xl sm:text-3xl' : 'text-xl']">{{ ph.title }}</h3>
                                <p :class="['grid transition-all duration-500', phase === i ? 'mt-2 grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0']">
                                    <span class="overflow-hidden leading-relaxed">{{ ph.desc }}</span>
                                </p>
                            </div>
                        </li>
                    </ol>
                    <AppButton href="/national-journey" variant="secondary" class="mt-6 hidden lg:inline-flex">Journey dashboard<ArrowRight class="h-4 w-4" /></AppButton>
                </div>

                <!-- Map stage -->
                <div ref="stage" class="order-1 mx-auto w-full max-w-[min(480px,52svh)] [perspective:1200px] lg:order-2 lg:max-w-[min(560px,78svh)]" @pointermove="onMove" @pointerleave="tilt = { x: 0, y: 0 }">
                    <div class="relative transition-transform duration-300 ease-out [transform-style:preserve-3d]" :style="{ transform: `rotateX(${tilt.x}deg) rotateY(${tilt.y}deg)` }">
                        <svg viewBox="0 0 400 490" class="w-full overflow-visible drop-shadow-[0_30px_40px_rgba(37,99,235,0.12)]" role="img" aria-label="Schematic map of Bangladesh showing the campaign journey">
                            <defs>
                                <clipPath id="bd-clip"><path :d="outlinePath" /></clipPath>
                                <pattern id="bd-dots" width="9" height="9" patternUnits="userSpaceOnUse"><circle cx="4.5" cy="4.5" r="1.1" fill="#93C5FD" /></pattern>
                                <linearGradient id="bd-fill" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#EFF6FF" /><stop offset="1" stop-color="#ECFDF5" /></linearGradient>
                                <linearGradient id="bd-sweep" x1="0" x2="1" y1="0" y2="0">
                                    <stop offset="0" stop-color="#fff" stop-opacity="0" /><stop offset=".5" stop-color="#fff" stop-opacity=".9" /><stop offset="1" stop-color="#fff" stop-opacity="0" />
                                </linearGradient>
                                <radialGradient id="hub-glow"><stop offset="0" stop-color="#E11D48" stop-opacity=".45" /><stop offset="1" stop-color="#E11D48" stop-opacity="0" /></radialGradient>
                            </defs>

                            <!-- Land: fill, digital dot matrix, light sweep -->
                            <path :d="outlinePath" fill="url(#bd-fill)" :class="['transition-opacity duration-[1500ms] delay-700', entered ? 'opacity-100' : 'opacity-0']" />
                            <g clip-path="url(#bd-clip)" :class="['transition-opacity duration-[1500ms] delay-1000', entered ? 'opacity-70' : 'opacity-0']">
                                <rect width="400" height="490" fill="url(#bd-dots)" />
                                <rect x="-200" y="0" width="160" height="490" fill="url(#bd-sweep)" transform="skewX(-20)">
                                    <animate attributeName="x" from="-260" to="560" dur="4.5s" repeatCount="indefinite" />
                                </rect>
                            </g>
                            <path :d="outlinePath" pathLength="1" fill="none" stroke="#2563EB" stroke-width="2" stroke-linejoin="round" stroke-dasharray="1" :stroke-dashoffset="entered ? 0 : 1" class="transition-[stroke-dashoffset] duration-[2200ms] ease-out" />

                            <!-- Phase 1: campuses -->
                            <g>
                                <circle
                                    v-for="(c, i) in campuses" :key="`c${i}`" :cx="c[0]" :cy="c[1]" r="3.2" fill="#00B8D9"
                                    :class="['origin-center transition-all duration-500 [transform-box:fill-box]', i < campusShown ? 'scale-100' : 'scale-0']"
                                    :opacity="phase === 0 ? 0.9 : 0.25"
                                />
                            </g>

                            <!-- Phase 2: roadshows -->
                            <g v-for="(r, i) in roadshows" :key="`r${i}`" :transform="`translate(${r[0]} ${r[1]})`">
                                <g :class="['origin-center transition-all duration-500 [transform-box:fill-box]', local(1) * 12 > i ? 'scale-100 opacity-100' : 'scale-0 opacity-0']" :style="{ transitionDelay: `${(i % 4) * 40}ms` }">
                                    <circle v-if="phase === 1" r="14" fill="#10B981" opacity=".2" class="origin-center animate-ping-soft [transform-box:fill-box]" />
                                    <rect x="-5.5" y="-5.5" width="11" height="11" rx="2.5" transform="rotate(45)" :fill="phase === 1 ? '#10B981' : '#A7F3D0'" stroke="#fff" stroke-width="1.5" />
                                </g>
                            </g>

                            <!-- Phase 3–4: routes to Dhaka -->
                            <path
                                v-for="(r, i) in routes" :key="r.slug" :d="r.d" pathLength="1" fill="none"
                                :stroke="phase === 3 ? '#E11D48' : '#2563EB'" stroke-width="2" stroke-linecap="round" stroke-opacity=".7"
                                stroke-dasharray="1" :stroke-dashoffset="1 - clamp((p - 0.5 - i * 0.012) / 0.2)"
                                class="transition-[stroke] duration-700"
                            />
                            <template v-if="phase === 3">
                                <circle v-for="(r, i) in routes" :key="`m${r.slug}`" r="4" fill="#E11D48">
                                    <animateMotion :path="r.d" dur="1.6s" :begin="`${i * 0.2}s`" repeatCount="indefinite" calcMode="spline" keyTimes="0;1" keySplines=".4 0 .6 1" />
                                </circle>
                            </template>

                            <!-- Division pins -->
                            <g v-for="(d, i) in pins" :key="d.slug" :transform="`translate(${d.xy[0]} ${d.xy[1]})`">
                                <g :class="['transition-all duration-700 ease-[cubic-bezier(.34,1.56,.64,1)]', (d.grand ? phase >= 2 : local(2) * 8 > i) ? 'translate-y-0 opacity-100' : '-translate-y-6 opacity-0']">
                                    <title>{{ d.name }}{{ d.grand ? ' — Grand Summit' : ' — Divisional Summit' }}</title>
                                    <template v-if="d.grand">
                                        <circle r="60" fill="url(#hub-glow)" :class="['transition-opacity duration-700', phase === 3 ? 'opacity-100' : 'opacity-0']" />
                                        <circle v-for="k in 3" :key="k" r="14" fill="none" stroke="#E11D48" stroke-width="1.5" class="origin-center animate-ping-soft [transform-box:fill-box]" :style="{ animationDelay: `${k * 0.6}s` }" />
                                        <circle :r="phase === 3 ? 13 : 10" fill="#E11D48" stroke="#fff" stroke-width="3" class="transition-all duration-500" />
                                    </template>
                                    <template v-else>
                                        <path d="M0 0 C-7 -9 -9 -13 -9 -17 A9 9 0 1 1 9 -17 C9 -13 7 -9 0 0Z" :fill="phase === 2 ? '#2563EB' : '#fff'" stroke="#2563EB" stroke-width="2" />
                                        <circle cy="-17" r="3.2" :fill="phase === 2 ? '#fff' : '#2563EB'" />
                                    </template>
                                    <text :x="d.grand ? -20 : 0" :y="d.grand ? 5 : -32" :text-anchor="d.grand ? 'end' : 'middle'" class="fill-ink font-sans text-[12px] font-bold select-none" paint-order="stroke" stroke="#fff" stroke-width="4">{{ d.name }}</text>
                                </g>
                            </g>
                        </svg>

                        <!-- Live counter -->
                        <div class="absolute bottom-0 left-0 rounded-2xl border border-line bg-white/90 px-5 py-3 shadow-lift backdrop-blur [transform:translateZ(40px)]">
                            <Transition mode="out-in" enter-active-class="transition duration-300" enter-from-class="opacity-0 translate-y-2" leave-active-class="transition duration-150" leave-to-class="opacity-0 -translate-y-2">
                                <div :key="phase">
                                    <p class="font-display text-4xl font-extrabold sm:text-5xl" :style="{ color: phaseColor[phase] }"><CountUp :to="counter" :duration="700" /></p>
                                    <p class="text-xs font-semibold text-muted">{{ counterLabel }}</p>
                                </div>
                            </Transition>
                        </div>
                    </div>
                    <p class="mt-1 text-center text-[11px] text-muted">Schematic map · campus & roadshow positions are illustrative</p>
                </div>
            </div>

            <!-- Scroll progress rail -->
            <div class="absolute bottom-6 left-1/2 flex -translate-x-1/2 gap-2" aria-hidden="true">
                <span v-for="i in 4" :key="i" class="h-1.5 rounded-full transition-all duration-500" :class="phase === i - 1 ? 'w-8' : 'w-1.5 bg-slate-300'" :style="phase === i - 1 ? { background: phaseColor[i - 1] } : {}" />
            </div>
        </div>
    </section>
</template>
