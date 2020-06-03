<template>

	<div class="bg-white">
	
        <div class="flex-col w-full h-full px-2 pt-3 items-center">

            <div class="w-full h-full inline-flex justify-between items-end">

                <input-text v-model="searchString" class="mr-2 lowercase" icon="search"><slot></slot></input-text>

                <icon iconType="button">plus</icon>

            </div>

        </div>


        <div v-if="addNew" class="absolute flex w-full justify-center">
        
            <component :is="createView"></component>
            
        </div>


        <collection

            :collectionList="collection"

            :filterString="searchString"
        
        ></collection>

    
	</div>
	
</template>




<script>


export default {

    mounted () {

        this.$root.$on('buttonClick', () => {
            
            this.addNew = ! this.addNew;

        }),


        this.$root.$on('created resource from inventory', (data) => {

            this.collection.unshift(data);

            this.addNew = ! this.addNew;

        })


    },


    computed: {


      
    },

    
    

    data() {

        return {

            collection: [],

            addNew: false,

            searchString: ''

        }

    },


    props: {

        apiUri: {

            type: String,

            required: true
        },

        createView: {}

        
    },




    created() {

        axios.get(this.apiUri)

            .then(({data}) => this.collection = data.data)

    }

}

</script>






