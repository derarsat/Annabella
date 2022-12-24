<template>
    <div class="bg-[#F5F5F5]">

        <div class="common-section ">
            <div class="container">
                <h1 class="text-center text-6xl">Top Plates</h1>
                <p class="mt-6 text-center mb-12">
                    With a cookbook cultivated from the Mediterranean coast of Italy, <br> indulge in some of the top
                    plates
                    at
                    Annabella and captivate your <br> taste buds with a variety of flavors and mixtures.
                </p>

                <swiper :slides-per-view="2.9" :space-between="30">
                    <swiper-slide v-for="cuisine in cuisines" :key="cuisine.id">
                        <img :src="cuisine.featured_image" alt="">
                        <h1 class="text-3xl mt-2">{{ cuisine.name }}</h1>
                        <h2 class="text-2xl">{{ cuisine.desc }}</h2>
                    </swiper-slide>
                </swiper>

                <div class="flex items-center justify-center gap-4 mt-12">
                    <router-link class="bg-dark text-white px-4 py-2 rounded" to="/menu">See all menu</router-link>
                    <a target="_blank" href="/Anabella_qr_menu.pdf" class="border border-dark px-4 py-2 rounded">Download menu</a>
                </div>
            </div>
        </div>
    </div>

</template>
<script setup>
import { onMounted, ref } from "vue";
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css/navigation';
const cuisines = ref([])
onMounted(async () => {
    await fetch("/top-cuisines")
        .then((response) => response.json())
        .then((data) => cuisines.value = data);
})
</script>