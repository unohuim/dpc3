/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';


import Vue from 'vue';

import VueRouter from 'vue-router';

import Vue2TouchEvents from 'vue2-touch-events';


window.Vue = Vue;

Vue.use(VueRouter);

Vue.use(Vue2TouchEvents);



import router from './routes';






try {
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('popper.js').default;
    // require('bootstrap');
} catch (e) {}


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


//UI
Vue.component('inventory-view', require('./components/UI/inventoryview.vue').default);
Vue.component('icon', require('./components/UI/Icon.vue').default);
Vue.component('input-text', require('./components/UI/InputText').default);
Vue.component('collection', require('./components/UI/Collection').default);
Vue.component('collection-item', require('./components/UI/CollectionItem').default);


Vue.component('crud-index', require('./components/CRUD/index.vue').default);



Vue.component('navbar', require('./components/nav/navbar.vue').default);
Vue.component('nav-link', require('./components/nav/navlink.vue').default);

Vue.component('user-menu', require('./components/nav/usermenu.vue').default);
Vue.component('dropdown-item', require('./components/nav/dropdownitem.vue').default);
Vue.component('dropdown-accordion', require('./components/nav/dropdownaccordion.vue').default);
Vue.component('navmenu-accordions', require('./components/nav/navmenuaccordions.vue').default);

Vue.component('logout', require('./components/nav/logout.vue').default);



//PARTIALS
//Vue.component('create-leadssource', require('./components/views/admin/leads/sources/create').default);







/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({

    el: '#app',

    router
    

}).$mount('#app')


