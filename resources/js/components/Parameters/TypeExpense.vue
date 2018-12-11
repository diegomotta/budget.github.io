<template>
    <div>
        <div class="form-group">
            <label>Cantidad gastada</label>
            <select class="form-control m-b" name="account" v-model="typeExpense" v-on="selectType">
                <option v-for="option in typeExpenses" v-bind:value="option.id">{{option.type}}</option>
            </select>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            // declare message with an empty value
            return {
                typeExpense: '',
                typeExpenses: []
            }
        },
        props:[
            'type'
        ],
        methods: {

            getTypeExpenses: function () {
                axios.get('/typeexpensesj')
                    .then(res => {
                        this.typeExpenses = res.data;
                    });
            },
            selectType: function () {
                this.type = this.typeExpense
            }

        },
        mounted() {
            this.getTypeExpenses();

        },

    }
</script>