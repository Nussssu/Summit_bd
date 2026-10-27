<script setup>
import { ref } from 'vue';
import { ArrowRight } from '@lucide/vue';
import AppButton from '@/Components/ui/AppButton.vue';
import DynIcon from '@/Components/ui/DynIcon.vue';
import { useScrollProgress } from '@/composables/useScrollProgress';

defineProps({ benefits: Array });
const el = ref(null);
const p = useScrollProgress(el);
</script>

<template>
    <section ref="el" class="overflow-hidden bg-white section-y">
        <div class="container-x grid items-center gap-14 lg:grid-cols-2 lg:gap-20">
            <div v-reveal="'left'">
                <p class="eyebrow text-leaf-700"><span class="h-px w-8 bg-current" />BACCO Freelancer Forum</p>
                <h2 class="mt-5 text-3xl leading-[1.1] font-extrabold text-balance sm:text-5xl">A professional home for freelancers, long after the summit.</h2>
                <p class="mt-5 text-lg leading-relaxed">Verified identity, continuous learning, mentorship and a collective voice with industry and policymakers.</p>
                <ul class="mt-8 grid grid-cols-2 gap-3">
                    <li v-for="(b, i) in benefits" :key="b.title" class="flex items-center gap-3 rounded-2xl bg-leaf-50/60 p-3" v-reveal:[i*80]>
                        <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-white text-leaf-600 shadow-soft"><DynIcon :name="b.icon" class="h-5 w-5" /></span>
                        <span class="text-sm leading-snug font-semibold text-ink">{{ b.title }}</span>
                    </li>
                </ul>
                <div class="mt-9 flex flex-wrap gap-3">
                    <AppButton href="/forum/register" size="lg" class="bg-leaf-600! shadow-none! hover:bg-leaf-700!">Become a member<ArrowRight class="h-4 w-4" /></AppButton>
                    <AppButton href="/forum" variant="secondary" size="lg">About the Forum</AppButton>
                </div>
            </div>

            <!-- Parallax collage: each photo drifts at its own speed -->
            <div class="relative h-[28rem] sm:h-[34rem]" aria-hidden="true">
                <div class="absolute top-0 left-0 h-[62%] w-[58%] overflow-hidden rounded-[1.5rem] shadow-lift" :style="{ transform: `translateY(${(0.5 - p) * 60}px)` }">
                    <img src="/images/stock/freelancers.jpg" alt="" loading="lazy" class="h-full w-full object-cover" />
                </div>
                <div class="absolute top-[12%] right-0 h-[48%] w-[38%] overflow-hidden rounded-[1.5rem] shadow-lift" :style="{ transform: `translateY(${(0.5 - p) * -50}px)` }">
                    <img src="/images/stock/mentoring.jpg" alt="" loading="lazy" class="h-full w-full object-cover" />
                </div>
                <div class="absolute right-[8%] bottom-0 h-[44%] w-[56%] overflow-hidden rounded-[1.5rem] shadow-lift" :style="{ transform: `translateY(${(0.5 - p) * 90}px)` }">
                    <img src="/images/stock/meetup-hall.jpg" alt="" loading="lazy" class="h-full w-full object-cover" />
                </div>
                <div class="absolute bottom-[30%] left-[4%] rounded-2xl bg-white px-5 py-4 shadow-lift animate-float">
                    <p class="font-display text-3xl font-extrabold text-leaf-600">Year-round</p>
                    <p class="text-xs font-semibold text-muted">community, not a one-day event</p>
                </div>
            </div>
        </div>
    </section>
</template>
