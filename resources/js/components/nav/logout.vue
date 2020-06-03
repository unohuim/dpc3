<template>

    <dropdown-item v-on:click="logout" :itemClass="itemClass" uri="/logout"><slot>Logout</slot></dropdown-item>

</template>

<script>

    export default {


        methods: {

            logout: function(event) {




            }

        },


        props: {

            user: {

                type: Object,
                required: true
            },


            itemClass: {

                type: String,

            }

        }

    }


</script>