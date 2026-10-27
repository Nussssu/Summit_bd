<script setup>
import { computed, onMounted, onUnmounted, ref, watch } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import { ArrowRight, ChevronDown, Menu, X } from '@lucide/vue';
import Logo from '@/Components/ui/Logo.vue';
import AppButton from '@/Components/ui/AppButton.vue';

const page = usePage();
const { nav, ctas } = page.props.site;
const scrolled = ref(false);
// Transparent white-on-dark styling while the header sits over the home hero.
const onHero = computed(() => page.component === 'Home' && !scrolled.value);
const openMenu = ref(null);
const mobileOpen = ref(false);
const expanded = ref(null);
let closeTimer;

const progress = ref(0);
const onScroll = () => {
    scrolled.value = window.scrollY > 24;
    const max = document.documentElement.scrollHeight - window.innerHeight;
    progress.value = max > 0 ? window.scrollY / max : 0;
};
const onKey = (e) => e.key === 'Escape' && ((mobileOpen.value = false), (openMenu.value = null));
const open = (label) => { clearTimeout(closeTimer); openMenu.value = label; };
const close = () => { closeTimer = setTimeout(() => (openMenu.value = null), 140); };

let off;
onMounted(() => {
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('keydown', onKey);
    off = router.on('navigate', () => { mobileOpen.value = false; openMenu.value = null; });
});
onUnmounted(() => {
    window.removeEventListener('scroll', onScroll);
    window.removeEventListener('keydown', onKey);
    off?.();
});
watch(mobileOpen, (v) => (document.body.style.overflow = v ? 'hidden' : ''));
</script>

