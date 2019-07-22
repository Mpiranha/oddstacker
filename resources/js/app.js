
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import { store } from './store/store';

require('./bootstrap');

import Vue from 'vue';
 import Datetime from 'vue-datetime'
// You need a specific loader for CSS files
import 'vue-datetime/dist/vue-datetime.css'

Vue.use(Datetime);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */












// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('odd-header', require('./components/Header.vue').default);
Vue.component('stack-nav', require('./components/StackNav.vue').default);
Vue.component('stack-box', require('./components/StackBox.vue').default);
Vue.component('amount-box', require('./components/AmountBox.vue').default);
Vue.component('right-fancy-box', require('./components/FancyRightBtn.vue').default);
Vue.component('left-fancy-box', require('./components/FancyLeftBtn.vue').default);
Vue.component('fancy-top-bottom', require('./components/FancyTopBotBtn.vue').default);
Vue.component('main-nav', require('./components/MainNav.vue').default);
Vue.component('footer-comp', require('./components/Footer.vue').default);
Vue.component('stock-nav', require('./components/StocksNav.vue').default);
Vue.component('date-picker', require('./components/DatePicker.vue').default);
Vue.component('stack-box-new', require('./components/StackBoxNew.vue').default);
Vue.component('team-view-box', require('./components/TeamViewBox.vue').default);
Vue.component('new-box', require('./components/Newbox.vue').default);
Vue.component('second-box', require('./components/SecondBox.vue').default);
Vue.component('leader-box', require('./components/LeaderBox.vue').default);
Vue.component('db-stackshell-box', require('./components/StackTeamViewBox.vue').default);
Vue.component('tie-breaker-box', require('./components/TieBreakerBox.vue').default);
Vue.component('single-breaker-box', require('./components/TieBreakSingle.vue').default);
Vue.component('bank-details', require('./components/BankDetailBox.vue').default);
Vue.component('account-details', require('./components/AccountDetailBox.vue').default);
Vue.component('search-match-tab', require('./components/searchMatchTab.vue').default);
Vue.component('leaderboard-entry', require('./components/EntriesLeaderBoard.vue'));
Vue.component('event-show', require('./components/admin/events/show.vue').default);
Vue.component('event-create', require('./components/admin/events/createView.vue').default);
Vue.component('settings-modal', require('./components/modal/settings-modal.vue').default);
Vue.component('datetime', Datetime.default);
Vue.component('prediction-view', require('./components/admin/events/prediction-view.vue').default);
Vue.component('event-prediction', require('./components/admin/events/event-prediction.vue').default);
Vue.component('stock-index', require('./components/admin/stock/index.vue').default);

const app = new Vue({
    store,
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


