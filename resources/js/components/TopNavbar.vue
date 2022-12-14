<template>
    <div class="bg-primary relative">
        <div class="bg-primary flex p-6 text-white absolute h-screen z-20 w-screen flex-col gap-4 text-lg"
            v-if="showMenu">
            <div class="flex items-center justify-between">
                <img src="../../img/annabella.svg" alt="Annabella" class="w-40  pb-4">
                <button @click="showMenu = false">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>
            </div>
            <router-link :to="{ name: 'Home' }">Home</router-link>
            <router-link :to="{ name: 'Menu' }">Menu</router-link>
            <router-link :to="{ name: 'Gallery' }">Gallery</router-link>
        </div>
        <div class="container">
            <div class="hidden lg:flex items-center justify-between py-8">
                <nav class="text-lg flex items-center gap-6 text-white">
                    <router-link :to="{ name: 'Home' }">Home</router-link>
                    <router-link :to="{ name: 'Menu' }">Menu</router-link>
                    <router-link :to="{ name: 'Gallery' }">Gallery</router-link>
                </nav>
                <img src="../../img/annabella.svg" alt="Annabella" class="w-56">
                <a href="#reserve" class="bg-dark px-4 py-2 rounded-md text-white">Reservation</a>
            </div>

            <div class="flex lg:hidden items-center justify-between pt-8">
                <img src="../../img/annabella.svg" alt="Annabella" class="w-40">
                <button @click="showMenu = true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32.21" height="32.427" viewBox="0 0 32.21 32.427">
                        <g id="Group_873" data-name="Group 873" transform="translate(-366.177 -84.617)">
                            <path id="Path_13" data-name="Path 13"
                                d="M9.744.617a.553.553,0,0,0-.41-.583.647.647,0,0,0-.755.236,2.681,2.681,0,0,0-.228.508A204.392,204.392,0,0,0,1.376,22.906,55.356,55.356,0,0,0,0,29.8c-.007.418.008.845.478.92a.693.693,0,0,0,.853-.7c.014-.138.071-.271.092-.408a70.11,70.11,0,0,1,1.669-7.649C4.934,15.217,6.9,8.507,9.382,1.958A3.592,3.592,0,0,0,9.744.617"
                                transform="matrix(0.259, 0.966, -0.966, 0.259, 395.865, 84.617)" fill="#fff" />
                            <path id="Path_5744" data-name="Path 5744"
                                d="M9.744.617a.553.553,0,0,0-.41-.583.647.647,0,0,0-.755.236,2.681,2.681,0,0,0-.228.508A204.392,204.392,0,0,0,1.376,22.906,55.356,55.356,0,0,0,0,29.8c-.007.418.008.845.478.92a.693.693,0,0,0,.853-.7c.014-.138.071-.271.092-.408a70.11,70.11,0,0,1,1.669-7.649C4.934,15.217,6.9,8.507,9.382,1.958A3.592,3.592,0,0,0,9.744.617"
                                transform="matrix(0.259, 0.966, -0.966, 0.259, 395.865, 91.751)" fill="#fff" />
                            <path id="Path_5745" data-name="Path 5745"
                                d="M9.744.617a.553.553,0,0,0-.41-.583.647.647,0,0,0-.755.236,2.681,2.681,0,0,0-.228.508A204.392,204.392,0,0,0,1.376,22.906,55.356,55.356,0,0,0,0,29.8c-.007.418.008.845.478.92a.693.693,0,0,0,.853-.7c.014-.138.071-.271.092-.408a70.11,70.11,0,0,1,1.669-7.649C4.934,15.217,6.9,8.507,9.382,1.958A3.592,3.592,0,0,0,9.744.617"
                                transform="matrix(0.259, 0.966, -0.966, 0.259, 395.865, 99.677)" fill="#fff" />
                        </g>
                    </svg>
                </button>

            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";

const showMenu = ref(false)
</script>
