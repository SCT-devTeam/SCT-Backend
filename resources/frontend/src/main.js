import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

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
