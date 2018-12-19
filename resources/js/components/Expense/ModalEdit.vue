<template>
    <transition name="modal-fade">
        <div id="modal-form" class="modal-backdrop" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="">
                        <div class="col-md-12">
                            <div class="ibox-title text-center">
                                <h2 class="text-center">Seleccione el tipo de monto</h2>
                            </div>
                            <ul class="nav nav-tabs">
                                <router-link @click.native="selected = 1" tag="li"
                                             :to="{name:'editar.ingreso',params: {id: this.expense_id}}"
                                             active-class="active" style="width: 50%;"><a
                                        v-bind:style="[selected ==1 ? { background: '#2f4050',color:'white'}:'' ]"
                                        style="border-color: #676a6c;text-align: center;" class="nav-link">Ingreso</a>
                                </router-link>
                                <router-link @click.native="selected = 2" tag="li"
                                             :to="{name:'editar.egreso',params: {id: this.expense_id}}"
                                             active-class="active" style="width: 50%;"><a
                                        v-bind:style="[selected ==2 ? { background: '#2f4050',color:'white' }:'']"
                                        style="border-color: #676a6c;text-align: center;" class="nav-link">Gasto</a>
                                </router-link>
                            </ul>
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>
<script>
    import EventBus from '../../EventBus/eventbus';
    export default {
        name: 'modalEdit',
        data(){
            return {
                active: false,
                expense_id: null,
                selected: null,
            }
        },
        methods: {
            close() {
                this.$emit('close');
            },
        },
        created() {
            EventBus.$on('toggleModal', (expense) => {
                this.expense_id = expense.id;
                this.selected = expense.type_amount.id
                if (expense.type_amount.value === 'Ingreso') {
                    this.$router.push({name: 'editar.ingreso', params: {id: expense.id}});
                } else {
                    this.$router.push({name: 'editar.egreso', params: {id: expense.id}});
                }
            });
        }
    };
</script>

<style>
    .modal-backdrop {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.3);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .backg {
        background-color: #2f4050;
    }
</style>