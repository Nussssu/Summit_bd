<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import HomeHero from '@/Components/home/HomeHero.vue';
import HomeGlance from '@/Components/home/HomeGlance.vue';
import HomeGallery from '@/Components/home/HomeGallery.vue';
import HomeJourney from '@/Components/home/HomeJourney.vue';
import HomeZoom from '@/Components/home/HomeZoom.vue';
import HomeWhyAttend from '@/Components/home/HomeWhyAttend.vue';
import HomeHighlights from '@/Components/home/HomeHighlights.vue';
import HomeSpeakers from '@/Components/home/HomeSpeakers.vue';
import HomeAgenda from '@/Components/home/HomeAgenda.vue';
import HomeAwards from '@/Components/home/HomeAwards.vue';
import HomePartner from '@/Components/home/HomePartner.vue';
import HomeForum from '@/Components/home/HomeForum.vue';
import HomeVoices from '@/Components/home/HomeVoices.vue';
import HomeFinalCta from '@/Components/home/HomeFinalCta.vue';

defineProps({ content: Object });
const { edition, grand_summit: gs } = usePage().props.site;

const eventJsonLd = JSON.stringify({
    '@context': 'https://schema.org',
    '@type': 'Event',
    name: `${edition.name} ${edition.year}`,
    description: edition.tagline,
    startDate: gs.start,
    endDate: gs.end,
    eventStatus: 'https://schema.org/EventScheduled',
    eventAttendanceMode: 'https://schema.org/OfflineEventAttendanceMode',
    location: { '@type': 'Place', name: gs.venue, address: { '@type': 'PostalAddress', addressLocality: gs.city, addressCountry: 'BD' } },
    organizer: edition.organizers.map((name) => ({ '@type': 'Organization', name })),
});
</script>

<template>
    <Head>
        <meta name="description" :content="edition.tagline" />
        <component :is="'script'" type="application/ld+json">{{ eventJsonLd }}</component>
    </Head>
    <HomeHero :ticker="content.ticker" />
    <HomeGlance :stats="content.stats" />
    <HomeGallery :images="content.gallery" />
    <HomeJourney :divisions="content.divisions" :phases="content.phases" />
    <HomeWhyAttend :audiences="content.audiences" />
    <HomeZoom />
    <HomeHighlights :highlights="content.highlights" />
    <HomeSpeakers :speakers="content.speakers" />
    <HomeAgenda :agenda="content.agenda" />
    <HomeAwards :categories="content.award_categories" />
    <HomePartner :tiers="content.sponsor_tiers" />
    <HomeForum :benefits="content.forum_benefits" />
    <HomeVoices :stories="content.stories" :news="content.news" />
    <HomeFinalCta />
</template>
