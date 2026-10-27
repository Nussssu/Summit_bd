<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    variant: { type: String, default: 'primary' },
    size: { type: String, default: 'md' },
});

// Literal class names so Tailwind keeps them when scanning sources.
const variants = { primary: 'btn-primary', secondary: 'btn-secondary', ghost: 'btn-ghost', gold: 'btn-gold', dark: 'btn-dark' };
const sizes = { sm: 'btn-sm', md: 'btn-md', lg: 'btn-lg' };
const cls = computed(() => ['btn', variants[props.variant], sizes[props.size]]);
</script>

<template>
    <Link v-if="href" :href="href" :class="cls"><slot /></Link>
    <button v-else type="button" :class="cls"><slot /></button>
</template>
