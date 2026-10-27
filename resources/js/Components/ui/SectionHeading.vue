<script setup>
defineProps({
    eyebrow: String,
    title: String,
    desc: String,
    center: Boolean,
});
</script>

<template>
    <div :class="['mb-12 flex flex-col gap-6 md:mb-16', center ? 'items-center text-center' : 'md:flex-row md:items-end md:justify-between']">
        <div class="max-w-2xl" v-reveal>
            <p v-if="eyebrow" :class="['eyebrow mb-4', center && 'justify-center']"><span class="h-px w-8 bg-current" />{{ eyebrow }}</p>
            <h2 class="text-3xl leading-[1.1] font-extrabold text-balance sm:text-4xl lg:text-5xl">{{ title }}</h2>
            <p v-if="desc" class="mt-5 text-base leading-relaxed sm:text-lg">{{ desc }}</p>
        </div>
        <div v-if="$slots.action" class="shrink-0" v-reveal:150><slot name="action" /></div>
    </div>
</template>
