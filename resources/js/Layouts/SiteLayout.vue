<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import SiteHeader from '@/Components/layout/SiteHeader.vue';
import SiteFooter from '@/Components/layout/SiteFooter.vue';
import SocialIcon from '@/Components/ui/SocialIcon.vue';

const page = usePage();
const { social } = page.props.site;

// Rail switches to the dark/red style while it floats over the home hero.
const pastHero = ref(false);
const onScroll = () => (pastHero.value = window.scrollY > window.innerHeight * 0.6);
const railOnHero = computed(() => page.component === 'Home' && !pastHero.value);
onMounted(() => { onScroll(); window.addEventListener('scroll', onScroll, { passive: true }); });
onUnmounted(() => window.removeEventListener('scroll', onScroll));
const UTM_KEYS = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];

// Persist UTM params for attribution on later registration submissions.
onMounted(() => {
    const params = new URLSearchParams(location.search);
    const utm = Object.fromEntries(UTM_KEYS.filter((k) => params.has(k)).map((k) => [k, params.get(k)]));
    if (Object.keys(utm).length) {
        try { sessionStorage.setItem('fsb_utm', JSON.stringify(utm)); } catch { /* storage unavailable */ }
    }
});
</script>

<template>
    <div class="flex min-h-screen flex-col">
        <SiteHeader />
        <main id="main" class="flex-1"><slot /></main>
        <SiteFooter />

        <!-- Floating social rail -->
        <nav aria-label="Social" :class="['fixed top-1/2 right-4 z-40 hidden -translate-y-1/2 flex-col gap-1.5 rounded-full border p-1.5 backdrop-blur transition-colors duration-500 xl:flex', railOnHero ? 'border-white/25 bg-black/30' : 'border-line bg-white/80 shadow-soft']">
            <a v-for="s in social" :key="s.name" :href="s.href" :aria-label="s.name" :class="['grid h-9 w-9 place-items-center rounded-full transition hover:scale-110', railOnHero ? 'bg-[#C8102E] text-white hover:bg-white hover:text-[#C8102E]' : 'text-ink-soft hover:bg-brand-600 hover:text-white']">
                <SocialIcon :name="s.name" class="h-4 w-4" />
            </a>
        </nav>
    </div>
</template>
