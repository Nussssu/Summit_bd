<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import Marquee from '@/Components/ui/Marquee.vue';
import HeroWarp from '@/Components/home/HeroWarp.vue';

defineProps({ ticker: Array });
const { grand_summit: gs, ctas } = usePage().props.site;
</script>

<template>
    <section class="relative flex h-[100svh] min-h-[600px] flex-col overflow-hidden bg-[#1a0303] text-white">
        <HeroWarp />

        <!-- Edition lockup (sits under the logo, like the reference) -->
        <p class="fade-in absolute top-[5.25rem] left-0 z-10 w-full" style="--d: 200ms">
            <span class="container-x flex items-center gap-3 font-condensed text-lg tracking-[0.08em] text-white/85 sm:text-xl">
                <span class="h-px w-6 bg-white/50" />{{ gs.date_label }}<span class="text-white/40">·</span>{{ gs.city }}<span v-if="!gs.confirmed" class="font-sans text-[10px] font-semibold tracking-widest text-hero-yellow uppercase">Tentative</span>
            </span>
        </p>

        <div class="relative container-x flex flex-1 flex-col justify-center">
            <h1 class="relative pt-10 font-condensed leading-[0.88] font-normal tracking-[0.005em] text-white uppercase drop-shadow-[0_4px_30px_rgba(0,0,0,.35)]">
                <span class="rise block"><span class="text-[clamp(3rem,7.6vw,7.4rem)]" style="--d: 300ms">Empowering Bangladesh’s</span></span>
                <span class="rise block"><span class="text-[clamp(3rem,7.6vw,7.4rem)]" style="--d: 450ms">Next-Gen Digital Workforce</span></span>
            </h1>
            <p class="fade-in -mt-2 pl-[8%] font-script text-[clamp(2.6rem,6.4vw,6.2rem)] leading-none text-white sm:-mt-4 sm:pl-[14%]" style="--d: 800ms">
                &amp; AI Pioneers
            </p>
        </div>

        <!-- CTAs bottom-right -->
        <div class="fade-in relative container-x flex flex-wrap justify-end gap-3 pb-8 sm:gap-4 sm:pb-10" style="--d: 1000ms">
            <Link :href="ctas.exhibit.href" class="hero-pill">Exhibit Now</Link>
            <Link :href="ctas.register.href" class="hero-pill">Register Now</Link>
        </div>

        <!-- Latest news ticker -->
        <div class="relative z-10 flex items-center bg-black/55 backdrop-blur-sm">
            <span class="shrink-0 px-5 py-3 font-sans text-sm font-bold whitespace-nowrap text-white sm:px-10 sm:text-base">Latest News</span>
            <Marquee fast class="flex-1">
                <span v-for="(item, i) in ticker" :key="i" class="flex items-center py-3 text-sm whitespace-nowrap text-white/90">
                    <span class="px-5">{{ item }}</span><span class="h-5 w-[3px] bg-hero-yellow" />
                </span>
            </Marquee>
        </div>
    </section>
</template>
