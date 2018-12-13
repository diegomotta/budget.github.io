<template>
    <div>
        <div class="ibox ">
            <div class="ibox-content">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="text-align: center;">Registrar gasto</h3>
                        </div>
                        <div class="col-md-12">

                            <div class="form-group">
                                <label>Cantidad gastada</label>
                                <input type="number" placeholder="" class="form-control" v-model="expense">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Cantidad gastada</label>
                                <select class="form-control m-b" v-model="typeExpense">
                                    <option v-for="option in typeExpenses" v-bind:value="option.id">{{option.type}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" style="    text-align: center;">
                            <button class="btn  btn-warning" @click="close"><i class="fas fa-ban"></i> Cancelar</button>
                            <button type="button" @click="createExpense" class="btn btn-success pull-right"><i
                                    class="fas fa-save "></i> Registrar
                            </button>
                        </div>
                    </div>

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
                typeExpense: ""
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
                    "expense": this.expense,
                    "type": this.typeExpense,
                    "amount": 2,

                };
                this.$store.dispatch('createExpense', expense);
                this.$router.push({name: "main"});
                this.$parent.$emit('close');
            },
            close(){
                this.$parent.$emit('close');
                this.$router.push({name: "main"});
            }
        },
        mounted() {
            this.getTypeExpenses();
        },

    }
</script>
