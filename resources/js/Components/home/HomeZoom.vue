<script setup>
import { computed, ref } from 'vue';
import { useScrollProgress } from '@/composables/useScrollProgress';
import CountUp from '@/Components/ui/CountUp.vue';

// Sticky image that expands from an inset card to full-bleed, then reveals the statement.
const stats = [
    { value: 2, label: 'Days' },
    { value: 4, label: 'Programme tracks' },
    { value: 6, label: 'Experiences' },
    { value: 1, label: 'Awards night' },
];
const el = ref(null);
const p = useScrollProgress(el, { mode: 'sticky' });
const grow = computed(() => Math.min(1, p.value / 0.55));
const ease = (t) => 1 - Math.pow(1 - t, 3);
const clip = computed(() => {
    const g = ease(grow.value);
    return `inset(${(1 - g) * 14}% ${(1 - g) * 22}% round ${(1 - g) * 40}px)`;
});
const textIn = computed(() => Math.min(1, Math.max(0, (p.value - 0.45) / 0.25)));
</script>

<template>
    <section ref="el" class="relative h-[260vh] bg-white">
        <div class="sticky top-0 h-[100svh] overflow-hidden">
            <div class="absolute inset-0 will-change-[clip-path]" :style="{ clipPath: clip }">
                <img src="/images/stock/arena.jpg" alt="A large audience facing a lit conference stage" class="h-full w-full object-cover" :style="{ transform: `scale(${1.25 - grow * 0.25})` }" />
                <div class="absolute inset-0 bg-gradient-to-t from-ink/85 via-ink/40 to-ink/10" :style="{ opacity: 0.3 + textIn * 0.7 }" />
            </div>

            <div class="relative container-x flex h-full flex-col justify-end pb-16 sm:pb-24" :style="{ opacity: textIn, transform: `translateY(${(1 - textIn) * 40}px)` }">
                <p class="eyebrow text-sky-500"><span class="h-px w-8 bg-current" />The Grand Dhaka Summit</p>
                <h2 class="mt-4 max-w-4xl text-4xl leading-[1.05] font-extrabold text-balance text-white sm:text-6xl">One stage for the nation’s freelancers, founders and future leaders.</h2>
                <dl class="mt-10 grid max-w-3xl grid-cols-2 gap-6 border-t border-white/20 pt-8 sm:grid-cols-4">
                    <div v-for="s in stats" :key="s.label">
                        <dd class="font-display text-4xl font-extrabold text-white"><CountUp :to="s.value" /></dd>
                        <dt class="mt-1 text-sm text-slate-300">{{ s.label }}</dt>
                    </div>
                </dl>
            </div>
            <p class="absolute right-4 bottom-4 text-[11px] text-white/60">Representative imagery</p>
        </div>
    </section>
</template>
