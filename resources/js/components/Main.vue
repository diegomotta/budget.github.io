<template>
    <div>
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">
                <div class="wrapper wrapper-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="ibox " style=" border-style: solid;border-color: #1ab394;">
                                    <div class="ibox-title">
                                        <h5 style="text-align: center;">Ingresos</h5>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center;">
                                                <h1 class="no-margins">+ {{into}}</h1>
                                                <!--<div class="font-bold text-navy">44% <i class="fa fa-level-up"></i>-->
                                                <!--<small>Rapid pace</small>-->
                                                <!--</div>-->
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="ibox " style=" border-style: solid;border-color: #ed5565;">
                                    <div class="ibox-title">
                                        <h5 style="text-align: center;">Gastos</h5>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center;">
                                                <h1 class="no-margins">- {{out}}</h1>
                                                <!--<div class="font-bold text-navy">44% <i class="fa fa-level-up"></i>-->
                                                <!--<small>Rapid pace</small>-->
                                                <!--</div>-->
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="ibox "style=" border-style: solid;border-color: #1c84c6;">
                                    <div class="ibox-title">
                                        <h5 style="text-align: center;">Balance</h5>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center;">
                                                <h1 class="no-margins">{{into - out}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">

                            <list-expense></list-expense>
                        </div>
                        <div id="small-chat">
                            <button @click="showModal" class="open-small-chat">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <modal v-show="isModalVisible" @close="closeModal"></modal>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import store from '../store/expenses'
    import modal from '../components/Expense/Modal.vue';

    import {mapState} from 'vuex';
    export default {
        components: {
            modal,
        },
        computed: {
            into(){
                return store.getters.getTotalEntry();

            },
            out(){
                return store.getters.getTotalExpense();
            }
        },
        data () {
            return {
                isModalVisible: false,
            };
        },
        methods: {
            showModal() {
                this.isModalVisible = true;
                this.$router.push({name: "ingreso"});

            },
            closeModal() {
                this.isModalVisible = false;
                this.$router.push({name: "main"});
            }
        },
    }
</script>

<style>
    .router-link-exact-active {
    }

    .router-link-active {
    }
</style>