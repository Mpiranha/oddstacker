import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

export const store = new Vuex.Store({
    strict: true,
    state: {
        btnState: [
            {allActive: true, headActive: false, doubleActive: false, premiumActive: false}
        ],
        matchStartingSoon: [
            {match: "Man U  vs Real Madrid", time: "05:32:15" }
        ],
        mails: [
            {email: "customercare@odstackr.com", subject: "Welcome to Odstackr", mail: "You are humbly welcomed to odstackr and i want to get you started"}
        ],
        gameEntries: [],
        leaderboard: [
            // {
            //     pos: "1",
            //     username: "Mesh",
            //     score: "500",
            //     won: "50"
            // }
        ]
        
        
    },

    getters: {
        
    }, 

    mutations: {
        changeBtnState: function(state, payLoad) {
            var  newState = state.btnState.forEach(function(button){
                button.allActive = (payLoad == "allActive")? true: false;
                button.headActive = (payLoad == "headActive")? true: false;
                button.doubleActive = (payLoad == "doubleActive")? true: false;
                button.premiumActive = (payLoad == "premiumActive")? true: false;
            });

            return newState;
        }
    }
});