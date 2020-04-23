/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import AnimalIndex from './components/animal/AnimalIndex.vue';
import AnimalCreate from './components/animal/AnimalCreate.vue';
import AnimalEdit from './components/animal/AnimalEdit.vue';

const routes = [
    {
        path: '/',
        components: {
            AnimalIndex: AnimalIndex
        }
    },
    {path: '/api/animal/create', component: AnimalCreate, name: 'createAnimal'},
    {path: '/api/animal/edit/:id', component: AnimalEdit, name: 'editAnimal'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
