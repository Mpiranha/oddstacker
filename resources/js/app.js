
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import { store } from './store/store';
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
Vue.component('right-fancy-box', require('./components/FancyRightBtn.vue'));
Vue.component('left-fancy-box', require('./components/FancyLeftBtn.vue'));
Vue.component('fancy-top-bottom', require('./components/FancyTopBotBtn.vue'));
Vue.component('main-nav', require('./components/MainNav.vue'));
Vue.component('footer-comp', require('./components/Footer.vue'));
Vue.component('stock-nav', require('./components/StocksNav.vue'));
Vue.component('date-picker', require('./components/DatePicker.vue'));
Vue.component('stack-box-new', require('./components/StackBoxNew.vue'));
Vue.component('team-view-box', require('./components/TeamViewBox.vue'));
Vue.component('new-box', require('./components/Newbox.vue'));
Vue.component('second-box', require('./components/SecondBox.vue'));
Vue.component('leader-box', require('./components/LeaderBox.vue'));
Vue.component('db-stackshell-box', require('./components/StackTeamViewBox.vue'));
Vue.component('tie-breaker-box', require('./components/TieBreakerBox.vue'));
Vue.component('single-breaker-box', require('./components/TieBreakSingle.vue'));
Vue.component('bank-details', require('./components/BankDetailBox.vue'));
Vue.component('account-details', require('./components/AccountDetailBox.vue'));
Vue.component('search-match-tab', require('./components/searchMatchTab.vue'));


const app = new Vue({
    store: store,
    el: '#app',
    data: function(){
        return {
            showingTab: 'all'
        }
    },
    mounted: function(){
        
    },
    methods: {
        setShowingTab: function(showingTab){
            this.showingTab = showingTab
        }
    }
});
