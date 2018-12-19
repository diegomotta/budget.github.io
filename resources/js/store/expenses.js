import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

let expensesStore = new Vuex.Store({
        state: {
            expenses: [],
            typeexpenses: [],
            typeentries: [],
            totalEntry: 0,
            totalExpense: 0,
        },
        getters: {
            getTotalExpense(state){
                return function () {
                    return state.totalEntry;
                }
            },
            getTotalEntry(state){
                return function () {
                    return state.totalExpense;
                }
            },
            getTypeExpenses(state){
                return function () {
                    return state.typeexpenses;
                }
            },
            //devuelve por id de gasto/ingreso
            getExpenseById: (state, getters) => (id) => {
                return state.expenses.find(expense => expense.id === id)
            },
            //filtrar por tipo de gasto/ingreso
            getExpenseFilter: (state, getters) => (name) => {
                return state.expenses.filter(value => value.type_expense.type.toUpperCase().match(name.toUpperCase()))
            },
            //obtiene todo los tipos de ingresos
            getTypeEntries(state){
                return function () {
                    return state.typeentries;
                }
            },
        },
        mutations: {
            FETCH(state, expenses) {
                state.expenses = expenses;
            },
            FETCHTYPEEXPENSE(state, typeexpenses){
                state.typeexpenses = typeexpenses;
            },
            FETCHTYPENTRIES(state, typeentries) {
                state.typeentries = typeentries;
            },
            TOTALENTRY(state, totalEntry) {
                state.totalEntry = totalEntry;
            },
            TOTALEXPENSE(state, totalExpense) {
                state.totalExpense = totalExpense;

            },
        },
        actions: {

            //Methods to manager entries and expenses

            fetch({commit}) {
                const expenses = '/expenses';
                return axios.get(expenses)
                    .then(response => commit('FETCH', response.data))
                    .catch();
            },

            deleteExpense({}, expense) {
                let url = '/expenses/' + expense.id;
                axios.delete(url)
                    .then(() => {
                        this.dispatch('fetch');
                        this.dispatch('getTotalEntry');
                        this.dispatch('getTotalExpense');
                    });
            },
            updateExpense({}, expense) {
                let url = '/expenses/' + expense.id + '/update';
                axios.put(url, expense)
                    .then(() => {
                        this.dispatch('fetch');
                        this.dispatch('getTotalEntry');
                        this.dispatch('getTotalExpense');
                    });
            },
            createExpense({}, expense) {

                let url = '/expenses/store';
                axios.post(url, expense)
                    .then(() => {
                        this.dispatch('fetch');
                        this.dispatch('getTotalEntry');
                        this.dispatch('getTotalExpense');
                    });

            },


            //Methods to manager type of expenses

            fetchTypeExpense({commit}) {
                const typeexpenses = '/typeExpenses';
                return axios.get(typeexpenses)

                    .then(response => commit('FETCHTYPEEXPENSE', response.data))
                    .catch();
            },

            createTypeExpense({}, typeexpense) {
                let url = '/typeExpensez/store';
                axios.post(url, typeexpense)
                    .then(() => {
                        this.dispatch('fetchTypeExpense');


                    });

            },
            updateTypeExpense({}, typexpense) {

                let url = '/typeExpenses/' + typexpense.id + '/update';
                axios.put(url, typexpense)
                    .then(() => {
                        this.dispatch('fetchTypeExpense');
                    });

            },

            getTotalExpense({commit})
            {
                let url = '/expenses/totalexpense';
                return axios.get(url)
                    .then(response => commit('TOTALEXPENSE', response.data))
                    .catch();
            },

            //Methods to manager type of entries


            fetchTypeEntries({commit}) {
                let url = '/typeEntries';
                return axios.get(url)
                    .then(response => commit('FETCHTYPENTRIES', response.data))
                    .catch();
            },

            createTypeEntry({}, typeentry) {
                let url = '/typeEntries/store';
                axios.post(url, typeentry)
                    .then(() => {
                        this.dispatch('fetchTypeEntries');

                    });

            },

            updateTypeEntry({}, typeentry) {

                let url = '/typeEntries/' + typeentry.id + '/update';
                axios.put(url, typeentry)
                    .then(() => {
                        this.dispatch('fetchTypeEntries');
                    });

            },

            getTotalEntry({commit})
            {
                let url = '/expenses/totalentry';

                return axios.get(url)
                    .then(response => commit('TOTALENTRY', response.data))
                    .catch();
            }

        }

    })
;


export default expensesStore;