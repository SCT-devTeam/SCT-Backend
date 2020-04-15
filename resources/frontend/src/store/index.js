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
            gender: null,
            email: null,
            phone: null,
            notes: null,
            companies: null
        },
        company: null,
        customers: null,
        contacts: null,
        writings: null,
        receipts: [
            {
                id: 0,
                date: "01/01/2020",
                company: "Company",
                items: [
                    {
                        id: 0,
                        label: "item 2",
                        quantity: 1,
                        price: 10
                    },
                    {
                        id: 1,
                        label: "item 2",
                        quantity: 1,
                        price: 20
                    },
                    {
                        id: 2,
                        label: "item 3",
                        quantity: 3,
                        price: 15
                    },
                    {
                        id: 3,
                        label: "item 4",
                        quantity: 2,
                        price: 0.75
                    }
                ]
            },
            {
                id: 1,
                date: "15/03/2020",
                company: "Company",
                items: [
                    {
                        id: 0,
                        label: "item 2",
                        quantity: 1,
                        price: 10
                    },
                    {
                        id: 1,
                        label: "item 2",
                        quantity: 1,
                        price: 20
                    },
                    {
                        id: 2,
                        label: "item 3",
                        quantity: 3,
                        price: 15
                    },
                    {
                        id: 3,
                        label: "item 4",
                        quantity: 2,
                        price: 0.75
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
                gender: state.user.gender || null,
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
            state.user.gender = userData.gender || null;
            state.user.phone = userData.phone || null;
            state.user.notes = userData.notes || null;
            state.user.companies = userData.companies || null;
        },
        SET_CUSTOMERS(state, data) {
            state.customers = data;
        },
        SET_CONTACTS(state, data) {
            state.contacts = data;
        },
        SET_COMPANY(state, data) {
            state.company = data;
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
                            // Add check on commit
                            commit("SET_TOKEN", token);
                            dispatch("fetchUser", token);
                            dispatch("fetchCompany");
                            dispatch("fetchCustomers");
                            dispatch("fetchContacts");
                            // dispatch("fetchQuotes");
                            dispatch("fetchInvoices");

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
        },
        async fetchCompany({ commit, state }) {
            axios
                .get("/api/company", {
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        Authorization: `Bearer ${state.user.token}`
                    }
                })
                .then(data => {
                    if (data.message) {
                        console.error(
                            "An error has occurred while fetching customers data : ",
                            data.message
                        );
                    }
                    commit("SET_COMPANY", data.data[0]);
                })
                .catch(reason => {
                    console.error(reason);
                });
        },
        async fetchCustomers({ commit, state }) {
            axios
                .post("/api/customers", {
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        Authorization: `Bearer ${state.user.token}`
                    },
                    data: {
                        id_company: state.user.companies
                    }
                })
                .then(data => {
                    if (data.message) {
                        console.error(
                            "An error has occurred while fetching customers data : ",
                            data.message
                        );
                    }
                    commit("SET_CUSTOMERS", data.data);
                })
                .catch(reason => {
                    console.error(reason);
                });
        },
        async fetchContacts({ commit, state }) {
            axios
                .post("/api/contact", {
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        Authorization: `Bearer ${state.user.token}`
                    },
                    data: {
                        id_company: state.user.companies
                    }
                })
                .then(data => {
                    if (data.message) {
                        console.error(
                            "An error has occurred while fetching contacts data : ",
                            data.message
                        );
                    }
                    commit("SET_CONTACTS", data.data);
                })
                .catch(reason => {
                    console.error(reason);
                });
        },
        // TODO: FIX: Waiting API fix : route return an empty array on get & post doesn't work
        // async fetchQuotes({ commit, state }) {
        //     axios
        //         .post("/api/allQuote", {
        //             headers: {
        //                 "Content-Type": "application/json",
        //                 Accept: "application/json",
        //                 Authorization: `Bearer ${state.user.token}`
        //             }
        //         })
        //         .then(data => {
        //             if (data.message) {
        //                 console.error(
        //                     "An error has occurred while fetching customers data : ",
        //                     data.message
        //                 );
        //             }
        //             commit("SET_CUSTOMERS", data.data);
        //         })
        //         .catch(reason => {
        //             console.error(reason);
        //         });
        // }
        async fetchInvoices({ commit, state }) {
            axios
                .get("/api/allInvoice", {
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        Authorization: `Bearer ${state.user.token}`
                    }
                })
                .then(data => {
                    if (data.message) {
                        console.error(
                            "An error has occurred while fetching contacts data : ",
                            data.message
                        );
                    }
                    commit("SET_CONTACTS", data.data.invoices);
                })
                .catch(reason => {
                    console.error(reason);
                });
        }
    },
    modules: {},
    plugins: [vuexPersist.plugin]
});
