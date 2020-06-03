<template>


    <div class="flex-col w-100 rounded-lg mt-3 px-3 py-1 bg-black opacity-75 text-gray-500">

        <div class="text-xl uppercase text-white">

            Lead Source

        </div>
        

        <form @submit="addLeadSource">

            
            <div class="flex-row">

                <label class="float-right text-xs">source name</label>

                <input-text inputName="source_name" textColor="text-gray-700" class="w-full" icon="tag" text-color="text-gray-500"> </input-text>

            </div>


            <div class="block px-1 py-3 min-w-full">

                <label class="float-right text-xs">source type</label>

                <select id="source_type" name="source_type" class="w-full text-xs">

                    <option v-for="type in sourceTypes.data" :value="type.id">{{type.name}}</option>


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

            sourceTypes: '',

            csfrToken: ''


        }
    },


    methods: {

        addLeadSource(e) {

            e.preventDefault();

            axios.post('/api/admin/leads/sources', {

                source_name: document.querySelector("#source_name").value,

                source_type_id: document.querySelector("#source_type").value

            })

                .then(({data}) => this.handleAdd(data) )

        },


        handleAdd(data) {

            this.$root.$emit('created lead source', data);

            this.$root.$emit('created resource from inventory', data);
            
        },


        getSourceTypes () {

            axios.get("/api/admin/leads/sourcetypes")

                .then(({data}) => this.sourceTypes = data)



        }
    },
    

    created () {

        this.getSourceTypes();

       
    }


}
</script>