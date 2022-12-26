<template>
    <div class="bg-primary relative">
        <Component :is="'script'" src="https://cdnjs.cloudflare.com/ajax/libs/lottie-player/1.4.3/lottie-player.js">
        </Component>
        <div class="container">
            <div class="common-section" style="min-height: 400px;">
                <transition name="fade">
                    <h1 v-if="done" class=" font-Bodoni font-medium text-5xl lg:text-6xl text-center py-20"
                        style="letter-spacing: 2px">
                        Unique flavors of <span class="font-bold">Italian Cuisine</span> that bring authenticity to your
                        taste
                    </h1>
                </transition>
                    <lottie-player style="width:300px;margin:auto" v-if="!done"
                    src="/home-page-animation.json" autoplay></lottie-player>
            </div>
        </div>
        <div class="absolute -bottom-24 flex w-full items-center justify-center">
            <div class="w-48 h-48 p-4 bg-primary rounded-full flex items-center justify-center">
                <img v-if="done" src="../../../img/women.svg" alt="">
            </div>
        </div>
    </div>
    <div id="hero-parallax"></div>
</template>

<script setup>
import { onMounted, ref } from "vue"

const done = ref(false)
onMounted(() => {
    setTimeout(() => {
        done.value = true
    }, 2400);
})
</script>

<style scoped>
#hero-parallax {
    background-image: url("../../../img/hero.webp");
    min-height: 400px;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

/* we will explain what these classes do next! */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 1s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
