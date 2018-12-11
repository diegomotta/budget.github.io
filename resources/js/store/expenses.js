import Vue from 'vue';
import Vuex from 'vuex';
import expenses from '../Api/expenses';

Vue.use(Vuex);

let expensesStore = new Vuex.Store({
        state: {
            expenses: [],
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
            }
        },
        mutations: {
            FETCH(state, expenses) {
                state.expenses = expenses;
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
                return axios.get(expenses)
                    .then(response => commit('FETCH', response.data))
                    .catch();
            },

            deleteExpense({}, id) {
                let url = '/expenses/' + id;
                axios.delete(url)
                    .then(() => this.dispatch('fetch'))
                    .catch();
            },
            updateExpense({}, expense) {
                let url = '/expenses/' + expense.id + '/edit';
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