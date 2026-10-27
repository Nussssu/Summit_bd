<script setup>
import { Link } from '@inertiajs/vue3';
import { ChevronRight } from '@lucide/vue';

defineProps({ eyebrow: String, title: String, desc: String });
</script>

<template>
    <section class="relative overflow-hidden border-b border-line bg-canvas">
        <div class="absolute inset-0 bg-grid mask-fade-b" />
        <div class="absolute -top-32 -right-32 h-96 w-96 animate-float rounded-full bg-brand-100/70 blur-3xl" />
        <div class="relative container-x pt-36 pb-16 sm:pb-20">
            <nav aria-label="Breadcrumb" class="fade-in">
                <ol class="flex items-center gap-1.5 text-xs text-muted">
                    <li><Link href="/" class="hover:text-brand-600">Home</Link></li>
                    <li class="flex items-center gap-1.5"><ChevronRight class="h-3 w-3" />{{ title }}</li>
                </ol>
            </nav>
            <p v-if="eyebrow" class="eyebrow fade-in mt-6" style="--d: 100ms"><span class="h-px w-8 bg-current" />{{ eyebrow }}</p>
            <h1 class="mt-4 max-w-3xl text-4xl font-extrabold text-balance sm:text-6xl">
                <span class="rise"><span style="--d: 150ms">{{ title }}</span></span>
            </h1>
            <p v-if="desc" class="fade-in mt-5 max-w-2xl text-lg leading-relaxed" style="--d: 350ms">{{ desc }}</p>
        </div>
    </section>
</template>
