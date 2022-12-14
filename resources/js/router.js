import { createRouter, createWebHashHistory, createWebHistory } from "vue-router/dist/vue-router";
import Home from "./pages/Home"
import Menu from "./pages/Menu"
import Gallery from "./pages/Gallery"

const routes = [{
        path: "/",
        component: Home,
        name: "Home"
    },
    {
        path: "/menu",
        component: Menu,
        name: "Menu"
    },
    {
        path: "/gallery",
        component: Gallery,
        name: "Gallery"
    }
]
export default createRouter({
    history: createWebHashHistory(),
    routes: routes
})