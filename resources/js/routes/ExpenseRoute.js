import Vue from 'vue'
import Router from 'vue-router'

import Main from '../components/Main.vue'
import CreateEntry from '../components/Expense/CreateEntry.vue'
import CreateExpense from '../components/Expense/CreateExpense.vue'
import TypeExpense from '../components/TypeExpense/TypeExpense.vue'
import TypeEntry from '../components/TypeEntry/TypeEntry.vue'

Vue.use(Router)

var router = new Router({
    mode: 'history',
    routes: [

        {
            path: '/main', component: Main, name: "main",
            children: [
                {path: '/entry', component: CreateEntry, name: "ingreso"},
                {path: '/expense', component: CreateExpense, name: "egreso"}
            ],
        },
        {
            path: '/tipo-de-gastos', component: TypeExpense, name:"typeExpenses",
        },
        {
            path: '/tipo-de-ingresos', component: TypeEntry, name:"typeEntries",
        }
    ]
});

export default  router;