<template>



	<inventory-view 
	
		:apiUri="this.apiUri" 

		:create-view="CreateView"

	><slot></slot></inventory-view>



	
</template>




<script>

    
	export default {

		
		data() {

			return {

				CreateView: this.createVue

			}

        },
        

        props: {

            apiUri: {type: String, required: true},

            createVue: {type: Object, required: true}

        },


	}

</script>






