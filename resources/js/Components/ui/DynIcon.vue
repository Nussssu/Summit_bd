<script setup>
import {
    BadgeCheck, Briefcase, BriefcaseBusiness, Building, CodeXml, Cpu, Crown, GraduationCap, Handshake, Heart,
    Landmark, Laptop, MapPin, Megaphone, Mic, Network, Palette, Rocket, Scale, Sparkles, Sprout, Store, Trophy,
} from '@lucide/vue';

// Resolves CMS-provided icon names to lucide components.
const registry = {
    BadgeCheck, Briefcase, BriefcaseBusiness, Building, CodeXml, Cpu, Crown, GraduationCap, Handshake, Heart,
    Landmark, Laptop, MapPin, Megaphone, Mic, Network, Palette, Rocket, Scale, Sparkles, Sprout, Store, Trophy,
};

defineProps({ name: String });
</script>

<template>
    <component :is="registry[name] ?? Sparkles" aria-hidden="true" />
</template>
