<template>


    <div class="flex-col w-100 rounded-lg mt-3 px-3 py-1 bg-black opacity-75 text-gray-500">

        <div class="text-xl uppercase text-white">

            User

        </div>
        

        <form @submit="addUser">

            
            <div class="flex-row">

                <label class="float-right text-xs">email</label>

                <input-text inputName="email" textColor="text-gray-700" class="w-full" icon="at" text-color="text-gray-500"> </input-text>

            </div>


            <div class="block px-1 py-3 min-w-full">

                <label class="float-right text-xs">role</label>

                <select id="role_slug" name="role_name" class="w-full text-xs">

                    <option v-for="role in roles" :value="role.slug">{{role.label}}</option>


                </select>


            </div>


            <button type="submit" class="mt-3 mb-2 p-2 w-full rounded-lg border border-gray-500 text-white hover:bg-gray-100 hover:text-gray-900">Add</button>

        </form>

    </div>



</template>


<script>
export default {

    data () {

        return {

            roles: '',

            csfrToken: ''


        }
    },


    methods: {

        addUser(e) {

            e.preventDefault();

            axios.post('/api/users', {

                email: document.querySelector("#email").value,

                role_slug: document.querySelector("#role_slug").value

            })

                .then(({data}) => this.handleAdd(data) )

        },


        handleAdd(data) {

            this.$root.$emit('created user', data);

            this.$root.$emit('created resource from inventory', data);
            
        },


        getRoles () {

            axios.get("/api/roles")

                .then(({data}) => this.roles = data.data)



        }
    },
    

    created () {

        this.getRoles();

       
    }


}
</script>