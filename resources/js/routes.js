
import VueRouter from 'vue-router';



let routes = [

	{
		name: 'Welcome',

		path: '/',

		component: require('./components/views/Welcome').default
	},

	{
		name: 'Home',

		path: '/home',

		component: require('./components/views/Home').default
	},

	{
		name: 'leads sources',

		path: '/admin/leads/sources',

		component: require('./components/views/admin/leads/sources').default
	},

	{
		name: 'users',

		path: '/admin/users',

		component: require('./components/views/admin/users').default
	},

	{
		name: 'clients',

		path: '/clients',

		component: require('./components/views/clients').default
	},

	{
		name: '403',

		path: '/403',

		component: require('./components/views/403').default
	}

];





export default new VueRouter({

	mode: 'history',

	routes


});



	