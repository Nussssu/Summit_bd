<script setup>
import { ArrowRight, Check, LayoutGrid } from '@lucide/vue';
import SectionHeading from '@/Components/ui/SectionHeading.vue';
import AppButton from '@/Components/ui/AppButton.vue';

defineProps({ tiers: Array });

// Illustrative floorplan teaser; real allocation comes from the exhibition module.
const booths = Array.from({ length: 18 }, (_, i) => (i % 5 === 0 ? 'reserved' : i % 7 === 3 ? 'premium' : 'open'));
</script>

<template>
    <section class="bg-canvas section-y">
        <div class="container-x">
            <SectionHeading eyebrow="Sponsor & Exhibit" title="Put your brand at the centre of Bangladesh’s digital future." desc="Reach students, freelancers, founders and decision-makers nationwide. Pricing on request." />

            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                <article
                    v-for="(t, i) in tiers" :key="t.name"
                    :class="['card-hover flex flex-col rounded-[1.5rem] border p-7', i === 0 ? 'border-ink bg-ink text-slate-300' : 'border-line bg-white']"
                    v-reveal:[i*90]
                >
                    <p :class="['text-xs font-semibold tracking-wider uppercase', i === 0 ? 'text-sky-500' : 'text-muted']">Tier 0{{ i + 1 }}</p>
                    <h3 :class="['mt-1 text-3xl font-extrabold', i === 0 && 'text-white']">{{ t.name }}</h3>
                    <ul class="mt-6 flex-1 space-y-3">
                        <li v-for="p in t.perks" :key="p" class="flex gap-2.5 text-sm"><Check class="mt-0.5 h-4 w-4 shrink-0 text-leaf-500" />{{ p }}</li>
                    </ul>
                    <AppButton href="/sponsorship-opportunity" :variant="i === 0 ? 'secondary' : 'ghost'" class="mt-8 w-full" :class="i !== 0 && 'border border-line'">Enquire</AppButton>
                </article>
            </div>

            <div class="mt-5 grid items-center gap-10 overflow-hidden rounded-[1.5rem] border border-line bg-white p-8 sm:p-10 lg:grid-cols-2" v-reveal>
                <div>
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-sky-50 text-sky-600"><LayoutGrid class="h-6 w-6" /></span>
                    <h3 class="mt-5 text-3xl font-extrabold">Exhibit at the Grand Summit</h3>
                    <p class="mt-3 max-w-md leading-relaxed">Choose a booth on the interactive floorplan. Allocation is confirmed by the organising team.</p>
                    <div class="mt-7 flex flex-wrap gap-3">
                        <AppButton href="/exhibition/apply">Apply for a booth<ArrowRight class="h-4 w-4" /></AppButton>
                        <AppButton href="/exhibition" variant="secondary">View exhibition</AppButton>
                    </div>
                </div>
                <div>
                    <div class="grid grid-cols-6 gap-2" aria-label="Illustrative floorplan">
                        <div
                            v-for="(b, i) in booths" :key="i"
                            :class="['grid aspect-square place-items-center rounded-lg text-[11px] font-semibold transition-all duration-300 hover:scale-110',
                                b === 'reserved' ? 'bg-slate-100 text-slate-400' : b === 'premium' ? 'bg-gold-100 text-gold-700 hover:bg-gold-500 hover:text-white' : 'border border-brand-200 bg-white text-brand-600 hover:bg-brand-600 hover:text-white']"
                        >{{ String.fromCharCode(65 + Math.floor(i / 6)) }}{{ (i % 6) + 1 }}</div>
                    </div>
                    <p class="mt-4 flex flex-wrap gap-4 text-xs text-muted">
                        <span class="inline-flex items-center gap-1.5"><span class="h-3 w-3 rounded border border-brand-200" />Available</span>
                        <span class="inline-flex items-center gap-1.5"><span class="h-3 w-3 rounded bg-gold-100" />Premium</span>
                        <span class="inline-flex items-center gap-1.5"><span class="h-3 w-3 rounded bg-slate-100" />Reserved</span>
                        <span class="ml-auto">Illustrative layout</span>
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
