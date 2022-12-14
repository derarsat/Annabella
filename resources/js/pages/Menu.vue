<template>
    <div class="bg-primary">
        <div class="container relative">
            <div class="common-section">
                <h1 class=" font-medium text-7xl text-center pt-20 font-Bodoni" style="letter-spacing: 2px">
                    Our Menu
                </h1>
                <p class="text-center text-2xl mt-12  mb-32">
                    With a carefully selected cookbook from the shimmering <br> coasts and vibrant cities of Italy, give
                    your
                    palette the <br> mesmerizing experience so you can savor every moment of this culinary journey.
                </p>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto py-32">
        <div class="grid grid-cols-5">
            <div>
                <div class="flex flex-col text-2xl gap-4 items-start pt-24">
                    <button :class="(active.name == menu.name) ? '' : 'opacity-50'" @click="active = menu"
                        v-for="menu in menus" :key="menu" v-text="menu.name"></button>
                </div>
            </div>

            <div class="col-span-4">
                <div class="text-3xl mb-12 flex items-center justify-between">
                    {{ active.name }}

                    <div class="flex items-center gap-4">
                        <button class="button-prev button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                            </svg>
                        </button>
                        <button class="button-next button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </button>
                    </div>
                </div>
                <swiper :modules="[Navigation]" :slides-per-view="1.5" :space-between="40" :navigation="{
                    nextEl: '.button-next',
                    prevEl: '.button-prev'
                }">
                    <swiper-slide v-for="cuisine in active.cuisines" :key="cuisine.name">
                        <img :src="(cuisine.image)" alt="">
                        <h1 class="text-3xl mt-4 mb-3">{{cuisine.name}}</h1>
                        <h1>{{cuisine.desc}}</h1>
                    </swiper-slide>
                </swiper>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css/navigation';
import { Navigation } from 'swiper';

// Import Swiper styles
import 'swiper/css';
import { onMounted, ref } from "vue";

const menus = ref([])
const active = ref("")
onMounted(async () => {
    await fetch("/menus")
        .then((response) => response.json())
        .then((data) => {
            menus.value = data
            active.value = menus.value[0]

        });
})
</script>

<style scoped>

</style>
