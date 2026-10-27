<script setup>
import { onMounted, onUnmounted, ref } from 'vue';

// Animates from 0 to `to` the first time it scrolls into view.
const props = defineProps({ to: { type: Number, required: true }, duration: { type: Number, default: 1800 } });
const el = ref(null);
const value = ref(0);
let io;

const run = () => {
    const start = performance.now();
    const step = (now) => {
        const p = Math.min(1, (now - start) / props.duration);
        value.value = Math.round(props.to * (1 - Math.pow(1 - p, 4)));
        if (p < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
};

onMounted(() => {
    if (!('IntersectionObserver' in window) || matchMedia('(prefers-reduced-motion: reduce)').matches) {
        value.value = props.to;
        return;
    }
    io = new IntersectionObserver(([e]) => e.isIntersecting && (run(), io.disconnect()), { threshold: 0.4 });
    io.observe(el.value);
});
onUnmounted(() => io?.disconnect());
</script>

<template>
    <span ref="el" class="tabular-nums">{{ value }}</span>
</template>
