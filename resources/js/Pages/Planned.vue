<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import { ArrowRight, Hammer } from '@lucide/vue';
import PageHero from '@/Components/layout/PageHero.vue';
import AppButton from '@/Components/ui/AppButton.vue';

// Shared shell for routes whose full module is scheduled in a later development phase.
defineProps({ page: Object });
const { ctas } = usePage().props.site;
</script>

<template>
    <Head :title="page.title"><meta name="description" :content="page.desc" /></Head>
    <PageHero :eyebrow="page.eyebrow" :title="page.title" :desc="page.desc" />
    <section class="bg-white section-y">
        <div class="container-x">
            <div class="card mx-auto flex max-w-2xl flex-col items-center p-10 text-center" v-reveal>
                <span class="grid h-14 w-14 place-items-center rounded-2xl bg-gold-50 text-gold-600"><Hammer class="h-7 w-7" /></span>
                <h2 class="mt-5 text-2xl font-bold">{{ page.form ? 'This form opens soon' : 'Content is being prepared' }}</h2>
                <p class="mt-3 leading-relaxed">
                    {{ page.form
                        ? 'This registration workflow is scheduled for the next development phase and is not yet accepting submissions.'
                        : 'This page is scheduled for the next development phase. Verified content will be published here.' }}
                </p>
                <div class="mt-7 flex flex-wrap justify-center gap-3">
                    <AppButton href="/">Back to home</AppButton>
                    <AppButton :href="ctas.register.href" variant="secondary">{{ ctas.register.label }}<ArrowRight class="h-4 w-4" /></AppButton>
                </div>
            </div>
        </div>
    </section>
</template>
