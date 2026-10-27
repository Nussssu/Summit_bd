<script setup>
import { computed, ref } from 'vue';
import { useScrollProgress } from '@/composables/useScrollProgress';

// Two rows of imagery that slide in opposite directions as the page scrolls.
const props = defineProps({ images: Array });
const el = ref(null);
const p = useScrollProgress(el);
const half = Math.ceil(props.images.length / 2);
const rows = computed(() => [
    { items: props.images.slice(0, half), x: -p.value * 30 },
    { items: props.images.slice(half), x: -30 + p.value * 30 },
]);
</script>

<template>
    <section ref="el" class="overflow-hidden bg-white py-10 sm:py-16" aria-label="Representative imagery">
        <div v-for="(row, ri) in rows" :key="ri" class="flex w-max gap-4 will-change-transform sm:gap-6" :class="ri && 'mt-4 sm:mt-6'" :style="{ transform: `translate3d(${row.x}%,0,0)` }">
            <figure
                v-for="(img, i) in [...row.items, ...row.items]" :key="i"
                :class="['group relative shrink-0 overflow-hidden rounded-[1.5rem]', (i + ri) % 3 === 0 ? 'h-48 w-80 sm:h-72 sm:w-[30rem]' : 'h-48 w-60 sm:h-72 sm:w-[22rem]']"
            >
                <img :src="img.src" :alt="img.alt" loading="lazy" class="h-full w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-110" />
                <figcaption class="absolute inset-x-0 bottom-0 translate-y-full bg-gradient-to-t from-ink/80 to-transparent p-5 text-sm font-semibold text-white transition-transform duration-500 group-hover:translate-y-0">{{ img.alt }}</figcaption>
            </figure>
        </div>
        <p class="container-x mt-6 text-right text-xs text-muted">Representative stock imagery · Unsplash</p>
    </section>
</template>
