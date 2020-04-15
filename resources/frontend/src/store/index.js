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
        companies: null,
        customers: null,
        contacts: null,
        quotes: [
            {
                id: 0,
                date: "01/01/2020",
                customer_id: 28,
                company_id: 22,
                status: "paid",
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
        ],
        invoices: [
            {
                id: 0,
                date: "01/01/2020",
                customer_id: 28,
                company_id: 1,
                status: "draft",
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
        ],
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
            },
            {
                id: 2,
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
            },
            {
                id: 3,
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
            },
            {
                id: 4,
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
            },
            {
                id: 5,
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
            },
            {
                id: 6,
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
            },
            {
                id: 7,
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
            },
            {
                id: 8,
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
        getProspects: state =>
            state.customers.filter(customer => customer.status === "prospect"),
        getCustomers: state =>
            state.customers.filter(customer => customer.status !== "prospect"),
        getActiveCustomers: state =>
            state.customers.filter(
                customer =>
                    customer.status !== "prospect" &&
                    customer.status !== "deleted"
            ),
        getQuotes: state => state.quotes,
        getInvoices: state => state.invoices,
        getCustomerByID: state => customer_id =>
            state.customers.find(customer => customer.id === customer_id),
        getReceiptByID: state => receipt_id =>
            state.receipts.find(receipt => receipt.id === receipt_id),
        getQuoteByID: state => quote_id =>
            state.quotes.find(quote => quote.id === quote_id),
        getInvoiceByID: state => invoice_id =>
            state.invoices.find(invoice => invoice.id === invoice_id),
        getCompanyByID: state => company_id =>
            state.companies.find(company => company.id === company_id)
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
            state.companies = data;
        },
        SET_QUOTES(state, data) {
            state.quotes = data;
        },
        SET_INVOICES(state, data) {
            state.invoices = data;
        }
    },
    actions: {
        loginUser({ commit, dispatch }, { email, password }) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/airlock/login", {
                        email: email,
                        password: password,
                        device_name: "Navigator"
                    })
                    .then(response => {
                        if (response.status === 200) {
                            const token = response.data.token;
                            // Add check on commit
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
        async fetchUser({ getter, commit, dispatch }) {
            axios
                .get("/api/me", {
                    headers: {
                        Authorization: getter.token
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
                    dispatch("fetchCompanies");
                    dispatch("fetchCustomers");
                    // dispatch("fetchQuotes");
                    // dispatch("fetchInvoices");
                })
                .catch(reason => {
                    console.error(reason);
                });
        },
        async fetchCompanies({ getter, commit }) {
            axios
                .get("/api/company", {
                    headers: {
                        Authorization: getter.token
                    }
                })
                .then(data => {
                    if (data.message) {
                        console.error(
                            "An error has occurred while fetching customers data : ",
                            data.message
                        );
                    }
                    commit("SET_COMPANY", data.data.comp);
                })
                .catch(reason => {
                    console.error(reason);
                });
        },
        async fetchCustomers({ getter, commit, state }) {
            axios
                .post(
                    "/api/customers",
                    { id_company: state.user.companies },
                    {
                        headers: {
                            Authorization: getter.token
                        }
                    }
                )
                .then(data => {
                    if (data.message) {
                        console.error(
                            "An error has occurred while fetching customers data : ",
                            data.message
                        );
                    }
                    commit("SET_CUSTOMERS", data.data["cust"]);
                })
                .catch(reason => {
                    console.error(reason);
                });
        },
        getContacts({ getter }, id_customer) {
            axios
                .post(
                    "/api/contact",
                    { id_customer: id_customer },
                    {
                        headers: {
                            Authorization: getter.token
                        }
                    }
                )
                .then(data => {
                    if (data.message) {
                        console.error(
                            "An error has occurred while fetching contacts data : ",
                            data.message
                        );
                    }
                    return data.data;
                })
                .catch(reason => {
                    console.error(reason);
                });
        },
        saveCustomer({ getter, dispatch }, customerObj) {
            axios
                .post("/api/updateCustomer", customerObj, {
                    headers: {
                        Authorization: getter.token
                    }
                })
                .then(data => {
                    if (data.message) {
                        console.error(
                            "An error has occurred while fetching contacts data : ",
                            data.message
                        );
                    }
                    dispatch("fetchCustomers");
                    return true;
                })
                .catch(reason => {
                    console.error(reason);
                });
        },
        // TODO: FIX: Waiting API fix : route return an empty array on get & post doesn't work
        async fetchQuotes({ getter, commit }) {
            axios
                .post(
                    "/api/allQuote",
                    {},
                    {
                        headers: {
                            Authorization: getter.token
                        }
                    }
                )
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
        async fetchInvoices({ getter, commit }) {
            // TODO: FIX: routes doesn't work !
            axios
                .get("/api/allInvoice", {
                    headers: {
                        Authorization: getter.token
                    }
                })
                .then(data => {
                    if (data.message) {
                        console.error(
                            "An error has occurred while fetching contacts data : ",
                            data.message
                        );
                    }
                    commit("SET_INVOICES", data.data.invoices);
                })
                .catch(reason => {
                    console.error(reason);
                });
        },
        async updateQuote({ getter, dispatch }, quote) {
            axios
                .post(
                    "/api/updateQuote",
                    {},
                    {
                        headers: {
                            Authorization: getter.token
                        }
                    }
                )
                .then(data => {
                    if (data.message) {
                        console.error(
                            `An error has occurred while updating quote n°${quote.id} data : ${data.message}`
                        );
                    }
                    dispatch("fetchQuotes");
                })
                .catch(reason => {
                    console.error(
                        `An error has occurred while updating quote n°${quote.id} data : ${reason}`
                    );
                });
        }
    },
    modules: {},
    plugins: [vuexPersist.plugin]
});
