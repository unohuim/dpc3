<template>
    
    <div :class="getDivClass">

        <icon :if="hasIcon" class="inline-flex" bgColor="bg-gray-100" textColor="text-gray-500">{{this.icon}}</icon>

         {{ iconDivider }}

        <input v-model="inputString" :id="inputName" :name="inputName" type="text" :class="getInputClass"  :placeholder="getPlaceholder" />

    </div>



</template>


<script>
    export default {

        data () {

            return {

                placeholder: '',

                inputClass: 'w-full px-2 focus:outline-none',

                divClass: 'inline-flex items-center w-full p-1 pl-2 rounded border border-gray-400 rounded-lg hover:border-gray-500',

                inputString: this.value

            }

        },


        computed: {


            iconDivider () {

                if(this.icon.length > 0) return '|';

                return '';

            },

            getPlaceholder () {

                return this.searchPlaceholder

            },

            getDivClass () {

                return this.divClass += ' ' + this.bgColor + ' ' + this.textColor + ' ' + this.textSize;

            },

            getInputClass () {

                return this.inputClass += ' ' + this.bgColor + ' ' + this.textSize;

            },

            
            hasIcon () {

                return this.icon.length > 0
            },

            getPlaceholder() {

                try {

                    return this.$slots.default[0].text
                }
                catch {

                    return '';
                }
                
            }
        },


        methods: {

            setPlaceholder() {

                this.placeholder = this.getPlaceholder.toLowerCase() ;

            }

        },


        props: {

            text: {type: String, default: ''},

            icon: {type: String, default: ''},

            bgColor: {type: String, default: 'bg-gray-100'},

            textColor: {type: String, default: 'text-gray-500'},

            textSize: {type: String, default: 'text-xs'},

            inputName: {type: String, default: ''},

            value: {type: String, default: ''}

        },


        watch: {

            inputString(val) {

                this.$emit('input', val);

            }

        },



        created () {

            this.setPlaceholder();
            

            

        }
        
    }
</script>