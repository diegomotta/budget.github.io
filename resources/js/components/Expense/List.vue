<template>
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Ingresos y Gastos </h5>

            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-9 m-b-xs">

                    </div>
                    <div class="col-sm-3">
                        <div class="input-group mb-3">
                            <span class="input-group-addon"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="Buscar ingreso/gasto " v-model="search">

                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th>#</th>
                            <th>Fecha</th>
                            <th>Tipo de ingreso/gasto</th>
                            <th>Monto</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(expense, index) in expensesfilter">
                            <td>{{expense.id}}</td>
                            <td>{{expense.created_at}}</td>
                            <td>{{expense.type_expense.type}}</td>
                            <td>{{expense.value}}</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</template>
<script>
    import store from '../../store/expenses'
    import { mapState } from 'vuex';

    export default{

        data(){
            return{
                search:""
            }
        },
        mounted() {
            this.$store.dispatch('fetch');
            this.$store.dispatch('getTotalEntry');
            this.$store.dispatch('getTotalExpense');

        },
        computed: {
            ...mapState(['expenses']),
            expensesfilter: function () {
                return this.expenses.filter(value => {
                    return value.type_expense.type.toUpperCase().match(this.search.toUpperCase());
                })
            },
            expensesLength() {
                return this.expenses.length;
            }
        }

    }
</script>