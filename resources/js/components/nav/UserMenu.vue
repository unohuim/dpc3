<template>

    <div class="flex pr-3">


        <div v-if="! isGuest" class="inline-flex px-2 self-center text-gray-500 text-base">
            
            <i class=" h-6 w-6 fas fa-bell-slash fill-current"></i>
            
            
        </div>



        <div class="relative" v-if="! isGuest">


            <div>
                <button v-if="! isOpen" @click="isOpen = ! isOpen" class="relative z-10  block h-8 w-8 text-sm rounded-full overflow-hidden border-2 border-indigo-500 bg-indigo-700 text-white
                    focus:outline-none focus:border-indigo-200 hover:border-indigo-300">

                    {{user.data.first_name.charAt(0) + user.data.last_name.charAt(0)}}
                    
                </button>
            </div>



            <button v-if="isOpen" @click="isOpen = false" tabindex="-1" class="fixed h-full w-full inset-0 cursor-default"></button>
       


            <div v-if="isOpen" class="absolute right-0 py-2 mt-10 mb-12 -mr-2 sm:w-4/5 md:w-64 rounded-lg bg-black opacity-75 text-white shadow-xl">

                <div class="flex items-center justify-between -mt-1">

                    <div class="px-2">
                        <button v-if="isOpen" @click="isOpen = ! isOpen" class="relative z-10 block h-10 w-10 text-sm rounded-full overflow-hidden border-2 border-indigo-500 bg-indigo-700 text-white
                            focus:outline-none focus:border-indigo-200 hover:border-indigo-300">

                            {{user.data.first_name.charAt(0) + user.data.last_name.charAt(0)}}
                            
                        </button>
                    </div>


                    <div class="flex-col font-sans -ml-6">

                        <span class="block text-lg uppercase font-thin">{{this.user.data.first_name}}</span>

                        <span class="block -mt-2 text-base uppercase font-light">{{this.user.data.last_name}}</span>

                    </div>


                    
                    <div class="px-2 -mt-6">

                        <a class="" href="/user/settings"><i class="fas fa-cog"></i></a>
                    
                    </div>
                
                </div>

                <div class="px-16 pt-2">

                    {{user.data.email}}

                </div>

                <div class="pt-2 mt-2 border-t">
                    
                    <dropdown-item uri="/user/profile"><i class="pr-2 fas fa-user"></i>Profile</dropdown-item>

                    <dropdown-item uri="/user/billing"><i class="pr-2 fas fa-credit-card"></i>Billing</dropdown-item>

                    <dropdown-item uri="/company"><i class="pr-2 fas fa-building"></i>{{ shorten(user.data.company.name) }}</dropdown-item>

                    

                   <navmenu-accordions></navmenu-accordions>

                    
                    
                    
                    <logout v-bind:user="user"><i class="pr-2 fas fa-sign-out-alt fa-lg"></i>Logout</logout>
    
                </div>
            
                

            </div>

        </div>



        <div v-else class="inline-flex text-white">

            <nav-link text="Login" uri="/login" v-bind:isRoute="false">Login</nav-link>

            <nav-link text="Register" uri="/register" v-bind:isRoute="false">Register</nav-link>

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


         computed: {

            isGuest: function() {

                return this.guestPassed

            }
        },


        methods: {


            authCheck: function() {

                //console.log(this.guestPassed);


                if(this.guestPassed) {

                    //console.log('this is a guest');

                    //this.isGuest = true;

                    //this.user = false;

                    return false;

                }
                else{

                    //console.log('not guest');

                    //this.user = this.userPassed;

                    //this.isGuest = false;

                    return true;

                    
                }
                
            },
            

            shorten: function(word) {

                if(word.length > 14) {
                    
                    return word.substring(0,14) + " .."

                }
                else {

                    return word
                }

            }


        },



        props: {

            user: {

                type: Object|Boolean,

                required: true
            },


            guestPassed: {

                type: Boolean,

                default: false

            },
 

        },

        


        created() {

            this.authCheck();


            const handleEscape = (e) => {

                if(e.key === 'Esc' || e.key === 'Escape') {

                    this.isOpen = false
                
                }
            }


            document.addEventListener('keydown', handleEscape)

            this.$once('hook:beforeDestroy', () => {

                document.removeEventListener('keydown', handleEscape)

            })


        }

    }


</script>