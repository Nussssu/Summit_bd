<script setup>
import { usePage } from '@inertiajs/vue3';
import { ArrowRight } from '@lucide/vue';
import AppButton from '@/Components/ui/AppButton.vue';

const { edition, ctas } = usePage().props.site;
</script>

<template>
    <section class="bg-white py-20">
        <div class="container-x">
            <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-brand-600 via-brand-700 to-ink px-6 py-16 text-center sm:px-12 lg:py-24" v-reveal="'zoom'">
                <img src="/images/stock/arena.jpg" alt="" loading="lazy" class="absolute inset-0 h-full w-full object-cover opacity-25 mix-blend-luminosity" />
                <div class="absolute inset-0 bg-grid opacity-20 invert" />
                <div class="absolute -bottom-32 left-1/2 h-72 w-[40rem] -translate-x-1/2 animate-float rounded-full bg-sky-500/30 blur-3xl" />
                <div class="absolute -top-16 -right-16 h-48 w-48 rounded-full bg-bdred/40 blur-2xl" />
                <div class="relative mx-auto max-w-3xl">
                    <h2 class="text-4xl font-extrabold text-balance text-white sm:text-6xl">Be part of {{ edition.year }}’s biggest digital workforce movement.</h2>
                    <p class="mt-6 text-lg text-blue-100">Register to attend, nominate a freelancer, or partner with the summit.</p>
                    <div class="mt-10 flex flex-wrap justify-center gap-3">
                        <AppButton :href="ctas.register.href" variant="secondary" size="lg">{{ ctas.register.label }}<ArrowRight class="h-4 w-4" /></AppButton>
                        <AppButton :href="ctas.sponsor.href" size="lg" class="bg-white/10! text-white ring-1 ring-white/30 shadow-none! hover:bg-white/20!">{{ ctas.sponsor.label }}</AppButton>
                    </div>
                </div>
            </div>
            <p class="mt-6 text-center text-xs text-muted">Dates, venue, speakers, figures and stories shown are placeholders until officially confirmed.</p>
        </div>
    </section>
</template>
