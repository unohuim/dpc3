<template>



	<crud-index
	
		apiUri="/api/admin/leads/sources"

		:createVue="createViewr"

		
		
	>Leads</crud-index>



	
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






