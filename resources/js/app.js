require('./bootstrap');

window.Vue = require('vue');

//Vue.component('App', require('./components/App.vue').default);

import App from './components/App.vue';
import {routes} from './routes';
import VueRouter from 'vue-router';
import {store} from './store';

Vue.use(VueRouter);
const router = new VueRouter({
    routes,
    mode: 'history',
});

const app = new Vue({
    el: '#app',
    template:'<App />',
    components:{App },
    router:router,
    store:store,
    
});
