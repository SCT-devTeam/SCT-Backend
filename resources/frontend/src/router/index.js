import Vue from "vue";
import VueRouter from "vue-router";
import store from "../store/index";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "Dashboard",
        component: () =>
            import(/* webpackChunkName: "dashboard" */ "../views/Dashboard.vue")
    },
    {
        path: "/login",
        name: "Login",
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import(/* webpackChunkName: "login" */ "../views/Login.vue")
    },
    {
        path: "/logout",
        name: "Logout",
        component: () =>
            import(/* webpackChunkName: "logout" */ "../views/Logout.vue")
    }
    // TOO: add 404 fallback for bad urls
    // { path: '*', component: NotFoundComponent }
];

const router = new VueRouter({
    mode: "history",
    base: "/",
    routes
});

router.beforeEach((to, from, next) => {
    const publicPages = ["/login"];
    const authRequired = !publicPages.includes(to.path);
    // const storedUser = localStorage.getItem('user') === "" ? null : localStorage.getItem('user');

    if (authRequired && !store.getters.isLoggedIn) {
        return next("/login");
    }
    next();
});

export default router;
