<template>

    <div :class="linkClass">

        <button v-on:click="href"><slot></slot></button>

    </div>

</template>



<script>

    export default {

        data() {

            return {

                
            }

        },


        methods: {


            href() {

                //console.log(this.$router);

                if(! this.isRoute ) {

                    window.location.href = this.uri;

                }
                else {

                    this.$router.push(this.uri);

                }
                

            }

        },


         props: {


            uri: {

                type: String,

                required: true
            },

            linkClass: {

                type: String,

                default: "px-3"
            },

            isRoute: {

                type: Boolean,

                default: true
            }

        },

    }


</script>