import Vue from "vue";
import Vuex from "vuex";
import VuexPersist from "vuex-persist";
import axios from "axios";

Vue.use(Vuex);

const vuexPersist = new VuexPersist({
    key: "SCT-app",
    storage: window.localStorage
});

// Naming conventions : https://docs.vuestorefront.io/guide/vuex/vuex-conventions.html
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
        },
        customers: {},
        writings: {},
        receipts: [
            {
                id: 0,
                company: "Company",
                customer: "Customer",
                items: [
                    {
                        id: 0,
                        label: "item label",
                        quantity: 1,
                        price: 10
                    },
                    {
                        id: 1,
                        label: "item label",
                        quantity: 3,
                        price: 30
                    }
                ]
            },
            {
                id: 1,
                company: "Company",
                customer: "Customer",
                items: [
                    {
                        id: 0,
                        label: "item label",
                        quantity: 1,
                        price: 10
                    },
                    {
                        id: 1,
                        label: "item label",
                        quantity: 3,
                        price: 30
                    }
                ]
            },
            {
                id: 2,
                company: "Company",
                customer: "Customer",
                items: [
                    {
                        id: 0,
                        label: "item label",
                        quantity: 1,
                        price: 10
                    },
                    {
                        id: 1,
                        label: "item label",
                        quantity: 3,
                        price: 30
                    }
                ]
            }
        ]
    },
    getters: {
        isLoggedIn: state => !(state.user.token === null), // TODO: change this by an api call
        getUser: state => {
            return {
                firstname: state.user.firstname || null,
                lastname: state.user.lastname || null,
                email: state.user.email || null,
                phone: state.user.phone || null,
                notes: state.user.notes || null,
                companies: state.user.companies || null
            };
        },
        getToken: state => state.user.token,
        getReceiptByID: state => receipt_id =>
            state.receipts.find(receipt => receipt.id === receipt_id)
        // console.log("entered in vuex");
        //
        // const receipts = state.receipts;
        //
        // receipts.forEach(receipt => {
        //     console.log(receipt.id + ' ' + receipt_id);
        //
        //     if (receipt.id === receipt_id) {
        //         console.log(receipt);
        //         return receipt;
        //     } else {
        //         console.log("ERROR");
        //         return null;
        //     }
        // });

        // for (const receipt of receipts) {
        //     console.log(receipt);
        //     if (receipt.id === receipt_id) {
        //         console.log(receipt);
        //         return receipt;
        //     } else {
        //         console.log("ERROR");
        //         return null;
        //     }
        // }
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
    actions: {
        loginUser({ commit, dispatch }, { email, password }) {
            return new Promise((resolve, reject) => {
                axios
                    .post(
                        "/api/airlock/login",
                        {
                            email: email,
                            password: password,
                            device_name: "Navigator"
                        },
                        {
                            headers: {
                                "Content-Type": "application/json",
                                Accept: "application/json"
                            }
                        }
                    )
                    .then(response => {
                        if (response.status === 200) {
                            const token = response.data.token;
                            commit("SET_TOKEN", token);
                            dispatch("fetchUser", token);

                            resolve(true);
                        } else {
                            reject(
                                `An error has occurred, code: ${response.status}`
                            );
                        }
                    })
                    .catch(error => {
                        reject(error);
                    });
            });
        },
        async fetchUser({ commit, state }) {
            axios
                .get("/api/me", {
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        Authorization: `Bearer ${state.user.token}`
                    }
                })
                .then(data => {
                    if (data.message) {
                        console.error(
                            "An error has occurred while fetching user data : ",
                            data.message
                        );
                    }
                    commit("SET_USER", data.data);
                })
                .catch(reason => {
                    console.error(reason);
                });
        }
    },
    modules: {},
    plugins: [vuexPersist.plugin]
});
