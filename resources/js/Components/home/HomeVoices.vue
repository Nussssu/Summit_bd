<script setup>
import { Link } from '@inertiajs/vue3';
import { ArrowRight, ArrowUpRight, Quote } from '@lucide/vue';
import SectionHeading from '@/Components/ui/SectionHeading.vue';
import AppButton from '@/Components/ui/AppButton.vue';
import Marquee from '@/Components/ui/Marquee.vue';

defineProps({ stories: Array, news: Array });
const grads = ['from-brand-600 to-sky-500', 'from-gold-500 to-bdred', 'from-leaf-500 to-sky-500'];
</script>

<template>
    <section class="overflow-hidden bg-canvas section-y">
        <div class="container-x">
            <SectionHeading eyebrow="Success Stories" title="Real journeys from every corner of Bangladesh." desc="Illustrative examples. Verified stories will be published as the campaign runs." />
        </div>
        <Marquee>
            <figure v-for="(s, i) in stories" :key="i" class="mr-5 flex w-[22rem] shrink-0 flex-col rounded-[1.5rem] border border-line bg-white p-7 shadow-soft sm:w-[26rem]">
                <Quote class="h-7 w-7 text-brand-200" />
                <blockquote class="mt-4 flex-1 font-display text-lg leading-relaxed font-semibold whitespace-normal text-ink">“{{ s.quote }}”</blockquote>
                <figcaption class="mt-6 text-sm"><span class="font-bold text-ink">{{ s.field }}</span> · <span class="text-muted">{{ s.location }}</span></figcaption>
            </figure>
        </Marquee>

        <div class="container-x mt-28">
            <SectionHeading eyebrow="News" title="Latest from the campaign.">
                <template #action><AppButton href="/news" variant="secondary">All news<ArrowRight class="h-4 w-4" /></AppButton></template>
            </SectionHeading>
            <div class="grid gap-5 md:grid-cols-3">
                <Link v-for="(n, i) in news" :key="n.slug" :href="`/news/${n.slug}`" class="group card card-hover overflow-hidden" v-reveal:[i*100]>
                    <div :class="['relative aspect-[16/9] overflow-hidden bg-gradient-to-br', grads[i % 3]]">
                        <img :src="n.image" alt="" loading="lazy" class="absolute inset-0 h-full w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-110" />
                        <div class="absolute inset-0 bg-gradient-to-t from-ink/60 to-transparent" />
                        <span class="absolute top-4 left-4 chip bg-white text-ink">{{ n.category }}</span>
                        <ArrowUpRight class="absolute right-4 bottom-4 h-6 w-6 text-white transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg leading-snug font-bold transition-colors group-hover:text-brand-600">{{ n.title }}</h3>
                        <p class="mt-2 text-sm leading-relaxed">{{ n.excerpt }}</p>
                    </div>
                </Link>
            </div>
        </div>
    </section>
</template>
