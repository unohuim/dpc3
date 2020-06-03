<template>
    
    <div>

        <div :class="openClass">
            
            <a v-touch:swipe.left="handleSwipe"  :class="this.itemClass" href="#">

                <div  class="inline-flex justify-between items-center mt-1 px-3 py-1 w-full h-full rounded border border-gray-300 hover:bg-green-100 hover:text-indigo-800 bg-gray-100 text-xs">

                    <div class="w-1/2">{{ this.name.substring(0, 25) }}</div>



                    <div class="inline-flex ">
        
                        <i v-if="!isOpen" class='fa-sm fas fa-chevron-down'></i>

                        <i v-else class='fa-sm fas fa-chevron-up'></i>

                    </div>

                </div>

            </a>


            <div v-if="isOpen" class="h-full w-full mt-1 p-2 pl-3 rounded bg-gray-400 text-gray-600 text-xs">

                dkdkdk

            </div>

        </div>

    </div>

</template>



<script>
    export default {

        data () {

            return {
                
                showResource: false,

                isOpen: false,

                chevronIcon: "chevron-down",

                openClass: ""

            }


        },
        

        props: {

            name: '',

            itemClass: {type: String, default: "h-full w-full hover:no-underline text-gray-600 focus:outline-none"},

            hasChevron: {type: Boolean, default: true}


        },


        methods: {

            handleSwipe (direction) {

                console.log('swipe')

                this.openClass = "inline-flex"

                this.showOptions

            },


            handleClick () {

                this.openClass = "flex"

                this.$emit('click', this.isOpen)

                this.showOptions

            },


            showOptions() {

                this.isOpen = ! this.isOpen;

            }

        },


        watch: {

            isOpen() {

                console.log(this.isOpen)

                if(this.isOpen) {this.chevronIcon = "chevron-up"}
            }
        }

        
    }
</script>