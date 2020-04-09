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
    },
    {
        path: "/customers",
        name: "Customers",
        component: () =>
            import(/* webpackChunkName: "logout" */ "../views/Customers.vue")
    },
    {
        path: "/writings",
        name: "Writings",
        component: () =>
            import(/* webpackChunkName: "logout" */ "../views/Writings.vue")
    },
    {
        path: "/receipt-book",
        name: "ReceiptBook",
        component: () =>
            import(/* webpackChunkName: "logout" */ "../views/ReceiptBook.vue")
    },
    {
        path: "/profile",
        name: "Profile",
        component: () =>
            import(/* webpackChunkName: "profile" */ "../views/Profile.vue")
    },
    {
        path: '*',
        redirect: "/"
    }
    // TOO: add 404 fallback for bad urls
];

const router = new VueRouter({
    mode: "history",
    base: "/",
    routes
});

router.beforeEach((to, from, next) => {
    const publicPages = ["/login"];
    const authRequired = !publicPages.includes(to.path);

    if (authRequired && store.getters.isLoggedIn === false) {
        next({
            name: "Login",
            replace: true
        });
    } else if (to.name === "Login" && store.getters.isLoggedIn) {
        next({
            name: "Dashboard",
            replace: true
        });
    } else next();
});

export default router;
