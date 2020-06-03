<template>



	<crud-index
	
		apiUri="/api/users"

		:createVue="createViewr"

		
		
	>Users</crud-index>



	
</template>




<script>

	import createVuer from './create.vue';


	export default {

		


		components: {

			createVuer

		},


		data () {

			return {

				createViewr: createVuer
			}
		}


	}

	

</script>
