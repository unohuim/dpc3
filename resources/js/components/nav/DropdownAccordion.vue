<template>

    <div>

        
        <div class="">

            <button @click="isOpen = ! isOpen" class=" py-2 h-full w-full bg-blue-800 text-lg border-b border-gray-600 focus:outline-none"><slot></slot></button>

        </div>


        <div v-if="isOpen" class=" bg-blue-500">

            <dropdown-item v-for="link in links" :uri="link.uri"><i v-if="link.hasIcon" :class="link.iconClass"></i> {{link.title}}</dropdown-item>

           
        </div>

    </div>

</template>



<script>

    export default {

        data() {

            return {

                isOpen: false,

                
            }

        },


        methods: {


            href() {
                

                if(! this.isRoute ) {

                    window.location.href = this.uri;

                }
                else {

                    this.$router.push(this.uri);

                }
                

            },


            toggleAccordion: function() {


                //this.accordions = this.$parent..accordion;

                //console.log(app);

                this.isOpen = ! this.isOpen;

            }

        },


         props: {


            uri: {

                type: String,

                required: false
            },

            linkClass: {

                type: String,

                default: "px-3"
            },

            isRoute: {

                type: Boolean,

                default: true
            },

            links: {

                type: Array,

                required: true

            }

        }

    }


</script>