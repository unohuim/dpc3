<template>

    <a :class="itemClass" :href="uri"><slot>dropdown item</slot></a>

</template>



<script>

    export default {


         props: {

            uri: {

                type: String,

                required: true
            },

            itemClass: {

                type: String,

                default: "z-8 block px-4 py-2 text-white hover:bg-gray-600 hover:text-white hover:no-underline"
            },

        }

    }


</script>