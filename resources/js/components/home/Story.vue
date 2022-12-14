<template>
    <div class="bg-primary relative">
        <div class="container">
            <div class="common-section text-center">
                <h1 class="font-Bodoni font-medium text-5xl lg:text-6xl text-center py-20" style="letter-spacing: 2px">
                    The Story Of Annabella
                </h1>
                <p class="text-lg lg:text-2xl mb-2">
                    From the mountains, cities, and coasts of Italy to Riyadh, Saudi Arabia, Annabella was established
                    to charm the country with its vibrant dishes. By mixing the cultural and traditional essence of
                    Italy with a dash of modern elements, Annabella creates a magical experience with your taste buds.
                </p>
                <p class="text-lg lg:text-2xl">
                    Through the use of fresh ingredients, its rich menu will capture your smell and taste to give you a
                    wondrous, Mediterranean ambiance.
                </p>
            </div>
            <div class="max-w-7xl mx-auto" id="story-slider">
                <swiper
                    :slides-per-view="1.1"
                    :space-between="20"
                >
                    <swiper-slide>
                        <div class="gradient"></div>
                        <img class="w-full" src="../../../img/slide-1.webp" alt=""></swiper-slide>
                    <swiper-slide>
                        <div class="gradient"></div>
                        <img class="w-full" src="../../../img/slide-1.webp" alt=""></swiper-slide>
                </swiper>
            </div>
        </div>
    </div>
</template>

<script setup>
import {Swiper, SwiperSlide} from 'swiper/vue';
import 'swiper/css';

</script>

<style scoped>
.gradient{
    @apply w-full h-full absolute cursor-pointer top-0 left-0 opacity-50 hover:opacity-0 transition;
    transition-duration: 1000ms;
    background-image: linear-gradient(to bottom, rgba(255,0,0,0), #E5BBA4);
}
</style>
