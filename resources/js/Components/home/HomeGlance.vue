<script setup>
import { usePage, Link } from '@inertiajs/vue3';
import { ArrowUpRight } from '@lucide/vue';
import CountUp from '@/Components/ui/CountUp.vue';
import ScrollText from '@/Components/ui/ScrollText.vue';

defineProps({ stats: Array });
const { edition } = usePage().props.site;

const blocks = [
    { href: '/national-journey', kicker: 'The National Campaign', big: '3 tiers', text: 'Campus programmes, district roadshows and divisional summits taking AI and freelancing skills to every region.', image: '/images/stock/students.jpg', reveal: 'left' },
    { href: '/grand-summit', kicker: 'The Grand Dhaka Summit', big: '2 days', text: 'Keynotes, AI labs, marketplace connect, a career zone, the exhibition and the Freelancer Awards.', image: '/images/stock/conference-audience.jpg', reveal: 'right' },
];
</script>

<template>
    <section id="glance" class="relative scroll-mt-16 bg-white section-y">
        <div class="container-x">
            <p class="eyebrow" v-reveal><span class="h-px w-8 bg-current" />Organised by {{ edition.organizers.join(' · ') }}</p>
            <ScrollText
                class="mt-6 max-w-5xl font-display text-3xl leading-[1.15] font-extrabold tracking-[-0.02em] text-ink sm:text-5xl lg:text-[3.4rem]"
                text="One national movement for the people building Bangladesh’s digital economy — from first-time learners to global founders."
                :accent-from="7"
                :accent-to="9"
            />

            <div class="mt-16 grid gap-5 lg:grid-cols-2">
                <Link
                    v-for="b in blocks" :key="b.href" :href="b.href"
                    class="group relative flex min-h-[26rem] flex-col justify-end overflow-hidden rounded-[1.75rem] p-8 text-white sm:p-10"
                    v-reveal="b.reveal"
                >
                    <img :src="b.image" alt="" loading="lazy" class="absolute inset-0 h-full w-full object-cover transition-transform duration-[1400ms] ease-out group-hover:scale-110" />
                    <div class="absolute inset-0 bg-gradient-to-t from-ink via-ink/60 to-ink/5 transition-opacity duration-500 group-hover:opacity-90" />
                    <span class="absolute top-6 right-6 grid h-12 w-12 place-items-center rounded-full bg-white/15 backdrop-blur transition-all duration-500 group-hover:rotate-45 group-hover:bg-white group-hover:text-ink">
                        <ArrowUpRight class="h-5 w-5" />
                    </span>
                    <div class="relative">
                        <p class="text-sm font-semibold tracking-wider text-sky-500 uppercase">{{ b.kicker }}</p>
                        <p class="mt-3 font-display text-6xl font-extrabold sm:text-7xl">{{ b.big }}</p>
                        <p class="mt-3 max-w-md text-lg text-slate-200">{{ b.text }}</p>
                    </div>
                </Link>
            </div>

            <dl class="mt-5 grid grid-cols-2 gap-5 lg:grid-cols-4">
                <div v-for="(s, i) in stats" :key="s.label" class="group rounded-[1.25rem] border border-line p-6 transition-colors duration-500 hover:border-brand-200 hover:bg-brand-50/50 sm:p-8" v-reveal:[i*100]>
                    <dd class="font-display text-5xl font-extrabold text-ink transition-colors duration-500 group-hover:text-brand-600 sm:text-6xl"><CountUp :to="s.value" /></dd>
                    <dt class="mt-2 text-sm font-medium text-muted">{{ s.label }}</dt>
                </div>
            </dl>
        </div>
    </section>
</template>
