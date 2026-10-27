<script setup>
import { computed, ref } from 'vue';
import { useScrollProgress } from '@/composables/useScrollProgress';

// Words light up one by one as the block scrolls through the viewport.
const props = defineProps({ text: String, accentFrom: { type: Number, default: -1 }, accentTo: { type: Number, default: Infinity } });
const el = ref(null);
const p = useScrollProgress(el);
const words = computed(() => props.text.split(' '));
const lit = computed(() => Math.min(1, Math.max(0, (p.value - 0.15) / 0.4)) * words.value.length);
</script>

<template>
    <p ref="el" :aria-label="text">
        <span
            v-for="(w, i) in words" :key="i" aria-hidden="true"
            :class="['transition-[opacity,color] duration-300', accentFrom > -1 && i >= accentFrom && i <= accentTo ? 'text-brand-600' : '']"
            :style="{ opacity: i < lit ? 1 : 0.15 }"
        >{{ w }}{{ ' ' }}</span>
    </p>
</template>
