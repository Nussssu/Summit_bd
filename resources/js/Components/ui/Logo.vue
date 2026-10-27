<script setup>
import { Link, usePage } from '@inertiajs/vue3';

defineProps({ light: Boolean });
const { edition } = usePage().props.site;
</script>

<template>
    <Link href="/" class="group flex items-center gap-3" :aria-label="`${edition.name} ${edition.year} home`">
        <svg viewBox="0 0 64 64" class="h-10 w-10 transition-transform duration-500 group-hover:rotate-[8deg]" aria-hidden="true">
            <rect width="64" height="64" rx="16" fill="#2563EB" />
            <circle cx="38" cy="32" r="12" fill="#10B981" />
            <path d="M20 46V18h18" stroke="#fff" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M20 32h12" stroke="#fff" stroke-width="6" stroke-linecap="round" />
        </svg>
        <span class="leading-none">
            <span :class="['block font-display text-[15px] font-extrabold tracking-tight transition-colors duration-500', light ? 'text-white' : 'text-ink']">Freelancer Summit</span>
            <span :class="['mt-1 block text-[11px] font-semibold tracking-[0.2em] uppercase transition-colors duration-500', light ? 'text-hero-yellow' : 'text-brand-600']">Bangladesh {{ edition.year }}</span>
        </span>
    </Link>
</template>
