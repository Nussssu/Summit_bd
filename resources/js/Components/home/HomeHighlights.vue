<script setup>
import SectionHeading from '@/Components/ui/SectionHeading.vue';
import DynIcon from '@/Components/ui/DynIcon.vue';

defineProps({ highlights: Array });
// Bento rhythm: wide, narrow, narrow, wide …
const spans = ['lg:col-span-2', '', '', 'lg:col-span-2', 'lg:col-span-2', ''];
</script>

<template>
    <section class="bg-canvas section-y">
        <div class="container-x">
            <SectionHeading eyebrow="Program Highlights" title="Two days. Six experiences." desc="A multi-track programme for learning, doing and meeting the right people." />
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <article
                    v-for="(h, i) in highlights" :key="h.title"
                    :class="['group relative flex min-h-[20rem] flex-col justify-end overflow-hidden rounded-[1.5rem] bg-ink p-7 text-white sm:p-8', spans[i]]"
                    v-reveal:[(i%3)*90]="'zoom'"
                >
                    <img :src="h.image" alt="" loading="lazy" class="absolute inset-0 h-full w-full object-cover opacity-80 transition-all duration-[1200ms] ease-out group-hover:scale-110 group-hover:opacity-60" />
                    <div class="absolute inset-0 bg-gradient-to-t from-ink via-ink/50 to-transparent" />
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-600/70 to-sky-500/60 opacity-0 transition-opacity duration-500 group-hover:opacity-100" />
                    <span class="absolute top-6 left-7 font-display text-sm font-bold text-white/60">0{{ i + 1 }}</span>
                    <div class="relative">
                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white/15 backdrop-blur transition-transform duration-500 group-hover:-translate-y-1 group-hover:rotate-[-6deg]">
                            <DynIcon :name="h.icon" class="h-6 w-6" />
                        </span>
                        <h3 class="mt-5 text-2xl font-bold text-white">{{ h.title }}</h3>
                        <p class="mt-2 grid max-w-md grid-rows-[0fr] text-sm leading-relaxed text-slate-200 opacity-0 transition-all duration-500 group-hover:grid-rows-[1fr] group-hover:opacity-100 max-lg:grid-rows-[1fr] max-lg:opacity-100">
                            <span class="overflow-hidden">{{ h.desc }}</span>
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>
</template>
