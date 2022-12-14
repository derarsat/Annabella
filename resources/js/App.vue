<template>
    <main>
        <TopNavbar/>
        <router-view></router-view>
        <bottom-footer/>
    </main>
</template>
<script setup>

import TopNavbar from "./components/TopNavbar.vue";
import BottomFooter from "./components/BottomFooter.vue";
</script>
