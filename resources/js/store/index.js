import http from "../http-common";

export default {
    state: {
        companies: [],
        currentCompany: "",
        vouchers: []
    },
    getters: {
        getCompanies(state) {
            return state.companies;
        },
        getVouchers(state) {
            return state.vouchers;
        },
        getCurrentCompany(state) {
            return state.currentCompany;
        }
    },

    actions: {
        getAllCompanies(context) {
            const uri = "/companies";
            http.get(uri)
                .then(response => {
                    context.commit("companies", response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getCompanyVouchers(context, companyId) {
            const uri = `/vouchers/${companyId}`;

            http.get(uri)
                .then(response => {
                    context.commit("vouchers", response.data.vouchers);
                    context.commit(
                        "currentCompany",
                        response.data.ragioneSociale
                    );
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getVouchers(context) {
            const uri = `/vouchers`;

            http.get(uri)
                .then(response => {
                    context.commit("vouchers", response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        },

        refresh() {
            this.dispatch("getAllCompanies");
            this.dispatch("getVouchers");
        },
        seedDB() {
            const uri = `/seed`;
            http.get(uri)
                .then(response => {
                    this.dispatch("refresh");
                })
                .catch(error => {
                    console.log(error);
                });
        },
        cleanDB() {
            const uri = `/clean`;
            http.get(uri)
                .then(response => {
                    this.dispatch("refresh");
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },

    mutations: {
        companies(state, data) {
            return (state.companies = data);
        },
        vouchers(state, data) {
            return (state.vouchers = data);
        },
        currentCompany(state, data) {
            return (state.currentCompany = data);
        }
    }
};
