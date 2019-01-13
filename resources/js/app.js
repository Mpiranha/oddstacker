
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('odd-header', require('./components/Header.vue'));
Vue.component('stack-nav', require('./components/StackNav.vue'));
Vue.component('stack-box', require('./components/StackBox.vue'));
Vue.component('amount-box', require('./components/AmountBox.vue'));
Vue.component('right-fancy-box', require('./components/Box2.vue'));
Vue.component('left-fancy-box', require('./components/Box3.vue'));
Vue.component('fancy-top-bottom', require('./components/Box4.vue'));
Vue.component('main-nav', require('./components/MainNav.vue'));
Vue.component('payment-bar', require('./components/Paymentbar.vue'));




// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
