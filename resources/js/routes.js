import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './components/App.vue';
import Login from './components/Login.vue';
import Ekleme from './components/Ekleme.vue';
import Listeleme from './components/Listeleme.vue';

Vue.use(VueRouter);

export const routes = [
    {
        path:'/',
        component: App
    },
    {
        path:'/login',
        component: Login
    },
    {
        path:'/ekleme',
        component: Ekleme
    },
    {
        path:'/sayfalama',
        component: Listeleme
    },
    


];