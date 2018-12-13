import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

let expensesStore = new Vuex.Store({
        state: {
            expenses: [],
            typeexpenses: [],
            typeentries:[],
            totalEntry: 0,
            totalExpense: 0,
        },
        getters:{
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
            }
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
            fetch({commit}) {

                const expenses = '/expenses';
                return axios.get(expenses)
                    .then(response => commit('FETCH', response.data))
                    .catch();
            },
            fetchTypeExpense({commit}) {
                const typeexpenses = '/typeExpenses';
                return axios.get(typeexpenses)

                    .then(response => commit('FETCHTYPEEXPENSE', response.data))
                    .catch();
            },
            fetchTypeEntries({commit}) {
                let url = '/typeEntries'
                return axios.get(url)
                    .then(response => commit('FETCHTYPENTRIES', response.data))
                    .catch();
            },

            deleteExpense({}, id) {
                let url = '/expenses/' + id;
                axios.delete(url)
                    .then(() => this.dispatch('fetch'))
                    .catch();
            },
            updateExpense({}, expense) {
                let url = '/expenses/' + expense.id + '/update';
                axios.put(url, expense)
                    .then(() => this.dispatch('fetch'));
            },
            createExpense({}, expense) {

                let url = '/expenses/store'
                axios.post(url, expense)
                    .then(() => {
                        this.dispatch('fetch');
                        this.dispatch('getTotalEntry');
                        this.dispatch('getTotalExpense');

                    });

            },
            createTypeExpense({}, typeexpense) {
                let url = '/typeExpense/store'
                axios.post(url, typeexpense)
                    .then(() => {
                        this.dispatch('fetchTypeExpense');


                    });

            },
            updateTypeExpense({}, typexpense) {

                let url = '/typeExpense/'+ typexpense.id+'/update';
                axios.put(url, typexpense)
                    .then(() => {
                        this.dispatch('fetchTypeExpense');
                    });

            },
            createTypeEntry({}, typeentry) {
                let url = '/typeEntry/store'
                axios.post(url, typeentry)
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
            ,
            getTotalExpense({commit})
            {
                let url = '/expenses/totalexpense';

                return axios.get(url)
                    .then(response => commit('TOTALEXPENSE', response.data))
                    .catch();
            }
        }

    })
;


export default expensesStore;