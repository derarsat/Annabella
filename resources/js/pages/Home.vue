<template>
    <main>
        <Hero />
        <Story />
        <Chef />
        <GalleryImages />
        <Reserve />
        <horizontal-carousel />
        <top-plates></top-plates>
    </main>
</template>

<script setup>
import { defineAsyncComponent } from "vue";

const Hero = defineAsyncComponent(() => import("../components/home/Hero"));
const Story = defineAsyncComponent(() => import("../components/home/Story"));
const Chef = defineAsyncComponent(() => import("../components/home/Chef"));
const GalleryImages = defineAsyncComponent(() => import("../components/home/MiniGallery"));
const Reserve = defineAsyncComponent(() => import("../components/home/Reserve"));
const HorizontalCarousel = defineAsyncComponent(() => import("../components/home/HorizontalCarousel"));
const TopPlates = defineAsyncComponent(() => import("../components/home/TopPlattes"));
</script>

<style scoped>

</style>
