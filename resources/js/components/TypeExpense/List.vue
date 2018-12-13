<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5 v-if="!expense.id ">Crear tipo de gasto </h5>
                        <h5 v-else>Modificar tipo de gasto <b>{{expense.name}}</b></h5>

                    </div>
                    <div class="ibox-content">
                        <form @submit="save">
                            <div class="form-group" :class="{'has-error': $v.expense.type.$error }">
                                <label class="control-label form-group"
                                       :class="{'text-danger': $v.expense.type.$error }">Tipo de gasto</label>
                                <input type="text" placeholder="" class="form-control"
                                       v-model.trim="$v.expense.type.$model">
                                <p class="help-block" style="color: #ed5565;"
                                   v-if="$v.expense.type.$error == true && !$v.expense.type.required">
                                    El tipo es requerido</p>
                                <p class="help-block" style="color: #ed5565;"
                                   v-if="$v.expense.type.$error == true && !$v.expense.type.minLength">
                                    EL tipo debe tener al menos {{$v.expense.type.$params.minLength.min}} letras.</p>

                            </div>
                            <div class="form-group">
                                <button v-if="expense.id" @submit.prevent="cancel" class="btn btn-w-m btn-warning">Cancelar
                                </button>
                                <button type="submit" class="btn btn-w-m btn-success">Aceptar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Gastos </h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 m-b-xs">

                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-sm " v-model="search"
                                           placeholder="Buscar tipos de gastos">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="button">Go!
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo de gasto</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for=" (type,index) in types" :key="type.id" :class="{'st-selected': isActive(type)}"
                                    @click="onSelect(type)">
                                    <td>{{type.id}}</td>
                                    <td>{{type.type}}</td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    .st-selected {
        background: #216eff !important;
        color: white !important;
    }
</style>
<script>
    import {mapState} from 'vuex';
    import {required, minLength} from "vuelidate/lib/validators";

    export default{

        data() {
            return {
                search: "",
                expense: {
                    type: '',
                    id: ''
                }
            }
        },
        validations: {
            expense: {
                type: {required, minLength: minLength(4)},
            }

        },
        methods: {
            onSelect (t) {
                if ((!this.expense === undefined && this.expense.id === t.id)) {
                    this.expense = undefined;
                } else {
                    this.expense = _.clone(t);

                }
            },
            save(){
                if(!this.expense.id){
                    this.$v.$touch();
                    if (this.$v.$invalid) return;
                    this.$store.dispatch('createTypeExpense', this.expense);
                }
                else{
                    this.update();
                }
            },
            update(){
                this.$v.$touch();
                if (this.$v.$invalid) return;
                this.$store.dispatch('updateTypeExpense', this.expense);

            },
            cancel(){
                console.log(0);
                this.$router.push({name: 'typeExpenses'});
            },
        },
        mounted(){
            this.$store.dispatch('fetchTypeExpense');
        },
        computed: {
            ...mapState(['typeexpenses']),
            types: function () {
                return this.typeexpenses.filter(value => {
                    return value.type.toUpperCase().match(this.search.toUpperCase());
                })
            },
            isActive: function () {
                return function (type) {
                    return type.id === this.expense.id;
                };
            },
        },
    }
</script>