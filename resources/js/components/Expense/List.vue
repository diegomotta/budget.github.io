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
                        <tr @click="toggleModal(expense)" v-for="(expense, index) in expensesfilter">
                            <td>{{expense.id}}</td>
                            <td>{{expense.created_at}}</td>
                            <td>{{expense.type_expense.type}}</td>
                            <td>{{expense.value}}</td>
                            <td><button class="btn btn-xs btn-danger" @click.stop="deleteExpense(expense)"><i class="fas fa-trash"></i></button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <modalEdit v-show="isModalVisible" @close="closeModalEdit"></modalEdit>
            </div>
        </div>
    </div>

</template>
<script>
    import store from '../../store/expenses'
    import {mapState} from 'vuex';
    import modalEdit from '../../components/Expense/ModalEdit.vue';
    import EventBus from '../../EventBus/eventbus';

    export default{

        data(){
            return {
                search: "",
                isModalVisible: false,

            }
        },
        components: {
            modalEdit,
        },
        mounted() {
            this.$store.dispatch('fetch');
            this.$store.dispatch('getTotalEntry');
            this.$store.dispatch('getTotalExpense');
        },
        computed: {
            ...mapState(['expenses']),
            expensesfilter(){
                return this.$store.getters.getExpenseFilter(this.search);
            },
            expensesLength() {
                return this.expenses.length;
            }
        },
        methods: {
            toggleModal(expense) {
                this.isModalVisible = true;
                EventBus.$emit('toggleModal', expense);
            },
            closeModalEdit() {
                this.isModalVisible = false;
                this.$router.push({name: "main"});
            }
            ,
            deleteExpense(expense){
                this.$store.dispatch('deleteExpense', expense);
            }
        }

    }
</script>