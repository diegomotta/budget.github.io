<template>
    <div>
        <div class="ibox ">
            <div class="ibox-content">
                <div>
                    <h3 class="font-bold no-margins">
                        Registrar gastos
                    </h3>
                </div>
                <div class="m-t-sm">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Cantidad gastada</label>
                                    <input type="number" placeholder="" class="form-control" v-model="expense">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cantidad gastada</label>
                                    <select class="form-control m-b" v-model="typeExpense">
                                        <option v-for="option in typeExpenses" v-bind:value="option.id">{{option.type}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <button type="button" @click="createExpense" class="btn btn-w-m btn-block btn-success">Registrar</button>

                </div>
            </div>


        </div>
    </div>

</template>

<script>
    export default {
        data() {
            // declare message with an empty value
            return {
                expense: 0,
                typeExpenses: [],
                typeExpense:""
            }
        },

        methods: {

            getTypeExpenses: function () {
                axios.get('/typeExpenses')
                    .then(res => {
                        this.typeExpenses = res.data;
                    });
            },
            createExpense: function () {
                let expense = {
                    "expense" : this.expense,
                    "type" :this.typeExpense,
                    "amount" :2,

                } ;
                this.$store.dispatch('createExpense', expense);
                this.$router.push({name:"principal"});

            }
        },
        mounted() {
            this.getTypeExpenses();
        },

    }
</script>
