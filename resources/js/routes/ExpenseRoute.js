import Vue from 'vue'
import Router from 'vue-router'

import Main from '../components/Main.vue'
import CreateEntry from '../components/Expense/CreateEntry.vue'
import CreateExpense from '../components/Expense/CreateExpense.vue'

Vue.use(Router)

var router = new Router({
    mode: 'history',
    routes: [

        {
            path: '/main', component: Main, name: "principal",
            children: [
                {path: '/entry', component: CreateEntry, name: "ingreso"},
                {path: '/expense', component: CreateExpense, name: "egreso"}
            ]
        },
    ]
});

export default  router;