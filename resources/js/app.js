/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import expenses from './store/expenses';
import VueRouter from 'vue-router';
import router from './routes/ExpenseRoute';

//Expenses
Vue.component('create-expense', require('./components/Expense/CreateExpense.vue'));
Vue.component('type-expense', require('./components/Parameters/TypeExpense.vue'));
Vue.component('list-expense', require('./components/Expense/List.vue'));

Vue.use(VueRouter);


import App from './components/App.vue'

// const baseRoutes = [
// ];

//Ejemplo para utilizar multiples archivos de rutas
// var allRoutes = []
// allRoutes = allRoutes.concat(SharedRoutes, AdminRoutes)

// const routes = baseRoutes.concat(ExpenseRoute);

// const router = new VueRouter({mode: "history", routes});

const app = new Vue({
    el: '#app',
    components: {App},
    router,
    store: expenses
});



