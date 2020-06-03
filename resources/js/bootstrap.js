

import axios from 'axios';








/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = axios;



//window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.defaults.headers.common = {

		'X-Requested-With': 'XMLHttpRequest',

		'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')

};



axios.interceptors.response.use(

	function(response) { return response;}, 

	function(error) {

	    // handle error
	    if (error.response) {

			//alert(error.response.data.message);

	    	console.log (error.response);
	    
	    	if (error.response.status == 401) {

	    		window.location.href = "/login";

			}
			else if (error.response.status == 403) {

				window.location.href = "/403";
			}
			
			
			

		}
		
	});


