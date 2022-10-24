import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import homePage from './pages/homePage.vue';
import contactPage from './pages/contactPage.vue';
import infoPage from './pages/infoPage.vue';
import postPage from './pages/postPage.vue';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'home',
            component: homePage
        },
        {
            path: '/contact',
            name: 'contact',
            component: contactPage
        },
        {
            path: '/posts',
            name: 'posts',
            component: postPage
        },
        {
            path: '/info',
            name: 'info',
            component: infoPage
        },
    ]
});

export default router;