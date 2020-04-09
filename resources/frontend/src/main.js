import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from "axios";
import VueAxios from "vue-axios";

Vue.use(VueAxios, axios);

const baseURL =
    window.location.hostname === "localhost"
        ? "http://localhost:8000"
        : "https://" + window.location.hostname;

if (typeof baseURL !== "undefined") {
    Vue.axios.defaults.baseURL = baseURL;
}

Vue.config.productionTip = false;

// TODO: export the snippet to a separated file
Vue.component("v-style", {
    render: function (createElement) {
        return createElement("style", this.$slots.default);
    }
});

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app");
