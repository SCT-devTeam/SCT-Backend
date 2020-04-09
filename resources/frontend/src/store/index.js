import Vue from "vue";
import Vuex from "vuex";
import VuexPersist from "vuex-persist";

Vue.use(Vuex);

const vuexPersist = new VuexPersist({
    key: "SCT-app",
    storage: window.localStorage
});

// TODO: Apply naming conventions : https://docs.vuestorefront.io/guide/vuex/vuex-conventions.html
export default new Vuex.Store({
    state: {
        user: {
            token: null,
            firstname: null,
            lastname: null,
            email: null,
            phone: null,
            notes: null,
            companies: null
        }
    },
    getters: {
        isLoggedIn: state => !(state.user.token === null), // TODO: change this by an api call
        user: state => {
            return {
                firstname: state.user.firstname || null,
                lastname: state.user.lastname || null,
                email: state.user.email || null,
                phone: state.user.phone || null,
                notes: state.user.notes || null,
                companies: state.user.companies || null
            };
        },
        token: state => state.user.token
    },
    mutations: {
        SET_TOKEN(state, token) {
            state.user.token = token || null;
        },
        SET_USER(state, userData) {
            state.user.firstname = userData.firstname || null;
            state.user.lastname = userData.lastname || null;
            state.user.email = userData.email || null;
            state.user.phone = userData.phone || null;
            state.user.notes = userData.notes || null;
            state.user.companies = userData.companies || null;
        }
    },
    actions: {},
    modules: {},
    plugins: [vuexPersist.plugin]
});
