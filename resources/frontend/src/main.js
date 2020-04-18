import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from "axios";
import VueAxios from "vue-axios";

Vue.use(VueAxios, axios);

// TODO: add env var for baseURL
const baseURL =
    window.location.hostname === "localhost"
        ? "http://localhost:8000"
        : "https://" + window.location.hostname;

if (typeof baseURL !== "undefined") {
    Vue.axios.defaults.baseURL = baseURL;
}

(async function() {
    await store.restored;
    if (store.state.user.token != null) {
        axios.defaults.headers.common[
            "Authorization"
        ] = `Bearer ${store.state.user.token}`;
    }
})();

Vue.config.productionTip = false;

// TODO: export the snippet to a separated file
Vue.component("v-style", {
    render: function(createElement) {
        return createElement("style", this.$slots.default);
    }
});

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app");
