<template>

    <header v-if="! isGuest" class="flex items-center justify-between sm:px-1 md:pr-10 sm:py-1 md:py-2 bg-indigo-900 text-white">

        
        <div class="inline-flex py-2">

            <nav-link uri="/" :isRoute="false">WOOFS</nav-link>

        </div>


        <user-menu :user="user" :guestPassed="isGuest"></user-menu>

               

    </header>





    <header v-else class="flex items-center justify-between sm:px-1 md:px-10 py-2 bg-white text-gray-600">

        
        <div class="inline-flex py-2">

            <nav-link uri="/" :isRoute="false">WOOFS</nav-link>

            

        </div>


        <div class="inline-flex">

            <nav-link text="Login" uri="/login" v-bind:isRoute="false">Login</nav-link>

            <nav-link text="Register" uri="/register" v-bind:isRoute="false">Register</nav-link>

        </div>

               

    </header>

</template>



<script>

    export default {

        data() {

            return {

                user: {

                    type: Object

                    
                },


                isGuest: true,

            }

        },


       


        methods: {

            authCheck: function() {

                if(this.user.auth_check) {

                    this.isGuest = false;

                    return true;

                }
                else{

                    this.isGuest = true;

                    this.user = false;

                    return false;

                }
                
            }

        },


        
        created() {

            axios.get('/api/auth-user', {errorHandle: false})

                .then(({data}) => this.user = data)


                .finally(() => this.authCheck());
 
        }

    }


</script>