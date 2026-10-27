<script setup>
import { computed, ref } from 'vue';
import { ArrowRight, CircleCheck } from '@lucide/vue';
import SectionHeading from '@/Components/ui/SectionHeading.vue';
import AppButton from '@/Components/ui/AppButton.vue';
import DynIcon from '@/Components/ui/DynIcon.vue';

const props = defineProps({ audiences: Array });
const active = ref(props.audiences[0].id);
const current = computed(() => props.audiences.find((a) => a.id === active.value));
</script>

<template>
    <section class="bg-white section-y">
        <div class="container-x">
            <SectionHeading center eyebrow="Why Attend" title="Built for everyone shaping the digital workforce." />

            <div class="mx-auto mb-12 flex max-w-4xl gap-1 overflow-x-auto rounded-full border border-line bg-canvas p-1.5 no-scrollbar" role="tablist" aria-label="Audience" v-reveal>
                <button
                    v-for="a in audiences" :key="a.id" type="button" role="tab" :aria-selected="active === a.id" :id="`tab-${a.id}`" :aria-controls="`panel-${a.id}`"
                    :class="['flex flex-1 shrink-0 items-center justify-center gap-2 rounded-full px-4 py-2.5 text-sm font-semibold whitespace-nowrap transition-all duration-300', active === a.id ? 'bg-white text-brand-700 shadow-soft' : 'text-muted hover:text-ink']"
                    @click="active = a.id"
                >
                    <DynIcon :name="a.icon" class="h-4 w-4" />{{ a.label }}
                </button>
            </div>

            <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
                <div class="relative aspect-[5/4] overflow-hidden rounded-[1.75rem] bg-canvas" v-reveal="'left'">
                    <TransitionGroup enter-active-class="transition duration-[900ms] ease-out" enter-from-class="opacity-0 scale-110" leave-active-class="transition duration-[900ms] absolute inset-0" leave-to-class="opacity-0">
                        <img v-for="a in [current]" :key="a.id" :src="a.image" alt="" class="absolute inset-0 h-full w-full object-cover" />
                    </TransitionGroup>
                    <div class="absolute inset-0 bg-gradient-to-t from-ink/50 to-transparent" />
                    <span class="absolute bottom-6 left-6 chip bg-white/90 px-4 py-2 text-sm font-semibold text-ink backdrop-blur"><DynIcon :name="current.icon" class="h-4 w-4 text-brand-600" />For {{ current.label }}</span>
                </div>

                <Transition mode="out-in" enter-active-class="transition duration-500 ease-out" enter-from-class="opacity-0 translate-y-4" leave-active-class="transition duration-150" leave-to-class="opacity-0">
                    <div :key="current.id" :id="`panel-${current.id}`" role="tabpanel" :aria-labelledby="`tab-${current.id}`">
                        <h3 class="text-3xl leading-tight font-extrabold text-balance sm:text-4xl">{{ current.headline }}</h3>
                        <ul class="mt-8 space-y-3">
                            <li v-for="(p, i) in current.points" :key="p" class="fade-in flex items-start gap-3 border-b border-line pb-3" :style="{ '--d': `${i * 80}ms` }">
                                <CircleCheck class="mt-0.5 h-5 w-5 shrink-0 text-leaf-500" />
                                <span class="font-medium text-ink">{{ p }}</span>
                            </li>
                        </ul>
                        <AppButton :href="current.cta.href" size="lg" class="mt-8">{{ current.cta.label }}<ArrowRight class="h-4 w-4" /></AppButton>
                    </div>
                </Transition>
            </div>
        </div>
    </section>
</template>
