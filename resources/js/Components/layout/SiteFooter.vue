<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { ArrowRight, CircleCheck, Mail, MapPin, Phone } from '@lucide/vue';
import Logo from '@/Components/ui/Logo.vue';
import SocialIcon from '@/Components/ui/SocialIcon.vue';

const { edition, footer, contact, social } = usePage().props.site;
const email = ref('');
const state = ref('idle');

const subscribe = () => {
    if (!/^\S+@\S+\.\S+$/.test(email.value)) return (state.value = 'error');
    // TODO: connect to a newsletter endpoint once the backend module exists.
    state.value = 'done';
};
</script>

<template>
    <footer class="relative overflow-hidden border-t border-line bg-canvas">
        <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-leaf-500 via-brand-600 to-sky-500" />
        <div class="container-x grid gap-12 py-16 lg:grid-cols-12">
            <div class="lg:col-span-4">
                <Logo />
                <p class="mt-5 max-w-sm text-sm leading-relaxed">A nationwide campaign and flagship technology summit for Bangladesh’s freelancers, AI pioneers and digital entrepreneurs.</p>
                <form class="mt-6" novalidate @submit.prevent="subscribe">
                    <label for="nl-email" class="text-sm font-semibold text-ink">Get summit updates</label>
                    <div class="mt-2 flex rounded-full border border-line bg-white p-1 transition focus-within:border-brand-300">
                        <input id="nl-email" v-model="email" type="email" placeholder="you@email.com" :aria-invalid="state === 'error'" class="min-w-0 flex-1 bg-transparent px-4 text-sm text-ink outline-none placeholder:text-muted" @input="state = 'idle'" />
                        <button type="submit" class="btn btn-primary btn-sm" aria-label="Subscribe"><ArrowRight class="h-4 w-4" /></button>
                    </div>
                    <p v-if="state === 'error'" class="mt-2 text-xs text-bdred">Please enter a valid email address.</p>
                    <p v-if="state === 'done'" class="mt-2 inline-flex items-center gap-1 text-xs text-leaf-700"><CircleCheck class="h-3.5 w-3.5" />Thanks! (Demo — mailing list not yet connected.)</p>
                </form>
            </div>

            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 lg:col-span-5">
                <div v-for="col in footer" :key="col.title">
                    <h3 class="text-sm font-bold">{{ col.title }}</h3>
                    <ul class="mt-4 space-y-2.5">
                        <li v-for="l in col.links" :key="l.href"><Link :href="l.href" class="text-sm transition-colors hover:text-brand-600">{{ l.label }}</Link></li>
                    </ul>
                </div>
            </div>

            <div class="lg:col-span-3">
                <h3 class="text-sm font-bold">Contact <span v-if="!contact.confirmed" class="ml-1 text-xs font-normal text-muted">(placeholder)</span></h3>
                <ul class="mt-4 space-y-3 text-sm">
                    <li class="flex gap-3"><Mail class="h-4 w-4 shrink-0 text-brand-600" /><a :href="`mailto:${contact.email}`" class="hover:text-brand-600">{{ contact.email }}</a></li>
                    <li class="flex gap-3"><Phone class="h-4 w-4 shrink-0 text-brand-600" />{{ contact.phone }}</li>
                    <li class="flex gap-3"><MapPin class="h-4 w-4 shrink-0 text-brand-600" />{{ contact.address }}</li>
                </ul>
                <div class="mt-6 flex gap-2">
                    <a v-for="s in social" :key="s.name" :href="s.href" :aria-label="s.name" class="grid h-9 w-9 place-items-center rounded-full border border-line bg-white text-ink-soft transition hover:-translate-y-0.5 hover:border-brand-300 hover:text-brand-600">
                        <SocialIcon :name="s.name" class="h-4 w-4" />
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-line">
            <div class="container-x flex flex-col items-center justify-between gap-3 py-6 text-xs sm:flex-row">
                <p>© {{ edition.year }} {{ edition.name }}. Organised by {{ edition.organizers.join(' & ') }}.</p>
                <div class="flex gap-5">
                    <Link href="/privacy-policy" class="hover:text-brand-600">Privacy Policy</Link>
                    <Link href="/terms" class="hover:text-brand-600">Terms of Use</Link>
                    <Link href="/contact" class="hover:text-brand-600">Contact</Link>
                </div>
            </div>
        </div>
    </footer>
</template>
