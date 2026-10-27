<script setup>
import { usePage } from '@inertiajs/vue3';
import { ArrowRight, Trophy } from '@lucide/vue';
import AppButton from '@/Components/ui/AppButton.vue';
import DynIcon from '@/Components/ui/DynIcon.vue';

defineProps({ categories: Array });
const { edition } = usePage().props.site;
const steps = ['Nominate', 'Verify', 'Jury review', 'Winners on stage'];
</script>

<template>
    <section class="bg-white section-y">
        <div class="container-x">
            <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-gold-50 via-white to-brand-50 p-8 ring-1 ring-gold-100 sm:p-12 lg:p-16">
                <Trophy class="pointer-events-none absolute -top-10 -right-10 h-80 w-80 rotate-12 text-gold-500/10" :stroke-width="1" />
                <div class="relative grid gap-12 lg:grid-cols-[1fr_1.15fr] lg:gap-16">
                    <div v-reveal="'left'">
                        <p class="eyebrow text-gold-700"><span class="h-px w-8 bg-current" />Freelancer Awards {{ edition.year }}</p>
                        <h2 class="mt-5 text-3xl leading-[1.1] font-extrabold text-balance sm:text-5xl">Celebrating Bangladesh’s most outstanding digital professionals.</h2>
                        <p class="mt-5 text-lg leading-relaxed">A transparent, jury-led programme recognising excellence, innovation and community impact. Nomination deadline to be announced.</p>
                        <ol class="mt-8 flex flex-wrap gap-x-2 gap-y-3 text-sm font-semibold text-ink">
                            <li v-for="(s, i) in steps" :key="s" class="flex items-center gap-2">
                                <span class="grid h-6 w-6 place-items-center rounded-full bg-ink text-xs text-white">{{ i + 1 }}</span>{{ s }}
                                <ArrowRight v-if="i < steps.length - 1" class="h-4 w-4 text-gold-500" />
                            </li>
                        </ol>
                        <div class="mt-10 flex flex-wrap gap-3">
                            <AppButton href="/awards/nominate" variant="gold" size="lg">Submit a nomination<ArrowRight class="h-4 w-4" /></AppButton>
                            <AppButton href="/awards/categories" variant="secondary" size="lg">Criteria</AppButton>
                        </div>
                    </div>
                    <ul class="grid grid-cols-2 gap-3 self-center sm:gap-4">
                        <li v-for="(c, i) in categories" :key="c.title" class="group flex items-center gap-3 rounded-2xl border border-white bg-white/70 p-4 shadow-soft backdrop-blur transition-all duration-300 hover:-translate-y-1 hover:border-gold-100 hover:bg-white" v-reveal:[i*60]>
                            <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-gold-50 text-gold-600 transition-transform duration-500 group-hover:rotate-[-8deg] group-hover:scale-110"><DynIcon :name="c.icon" class="h-5 w-5" /></span>
                            <span class="text-sm leading-snug font-semibold text-ink">{{ c.title }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>
