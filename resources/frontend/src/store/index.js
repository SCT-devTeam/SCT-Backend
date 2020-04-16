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
        getContacts: state => state.contacts,
        getCustomerContacts: state => customer_id =>
            state.contacts.find(contact => contact.id_customer === customer_id),
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
            axios.defaults.headers.common.Authorization = `Bearer ${token}`;
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

                            resolve(true);
                        } else {
                            console.error(
                                `[vuex: loginUser] An error has occurred while login: ${response}`
                            );
                            reject(response.status);
                        }
                    })
                    .catch(error => {
                        console.error(`[vuex: loginUser] ${error}`);
                        reject(error);
                    });
            });
        },
        fetchData({ dispatch }) {
            // TODO: add promise to return true if all request are done without error else return it
            dispatch("fetchCompanies");
            dispatch("fetchCustomers");
            dispatch("fetchQuotes");
            dispatch("fetchInvoices");
            // TODO: add a fetching indicator
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
                            console.error(
                                "[vuex: loginUser] An error has occurred while fetching user"
                            );
                            reject(response.message);
                        }

                        commit("SET_USER", response.data);

                        resolve(true);
                    })
                    .catch(reason => {
                        console.error(`[vuex: loginUser] ${reason}`);
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
                            console.error(
                                "[vuex: fetchCompanies] An error has occurred while fetching companies"
                            );
                            reject(response.message);
                        }
                        commit("SET_COMPANIES", response.data);
                        resolve(true);
                    })
                    .catch(reason => {
                        console.error(`[vuex: fetchCompanies]${reason}`);
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
                            console.error(
                                `[vuex: fetchCustomers] An error has occurred while fetching customers ${response.message}`
                            );
                            reject(response.message);
                        }
                        commit("SET_CUSTOMERS", response.data);
                        resolve(true);
                    })
                    .catch(reason => {
                        console.error(`[vuex: fetchCustomers] ${reason}`);
                        reject(reason);
                    });
            });
        },
        saveCustomer({ dispatch }, customerObj) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/updateCustomer", customerObj)
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            console.error(
                                `[vuex: saveCustomer] An error has occurred while send customer : ${response.message}`
                            );
                            reject(response.message);
                        }
                        dispatch("fetchCustomers");
                        resolve(true);
                    })
                    .catch(reason => {
                        console.error(`[vuex: saveCustomer] ${reason}`);
                        reject(reason);
                    });
            });
        },
        // TODO: Implement createCustomer
        // TODO: Implement deleteCustomer

        getContacts(_, id_customer) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/contact", { id_customer: id_customer })
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            console.error(
                                `[vuex: getContacts] An error has occurred while getting contacts for the customer ${id_customer}`,
                                response.message
                            );
                            reject(response.message);
                        }
                        resolve(response.data);
                    })
                    .catch(reason => {
                        console.error(`[vuex: getContacts] ${reason}`);
                        reject(reason);
                    });
            });
        },
        // TODO: Implement updateCcontact
        // TODO: Implement createContact
        // TODO: Implement deleteContact

        fetchQuotes({ commit }) {
            return new Promise((resolve, reject) => {
                axios
                    .get("/api/allQuote")
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            console.error(
                                `[vuex: fetchQuotes] An error has occurred while fetching quotes : ${response.message}`
                            );
                            reject(response.message);
                        }
                        commit("SET_QUOTES", response.data);
                        resolve(true);
                    })
                    .catch(reason => {
                        console.error(`[vuex: fetchQuotes] ${reason}`);
                        reject(reason);
                    });
            });
        },
        updateQuote({ dispatch }, quote) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/updateQuote")
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            console.error(
                                `[vuex: updateQuote] An error has occurred while updating quote n°${quote.id} : ${response.message}`
                            );
                            reject(response.message);
                        }
                        dispatch("fetchQuotes");
                        resolve(true);
                    })
                    .catch(reason => {
                        console.error(`[vuex: updateQuote] ${reason}`);
                        reject(reason);
                    });
            });
        },
        // TODO: Implement createQuote
        // TODO: Implement deleteQuote

        fetchInvoices({ commit }) {
            return new Promise((resolve, reject) => {
                axios
                    .get("/api/allInvoice")
                    .then(response => {
                        // noinspection JSUnresolvedVariable
                        if (response.message) {
                            console.error(
                                `[vuex: fetchInvoices] An error has occurred while fetching invoices : ${response.message}`
                            );
                            reject(response.message);
                        }
                        commit("SET_INVOICES", response.data.invoices);
                        resolve(true);
                    })
                    .catch(reason => {
                        console.error(`[vuex: fetchInvoices] ${reason}`);
                        reject(reason);
                    });
            });
        }
        // TODO: Implement createInvoice
        // TODO: Implement updateInvoice
        // TODO: Implement deleteInvoice
    },
    modules: {},
    plugins: [vuexPersist.plugin]
});
