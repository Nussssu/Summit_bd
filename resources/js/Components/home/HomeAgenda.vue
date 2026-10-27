<script setup>
import { computed, ref } from 'vue';
import { ArrowRight, MapPin } from '@lucide/vue';
import SectionHeading from '@/Components/ui/SectionHeading.vue';
import AppButton from '@/Components/ui/AppButton.vue';

const props = defineProps({ agenda: Object });
const day = ref(props.agenda.days[0].id);
const track = ref('All');
const sessions = computed(() => props.agenda.sessions.filter((s) => s.day === day.value && (track.value === 'All' || s.track === track.value)));

const typeColor = { Keynote: 'text-brand-600', Panel: 'text-sky-600', Workshop: 'text-leaf-600', Session: 'text-ink-soft', Networking: 'text-gold-600', Awards: 'text-gold-600' };
</script>

<template>
    <section class="bg-canvas section-y">
        <div class="container-x">
            <SectionHeading eyebrow="Agenda Preview" title="A programme built around real outcomes." desc="Sample programme, subject to change.">
                <template #action><AppButton href="/agenda" variant="secondary">Full agenda<ArrowRight class="h-4 w-4" /></AppButton></template>
            </SectionHeading>

            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between" v-reveal>
                <div class="flex gap-1 rounded-full bg-white p-1 shadow-soft" role="tablist" aria-label="Day">
                    <button
                        v-for="d in agenda.days" :key="d.id" type="button" role="tab" :aria-selected="day === d.id"
                        :class="['rounded-full px-6 py-2 text-sm font-bold transition-all duration-300', day === d.id ? 'bg-ink text-white' : 'text-ink-soft hover:text-ink']"
                        @click="day = d.id"
                    >{{ d.label }}</button>
                </div>
                <div class="flex gap-2 overflow-x-auto no-scrollbar" aria-label="Track filter">
                    <button
                        v-for="t in agenda.tracks" :key="t" type="button" :aria-pressed="track === t"
                        :class="['shrink-0 rounded-full px-4 py-2 text-sm font-medium transition-all duration-300', track === t ? 'bg-brand-600 text-white' : 'text-ink-soft hover:bg-white']"
                        @click="track = t"
                    >{{ t }}</button>
                </div>
            </div>

            <TransitionGroup tag="ul" class="relative space-y-3" move-class="transition duration-500" enter-active-class="transition duration-500 ease-out" enter-from-class="opacity-0 -translate-x-4" leave-active-class="transition duration-200 absolute inset-x-0" leave-to-class="opacity-0" aria-live="polite">
                <li v-for="s in sessions" :key="s.day + s.title" class="group grid items-center gap-2 rounded-2xl border border-transparent bg-white px-6 py-5 transition-all duration-300 hover:border-brand-200 hover:shadow-soft sm:grid-cols-[110px_1fr_auto] sm:gap-6">
                    <p class="font-display text-xl font-extrabold text-ink tabular-nums">{{ s.time }}</p>
                    <div>
                        <p class="text-xs font-bold tracking-wider uppercase" :class="typeColor[s.type]">{{ s.type }} <span class="ml-2 font-medium text-muted normal-case tracking-normal">{{ s.track }}</span></p>
                        <h3 class="mt-1 text-lg font-semibold transition-colors group-hover:text-brand-600">{{ s.title }}</h3>
                    </div>
                    <p class="inline-flex items-center gap-1.5 text-sm text-muted"><MapPin class="h-4 w-4" />{{ s.room }}</p>
                </li>
                <li v-if="!sessions.length" key="empty" class="rounded-2xl bg-white p-10 text-center text-sm text-muted">No sessions in this track for the selected day.</li>
            </TransitionGroup>
        </div>
    </section>
</template>
