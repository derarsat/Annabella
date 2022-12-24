<!-- <template>
    <div id="reserve">
        <div class="bg-primary">
            <div class="text-center  max-w-3xl mx-auto relative">
                <img class="absolute -right-[36rem] top-[10rem]  w-[28rem] bottom-0" src="../../../img/women.webp" alt="">

                <h1 class="font-Bodoni font-medium text-5xl lg:text-6xl text-center py-10 lg:py-20" style="letter-spacing: 2px">
                    Reserve A Table
                </h1>
                <p class="text-lg lg:text-2xl ">
                    Experience the true meaning of authentic, Italian cuisine and give your senses a story. <br>
                    Book your table now or contact us on the numbers below. </p>
            </div>
            <div class="max-w-full lg:max-w-5xl mx-auto py-12">
                <form class="flex flex-col lg:grid grid-cols-6 gap-6 p-4 lg:p-0 " @submit.prevent="submit()">
                    <input v-model="name" required type="text" placeholder="Your Name" class="col-span-1 lg:col-span-2 ">
                    <input v-model="email" required type="email" placeholder="Your Email" class="col-span-1 lg:col-span-4">
                    <input v-model="date" id="date" required type="date" class="col-span-1 lg:col-span-2">
                    <input v-model="time" id="time" required type="time" class="col-span-1 lg:col-span-2">
                    <select v-model="people" required name="" id="" class="col-span-1 lg:col-span-2">
                        <option :value="i" v-for="i in 12" :key="i">{{ i }} {{ (i == 1 ? 'person' : 'people') }}
                        </option>
                    </select>
                    <div class="col-span-6 flex justify-center">
                        <button class="bg-dark text-white px-4 py-2 rounded mb-12">Book Table</button>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <div id="shader">

            </div>
            <img src="../../../img/table.webp" alt="" class="w-full">

        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios"
const name = ref("")
const email = ref("")
const people = ref("")
const date = ref(new Date().toISOString().substring(0, 10))
const time = ref("")
let now = new Date();
now.setHours(now.getHours() + 6)
time.value = now
    .toLocaleTimeString("en-US", {
        hour12: false
    }).slice(0,-3)



function submit() {
    let csrfToken = document.head.querySelector('meta[name="csrf-token"]');
    const obj = {
        name: name.value,
         email: email.value,
        date: date.value,
        time: time.value,
        people: people.value,
    }
    axios.post("/reserve", obj).then(() => {
        alert("Your reservation is confirmed")
        name.value = email.value = ""
    })
}

</script>


<style scoped>
input,
select {
    @apply bg-white text-dark px-4 py-2 rounded-md w-full placeholder:text-dark outline-none
}

#shader {
    background-image: linear-gradient(to top, rgba(255, 0, 0, 0), #719C53);
    @apply absolute w-full h-full
}
</style> -->
<template>
    
</template>
<script></script>