<template>
    <div class="bg-primary">
        <div class="container relative">
            <div class="common-section">
                <h1 class=" font-medium text-7xl text-center pt-20 font-Bodoni" style="letter-spacing: 2px">
                    Our Gallery
                </h1>
                <p class="text-center text-2xl mt-12  mb-32">
                    Give your senses the experience they deserve with authentic <br> food and oceans of tradition that
                    can
                    speak volumes through <br> its presentation. Italian cuisine is alive with colors, flavors, and <br>
                    stories
                    that will tug at your heartstrings.
                </p>
            </div>
            <div class="hidden">
                <div class="col-span-1"></div>
                <div class="col-span-2"></div>
                <div class="col-span-3"></div>
                <div class="col-span-4"></div>
                <div class="col-span-5"></div>
                <div class="col-span-6"></div>
                <div class="col-span-7"></div>
                <div class="col-span-8"></div>
                <div class="col-span-9"></div>
                <div class="col-span-10"></div>
                <div class="col-span-11"></div>
                <div class="col-span-12"></div>
            </div>
            <!-- <img class="absolute -right-40 w-[30rem] bottom-0 z-10" src="../../img/women.webp" alt=""> -->
        </div>
    </div>
    <div class="relative -top-32">
        <div class="grid grid-cols-12 container gap-4 z-2">
            <img v-for="img in images" :class="`w-full col-span-${img.grid}`" :key="img" :src="img.url" alt="">
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";

const images = ref([])
onMounted(async () => {
    await fetch("/gallery")
        .then((response) => response.json())
        .then((data) => images.value = data.images);
})
</script>

<style scoped>

</style>
