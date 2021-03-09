import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state:{
       token: localStorage.getItem('token') || '',
    },
    mutations:{
        setToken(state,token){
            localStorage.setItem('token',token);
            state.token = token;
        },
        clearToken(state){
            localStorage.removeItem('token');
            state.token = '';
        }
    }
});