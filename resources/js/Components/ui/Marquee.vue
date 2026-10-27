<script setup>
// Seamless infinite marquee; content is duplicated and the copy is hidden from assistive tech.
defineProps({ fast: Boolean, reverse: Boolean });
</script>

<template>
    <div class="group overflow-hidden mask-fade-x">
        <div
            :class="['flex w-max group-hover:[animation-play-state:paused]', fast ? 'animate-marquee-fast' : 'animate-marquee']"
            :style="reverse ? 'animation-direction: reverse' : ''"
        >
            <div class="flex shrink-0"><slot /></div>
            <div class="flex shrink-0" aria-hidden="true"><slot /></div>
        </div>
    </div>
</template>
