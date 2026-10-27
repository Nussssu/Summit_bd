<script setup>
import { Head } from '@inertiajs/vue3';
import { Compass, House } from '@lucide/vue';
import AppButton from '@/Components/ui/AppButton.vue';
</script>

<template>
    <Head title="Page not found" />
    <section class="relative overflow-hidden bg-white">
        <div class="absolute inset-0 bg-grid mask-fade-b" />
        <div class="relative container-x flex min-h-[80vh] flex-col items-center justify-center pt-28 pb-20 text-center">
            <p class="text-gradient animate-shine font-display text-8xl font-extrabold sm:text-9xl">404</p>
            <h1 class="mt-4 text-3xl font-bold">This page took a different route.</h1>
            <p class="mt-3 max-w-md">The page you’re looking for doesn’t exist or has moved.</p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <AppButton href="/"><House class="h-4 w-4" />Go home</AppButton>
                <AppButton href="/national-journey" variant="secondary"><Compass class="h-4 w-4" />Explore the journey</AppButton>
            </div>
        </div>
    </section>
</template>
