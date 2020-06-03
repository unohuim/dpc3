<template>
    
    <div :class='divClass'>

        <button @click="handleClick" v-if="isButton" class="h-full w-full focus:outline-none">

            <i :class='iconClass'></i>

        </button>


        <i v-else :class='iconClass'></i>

    </div>


</template>



<script>

    export default {

        data () {

            return {

                iconClass: "fa-sm fas fa-",

                buttonDivClass: "px-2 items-center rounded-lg border border-gray-400",

                divClass: "h-full px-1 py-1",

                isHover: false

            }
        },



        computed: {

            isButton() {

                if(this.iconType == 'button') {

                    return true;

                }

                return false;

            },

        },



        methods: {

            setClass (iconType) {

                if(iconType == 'button'){

                    this.divClass = this.buttonDivClass + ' ' + this.bgColorButton + ' ' + this.textColorButton;


                    if(this.doButtonHover) {

                        this.divClass += ' ' + this.bgColorHover + ' ' + this.textColorHover;
                    }

                }

                else if(iconType == 'basic'){

                    this.divClass += this.bgColorBasic + ' ' + this.textColorBasic;


                    if(this.doBasicHover) {

                        this.divClass += ' ' + this.bgColorHover + ' ' + this.txtColorHover;

                    }

                }

            },


            handleClick () {

                this.$root.$emit(this.clickEventName);

            }

        },
        

        props: {

            iconType: {

                type: String,

                default: 'basic'

            },

            bgColorButton: {
                
                type: String, 
                
                default: 'bg-white'
                
            },

            textColorButton: {
                
                type: String, 
                
                default: 'text-gray-600'
                
            },

            bgColorBasic: {
                
                type: String, 
                
                default: 'bg-white'
                
            },

            textColorBasic: {
                
                type: String, 
                
                default: 'text-gray-500'
                
            },

            bgColorHover: {
                
                type: String, 
                
                default: 'hover:bg-indigo-900'
                
            },

            textColorHover: {
                
                type: String, 
                
                default: 'hover:text-white'
                
            },

            doButtonHover: {

                type: Boolean,

                default: true
            },

            doBasicHover: {

                type: Boolean,

                default: false
            },

            clickEventName: {type: String, default: 'buttonClick'}

  
        },


        created () {

            this.iconClass = this.iconClass + this.$slots.default[0].text;

            this.setClass(this.iconType);

        }
    }

</script>