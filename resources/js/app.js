
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import ProduitsIndex from './components/produits/ProduitsIndex.vue';
import ProduitsCreate from './components/produits/ProduitsCreate.vue';
import ProduitsEdit from './components/produits/ProduitsEdit.vue';
import ChartContainer from './components/produits/ChartContainer.vue';

const routes = [
    {
        path: '/',
        components: {
            produitsIndex: ProduitsIndex
        }
    },
    { path: '/admin/produits/create', component: ProduitsCreate, name: 'createProduit' },
    { path: '/admin/produits/edit/:id', component: ProduitsEdit, name: 'editProduit' },
    { path: '/admin/produits/edit/:id/stats', component: ChartContainer, name: 'ChartContainer' },
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
