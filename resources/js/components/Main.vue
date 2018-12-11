<template>
    <div>
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">
                <div class="wrapper wrapper-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5>Ingresos</h5>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center;">
                                                <h1 class="no-margins">{{into}}</h1>
                                                <!--<div class="font-bold text-navy">44% <i class="fa fa-level-up"></i>-->
                                                    <!--<small>Rapid pace</small>-->
                                                <!--</div>-->
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5>Gastos</h5>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center;">
                                                <h1 class="no-margins">{{out}}</h1>
                                                <!--<div class="font-bold text-navy">44% <i class="fa fa-level-up"></i>-->
                                                    <!--<small>Rapid pace</small>-->
                                                <!--</div>-->
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5>Balance</h5>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center;">
                                                <h1 class="no-margins">{{into - out}}</h1>
                                                <!--<div class="font-bold text-navy">44% <i class="fa fa-level-up"></i>-->
                                                <!--<small>Rapid pace</small>-->
                                                <!--</div>-->
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="ibox-title text-center">
                                    <h2 class="text-center">Seleccione el tipo de monto</h2>
                                </div>
                                <ul class="nav nav-tabs" >
                                    <router-link tag="li" :to="{name:'ingreso'}" active-class="active" exact style="width: 50%;"><a style="border-color: #676a6c;"  class="nav-link">Ingreso</a></router-link>
                                    <router-link tag="li" :to="{name:'egreso'}" active-class="active" style="width: 50%;"><a style="border-color: #676a6c;" class="nav-link">Egreso</a>
                                    </router-link>
                                </ul>
                                <router-view></router-view>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <list-expense></list-expense>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import store from '../store/expenses'
    import { mapState } from 'vuex';
    export default {

        computed:{
            into(){
                return store.getters.getTotalEntry();

            },
            out(){
                return store.getters.getTotalExpense();
            }
        }
    }
</script>
<style>
    .router-link-exact-active{}
    .router-link-active{}
</style>