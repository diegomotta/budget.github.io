<template>
    <div>

        <div class="wrapper-content">
            <div class="ibox float-e-margins ">
                <div class="ibox-title">
                    <h5>
                        Tipo de gastos
                    </h5>
                    <div class="ibox-tools">
                        <div class="btn-group">
                            <router-link :to="{name:'main'}"><a class="btn"
                                                                style="margin-top: -7px;color: #333 !important;background-color: #fff !important;border-color: #ccc !important;">Volver </a>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
            <type-expense-list></type-expense-list>
        </div>
    </div>
</template>
<script>
    import ExpenseList from '../../components/TypeExpense/List';

    export default{
        components: {
            'type-expense-list': ExpenseList,
        },
        data(){
            return{
                typeExpense:""
            }
        }
    }
</script>