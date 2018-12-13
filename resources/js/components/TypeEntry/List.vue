<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5 v-if="!entry.id ">Crear tipo de gasto </h5>
                        <h5 v-else>Modificar tipo de gasto <b>{{entry.name}}</b></h5>

                    </div>
                    <div class="ibox-content">
                        <form @submit="save">
                            <div class="form-group" :class="{'has-error': $v.entry.type.$error }">
                                <label class="control-label form-group"
                                       :class="{'text-danger': $v.entry.type.$error }">Tipo de gasto</label>
                                <input type="text" placeholder="" class="form-control"
                                       v-model.trim="$v.entry.type.$model">
                                <p class="help-block" style="color: #ed5565;"
                                   v-if="$v.entry.type.$error == true && !$v.entry.type.required">
                                    El tipo es requerido</p>
                                <p class="help-block" style="color: #ed5565;"
                                   v-if="$v.entry.type.$error == true && !$v.entry.type.minLength">
                                    EL tipo debe tener al menos {{$v.entry.type.$params.minLength.min}} letras.</p>

                            </div>
                            <div class="form-group">
                                <button v-if="entry.id" @submit.prevent="cancel" class="btn btn-w-m btn-warning"><i class="fas fa-ban"></i> Cancelar
                                </button>
                                <button type="submit" class="btn btn-w-m btn-success"><i class="fas fa-save"></i> Aceptar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Ingresos </h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 m-b-xs">

                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-addon"><i class="fas fa-search"></i></span>
                                    <input type="text" class="form-control form-control-sm " v-model="search"
                                           placeholder="Buscar tipos de ingresos">

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo de ingreso</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for=" (type,index) in entries" :key="type.id" :class="{'st-selected': isActive(type)}"
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
                entry: {
                    type: '',
                    id: ''
                }
            }
        },
        validations: {
            entry: {
                type: {required, minLength: minLength(4)},
            }

        },
        methods: {
            onSelect (t) {
                if ((!this.entry === undefined && this.entry.id === t.id)) {
                    this.entry = undefined;
                } else {
                    this.entry = _.clone(t);

                }
            },
            save(){
                if(!this.entry.id){
                    this.$v.$touch();
                    if (this.$v.$invalid) return;
                    this.$store.dispatch('createTypeEntry', this.entry);
                }
                else{
                    this.update();
                }
            },
            update(){
                this.$v.$touch();
                if (this.$v.$invalid) return;
                this.$store.dispatch('updateTypeEntry', this.entry);

            },
            cancel(){
                this.$router.push({name: 'typeEntries'});
            },
        },
        mounted(){
            this.$store.dispatch('fetchTypeEntries');
        },
        computed: {
            ...mapState(['typeentries']),
            entries: function () {
                return this.typeentries.filter(value => {
                    return value.type.toUpperCase().match(this.search.toUpperCase());
                })
            },
            isActive: function () {
                return function (type) {
                    return type.id === this.entry.id;
                };
            },
        },
    }
</script>