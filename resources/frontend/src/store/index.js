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
        quotes: null,
        invoices: null,
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
        getCompanies: state => state.companies,
        getActiveCompany: state => state.user.companies,
        getCompanyByID: state => company_id =>
            state.companies.find(company => company.id === company_id),
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
        getCustomerByID: state => customer_id =>
            state.customers.find(customer => customer.id === customer_id),
        getCustomerContacts: state => customer_id =>
            state.contacts.filter(contact => contact.customer === customer_id),
        getContactByID: state => contact_id =>
            state.contacts.find(contact => contact.id === contact_id),
        getQuotes: state => state.quotes,
        getQuoteByID: state => quote_id =>
            state.quotes.find(quote => quote.id === quote_id),
        getInvoices: state => state.invoices,
        getInvoiceByID: state => invoice_id =>
            state.invoices.find(invoice => invoice.id === invoice_id),
        getReceipts: state => state.receipts,
        getReceiptByID: state => receipt_id =>
            state.receipts.find(receipt => receipt.id === receipt_id)
    },
    mutations: {
        SET_TOKEN(state, token) {
            state.user.token = token || null;
            token
                ? (axios.defaults.headers.common.Authorization = `Bearer ${token}`)
                : null;
        },
        REMOVE_TOKEN(state) {
            state.user.token = null;
        },
        SET_USER(state, data) {
            state.user.firstname = data.firstname || null;
            state.user.lastname = data.lastname || null;
            state.user.email = data.email || null;
            state.user.gender = data.gender || null;
            state.user.phone = data.phone || null;
            state.user.notes = data.notes || null;
            state.user.companies = data.companies || null;
        },
        REMOVE_USER(state) {
            state.user.firstname = null;
            state.user.lastname = null;
            state.user.email = null;
            state.user.gender = null;
            state.user.phone = null;
            state.user.notes = null;
            state.user.companies = null;
        },
        SET_COMPANIES(state, data) {
            state.companies = data;
        },
        SET_CUSTOMERS(state, data) {
            state.customers = data;
        },
        SET_CONTACTS(state, data) {
            state.contacts = data;
        },
        SET_QUOTES(state, data) {
            state.quotes = data;
        },
        SET_INVOICES(state, data) {
            state.invoices = data;
        },
        SET_RECEIPTS(state, data) {
            state.receipts = data;
        }
    },
    actions: {
        // TODO: set name to requests (for network tab in devtools)
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

                            // TODO: Add check on commit, if fail; throw an error
                            commit("SET_TOKEN", token);

                            dispatch("fetchUser").then(() => {
                                dispatch("fetchData");
                            });

                            resolve(response.data);
                        } else {
                            reject(response.status);
                        }
                    })
                    .catch(error => {
                        reject(error);
                    });
            });
        },
        logoutUser({ commit }) {
            return new Promise((resolve, reject) => {
                axios
                    .get("/api/logout")
                    .then(response => {
                        if (response.status === 200) {
                            // TODO: Add check on commit, if fail; throw an error
                            commit("REMOVE_TOKEN");
                            commit("REMOVE_USER");
                            // TODO: create all REMOVE commit for all entities & create an action to use them all

                            resolve(response.data);
                        } else {
                            reject(response.status);
                        }
                    })
                    .catch(error => {
                        reject(error);
                    });
            });
        },
        fetchData({ dispatch }) {
            // TODO: add promise to return true if all request are done without error else return it
            dispatch("fetchCompanies");
            dispatch("fetchCustomers");
            dispatch("fetchContacts");
            dispatch("fetchQuotes");
            dispatch("fetchInvoices");
            // TODO: add a fetching indicator (FIX: error on display data if the user go too clickly in views)
            // TODO: add fetchReceipts
        },

        fetchUser({ commit }) {
            return new Promise((resolve, reject) => {
                axios
                    .get("/api/me")
                    .then(response => {
                        // TODO: FIX: this eslint error in all actions
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        commit("SET_USER", response.data);

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },

        fetchCompanies({ commit }) {
            return new Promise((resolve, reject) => {
                axios
                    .get("/api/company")
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        commit("SET_COMPANIES", response.data);

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        // TODO: Implement insertCompany

        fetchCustomers({ commit, state }) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/customers", {
                        id_company: state.user.companies
                    })
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        commit("SET_CUSTOMERS", response.data);

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        createCustomer({ dispatch }, customerObj) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/createCustomer", customerObj)
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        dispatch("fetchCustomers");

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        updateCustomer({ dispatch }, customerObj) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/updateCustomer", customerObj)
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        dispatch("fetchCustomers");

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        deleteCustomer({ dispatch }, customer_id) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/deleteCustomer", { id: customer_id })
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        dispatch("fetchCustomers");

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },

        fetchContacts({ state, commit }) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/allContact", {
                        id_company: state.user.companies
                    })
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        commit("SET_CONTACTS", response.data);

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        getContacts(_, customer_id) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/contact", { id_customer: customer_id })
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        createContact(_, contactObj) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/createContact", contactObj)
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        updateContact(_, contactObj) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/updateContact", contactObj)
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        deleteContact(_, contact_id) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/contact", { id_contact: contact_id })
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },

        fetchQuotes({ commit }) {
            return new Promise((resolve, reject) => {
                axios
                    .get("/api/allQuote")
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        commit("SET_QUOTES", response.data);

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        createQuote({ dispatch }, quoteObj) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/createQuote", quoteObj)
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        dispatch("fetchQuotes");

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        updateQuote({ dispatch }, quoteObj) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/updateQuote", quoteObj)
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        dispatch("fetchQuotes");

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        deleteQuote({ dispatch }, quote_id) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/updateQuote", { id: quote_id })
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        dispatch("fetchQuotes");

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },

        fetchInvoices({ commit }) {
            return new Promise((resolve, reject) => {
                axios
                    .get("/api/allInvoice")
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        commit("SET_INVOICES", response.data);

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        createInvoice({ dispatch }, invoiceObj) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/createInvoice", invoiceObj)
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        dispatch("fetchInvoices");

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        updateInvoice({ dispatch }, invoiceObj) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/updateInvoice", invoiceObj)
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        dispatch("fetchQuotes");

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        },
        deleteInvoice({ dispatch }, invoice_id) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/updateQuote", { id: invoice_id })
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            reject(response.message);
                        }

                        dispatch("fetchQuotes");

                        resolve(response.data);
                    })
                    .catch(reason => {
                        reject(reason);
                    });
            });
        }
    },
    modules: {},
    plugins: [vuexPersist.plugin]
});
