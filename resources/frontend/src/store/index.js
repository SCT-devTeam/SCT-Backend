import Vue from "vue";
import Vuex from "vuex";
import VuexPersist from "vuex-persist";

Vue.use(Vuex);

const vuexPersist = new VuexPersist({
    key: "SCT-app",
    storage: window.localStorage
});

export default new Vuex.Store({
    state: {
        user: null
    },
    getters: {
        isLoggedIn: state => !(state.user === null)
    },
    mutations: {
        UPDATE_CURRENT_USER: (state, userData) => {
            state.user = userData;
        },
        LOGOUT_USER: state => {
            state.user = null;
        }
    },
    actions: {},
    modules: {},
    plugins: [vuexPersist.plugin]
});
