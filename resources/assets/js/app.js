
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
 window.Vue.use(VueRouter);
 import VueSwal from 'vue-swal'
 import Spinner from 'vue-simple-spinner'

 window.Vue.use(VueSwal)
 window.Vue.use(Spinner)

Vue.component('vue-simple-spinner',require('vue-simple-spinner'))
Vue.component('selectize-component', require('vue2-selectize'));
Vue.component('vue-pagination', require('laravel-vue-pagination'));


import CompanyIndex from './components/company/CompanyIndex.vue';
import CompanyCreate from './components/company/CompanyCreate.vue';
import CompanyEdit from './components/company/CompanyEdit.vue';

 const routes = [ 
 {
 	path: '/',
 	components: {
 		companyIndex: CompanyIndex
 	},
 	name : 'indexCompany'
 }, {path: '/create-company', component: CompanyCreate, name: 'createCompany'}
 , {path: '/edit-company/:id', component: CompanyEdit, name: 'editCompany'}]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
