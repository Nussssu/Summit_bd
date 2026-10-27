<script setup>
import { Link } from '@inertiajs/vue3';
import { ArrowRight, ArrowUpRight, UserRound } from '@lucide/vue';
import SectionHeading from '@/Components/ui/SectionHeading.vue';
import AppButton from '@/Components/ui/AppButton.vue';

defineProps({ speakers: Array });
const grads = ['from-brand-100 to-sky-50', 'from-leaf-100 to-brand-50', 'from-gold-100 to-leaf-50'];
</script>

<template>
    <section class="bg-white section-y">
        <div class="container-x">
            <SectionHeading eyebrow="Speakers" title="Voices from global marketplaces, AI and industry." desc="The line-up will be revealed in phases.">
                <template #action><AppButton href="/speakers" variant="secondary">All speakers<ArrowRight class="h-4 w-4" /></AppButton></template>
            </SectionHeading>

            <ul class="grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-3">
                <li v-for="(s, i) in speakers" :key="s.slug" v-reveal:[(i%3)*100]>
                    <Link :href="`/speaker/${s.slug}`" class="group block">
                        <div :class="['relative aspect-[4/5] overflow-hidden rounded-[1.5rem] bg-gradient-to-br', grads[i % 3]]">
                            <UserRound class="absolute -bottom-6 left-1/2 h-[85%] w-[85%] -translate-x-1/2 text-white transition-transform duration-700 group-hover:scale-105" :stroke-width="0.8" />
                            <span class="absolute top-4 left-4 chip bg-white/90 text-ink-soft backdrop-blur">{{ s.topic }}</span>
                            <span class="absolute right-4 bottom-4 grid h-11 w-11 translate-y-3 place-items-center rounded-full bg-ink text-white opacity-0 transition-all duration-500 group-hover:translate-y-0 group-hover:opacity-100">
                                <ArrowUpRight class="h-5 w-5" />
                            </span>
                        </div>
                        <h3 class="mt-4 text-base font-bold transition-colors group-hover:text-brand-600 sm:text-lg">To be announced</h3>
                        <p class="text-sm">{{ s.role }} · <span class="text-muted">{{ s.org }}</span></p>
                    </Link>
                </li>
            </ul>
        </div>
    </section>
</template>