<template>
    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[80] focus:rounded-lg focus:bg-white focus:px-4 focus:py-2 focus:shadow-lift">Skip to content</a>

    <header
        :class="[
            'fixed inset-x-0 top-0 z-50 transition-all duration-500',
            scrolled ? 'border-b border-line/80 bg-white/80 shadow-soft backdrop-blur-xl' : 'border-b border-transparent bg-transparent',
        ]"
    >
        <div class="absolute inset-x-0 bottom-0 h-[2px] origin-left bg-gradient-to-r from-leaf-500 via-brand-600 to-sky-500" :style="{ transform: `scaleX(${progress})` }" aria-hidden="true" />
        <div :class="['container-x flex items-center justify-between gap-4 transition-all duration-500', scrolled ? 'h-16' : 'h-20']">
            <Logo :light="onHero" />

            <nav aria-label="Main" class="hidden lg:block">
                <ul class="flex items-center gap-1">
                    <li v-for="item in nav" :key="item.label" class="relative" @mouseenter="item.children && open(item.label)" @mouseleave="item.children && close()">
                        <button
                            v-if="item.children"
                            type="button"
                            :aria-expanded="openMenu === item.label"
                            @click="openMenu === item.label ? (openMenu = null) : open(item.label)"
                            :class="['inline-flex items-center gap-1 rounded-full px-4 py-2 text-sm font-medium transition-colors', openMenu === item.label ? (onHero ? 'bg-white/15 text-white' : 'bg-white/90 text-ink shadow-soft') : (onHero ? 'text-white/85 hover:text-white' : 'text-ink-soft hover:text-ink')]"
                        >
                            {{ item.label }}
                            <ChevronDown :class="['h-4 w-4 transition-transform duration-300', openMenu === item.label && 'rotate-180']" />
                        </button>
                        <Link v-else :href="item.href" :class="['rounded-full px-4 py-2 text-sm font-medium transition-colors', onHero ? 'text-white/85 hover:text-white' : 'text-ink-soft hover:text-ink']">{{ item.label }}</Link>

                        <Transition
                            enter-active-class="transition duration-250 ease-out" enter-from-class="opacity-0 -translate-y-2"
                            leave-active-class="transition duration-150 ease-in" leave-to-class="opacity-0 -translate-y-1"
                        >
                            <div v-if="item.children && openMenu === item.label" class="absolute top-full left-1/2 z-50 w-[22rem] -translate-x-1/2 pt-3">
                                <ul class="card p-2 shadow-lift">
                                    <li v-for="c in item.children" :key="c.href">
                                        <Link :href="c.href" class="group flex items-start gap-3 rounded-xl p-3 transition-colors hover:bg-canvas">
                                            <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-200 transition-all group-hover:scale-150 group-hover:bg-brand-600" />
                                            <span>
                                                <span class="block text-sm font-semibold text-ink">{{ c.label }}</span>
                                                <span class="block text-xs text-muted">{{ c.desc }}</span>
                                            </span>
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                        </Transition>
                    </li>
                </ul>
            </nav>

            <div class="flex items-center gap-2">
                <template v-if="onHero">
                    <Link :href="ctas.exhibit.href" class="hero-pill hidden px-4! py-1.5! text-xs! xl:inline-flex">Exhibit</Link>
                    <Link :href="ctas.register.href" class="hero-pill hidden px-4! py-1.5! text-xs! sm:inline-flex">{{ ctas.register.label }}</Link>
                </template>
                <template v-else>
                    <AppButton :href="ctas.exhibit.href" variant="secondary" size="sm" class="hidden xl:inline-flex">Exhibit</AppButton>
                    <AppButton :href="ctas.register.href" size="sm" class="hidden sm:inline-flex">{{ ctas.register.label }}</AppButton>
                </template>
                <button type="button" :class="['rounded-full p-2 lg:hidden', onHero ? 'text-white hover:bg-white/10' : 'text-ink hover:bg-canvas']" aria-label="Open menu" @click="mobileOpen = true">
                    <Menu class="h-6 w-6" />
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile menu -->
    <Transition enter-active-class="transition duration-300" enter-from-class="opacity-0" leave-active-class="transition duration-200" leave-to-class="opacity-0">
        <div v-if="mobileOpen" class="fixed inset-0 z-[60] flex flex-col bg-white lg:hidden" role="dialog" aria-modal="true" aria-label="Menu">
            <div class="flex h-20 items-center justify-between border-b border-line px-4">
                <Logo />
                <button type="button" class="rounded-full p-2 hover:bg-canvas" aria-label="Close menu" @click="mobileOpen = false"><X class="h-6 w-6" /></button>
            </div>
            <ul class="flex-1 overflow-y-auto px-4 py-2">
                <li v-for="(item, i) in nav" :key="item.label" class="fade-in border-b border-line" :style="{ '--d': `${80 + i * 50}ms` }">
                    <template v-if="item.children">
                        <button type="button" class="flex w-full items-center justify-between py-4 text-left font-display text-xl font-bold text-ink" :aria-expanded="expanded === item.label" @click="expanded = expanded === item.label ? null : item.label">
                            {{ item.label }}
                            <ChevronDown :class="['h-5 w-5 transition-transform', expanded === item.label && 'rotate-180']" />
                        </button>
                        <ul v-show="expanded === item.label" class="pb-3">
                            <li v-for="c in item.children" :key="c.href"><Link :href="c.href" class="block rounded-lg px-3 py-2 text-body hover:bg-canvas hover:text-ink">{{ c.label }}</Link></li>
                        </ul>
                    </template>
                    <Link v-else :href="item.href" class="block py-4 font-display text-xl font-bold text-ink">{{ item.label }}</Link>
                </li>
            </ul>
            <div class="grid gap-2 border-t border-line p-4">
                <AppButton :href="ctas.register.href" size="lg">{{ ctas.register.label }}<ArrowRight class="h-4 w-4" /></AppButton>
                <div class="grid grid-cols-2 gap-2">
                    <AppButton :href="ctas.exhibit.href" variant="secondary" size="sm">Exhibit</AppButton>
                    <AppButton :href="ctas.sponsor.href" variant="secondary" size="sm">Sponsor</AppButton>
                </div>
            </div>
        </div>
    </Transition>
</template>
