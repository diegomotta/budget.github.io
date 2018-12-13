<template>
    <div>

        <div class="wrapper-content">
            <div class="ibox float-e-margins ">
                <div class="ibox-title">
                    <h5>
                        Tipo de ingresos
                    </h5>
                    <div class="ibox-tools">
                        <div class="btn-group">
                            <router-link :to="{name:'main'}"><a class="btn"
                                                                style="margin-top: -7px;color: #333 !important;background-color: #fff !important;border-color: #ccc !important;"><i class="fas fa-arrow-circle-left"></i> Volver </a>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
            <type-entry-list></type-entry-list>
        </div>
    </div>
</template>
<script>
    import EntriesList from '../../components/TypeEntry/List';

    export default{
        components: {
            'type-entry-list': EntriesList,
        },
        data(){
            return{
                typeEntry:""
            }
        }
    }
</script>