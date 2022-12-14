<template>
    <div class="bg-primary">
        <div class="text-center relative max-w-4xl mx-auto">
            <img class="absolute -left-[30rem] transform   w-[32rem] " src="../../../img/women-flip.webp" alt="">
            <h1 class="font-Bodoni font-medium text-6xl text-center py-20" style="letter-spacing: 2px">
                Gallery
            </h1>
            <p class="text-lg lg:text-2xl ">
                Pictures of passionately-prepared dishes could tell you a thousand stories. Annabella’s traditional
                plates can enthrall your senses with their captivating smells, mesmerizing tastes, and divine
                presentations. </p>
        </div>
        <div class="common-section relative">
            <div class="grid grid-cols-3 gap-6 text-dark" v-if="images.length > 0">
                <div v-for="image in images" :key="image">
                    <img :src="image.url" alt="">
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <router-link :to="{ name: 'Gallery' }"
                class="bg-dark text-white px-4 py-2 rounded mb-12">Explore More</router-link>

        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";

const images = ref([])
onMounted(async () => {
    await fetch("/front-gallery-images")
        .then((response) => response.json())
        .then((data) => images.value = data.images);
})
</script>

<style scoped>

</style>
