<template>

    <div>
    
        <dropdown-accordion v-for="dropdown in dropdowns" v-bind:links="dropdown.links">{{dropdown.title}}</dropdown-accordion>
        
    </div>

</template>



<script>

    export default {

        data() {

            return {

                dropdowns: [

                    {
                        title: "Admin", 

                        hasIcon: false,

                        iconClass: "",

                        links: [

                            {
                                title: "Settings",

                                hasIcon: true,

                                iconClass: "pr-2 fas fa-cog",

                                uri: "/admin/settings"


                            },

                            {
                                title: "Users",

                                hasIcon: true,

                                iconClass: "pr-2 fas fa-users",

                                uri: "/admin/users"
                            },

                            {
                                title: "Products",

                                hasIcon: true,

                                iconClass: "pr-2 fas fa-dollar-sign",

                                uri: "/admin/products"


                            },

                            {
                                title: "Leads Sources",

                                hasIcon: true,

                                iconClass: "pr-2 fas fa-broadcast-tower",

                                uri: "/admin/leads/sources"
                            }

                        ]

                    },

                    {
                        title: "Scheduling",

                        hasIcon: false,

                        iconClass: "",

                        links: [

                            {
                                title: "Today",

                                hasIcon: true,

                                iconClass: "pr-2 fas fa-cog",

                                uri: "/scheduling/today"


                            },

                            {
                                title: "Tomorrow",

                                hasIcon: true,

                                iconClass: "pr-2 fas fa-user",

                                uri: "/scheduling/tomorrow"
                            }

                        ]

                    },


                    {
                        title: "Clients",

                        hasIcon: false,

                        iconClass: "",

                        links: [

                            {
                                title: "Create",

                                hasIcon: true,

                                iconClass: "pr-2 fas fa-plus",

                                uri: "/clients/create"


                            },

                            {
                                title: "List",

                                hasIcon: true,

                                iconClass: "pr-2 fas fa-list",

                                uri: "/clients"
                            }

                        ]

                    },


                    {
                        title: "Leads",

                        hasIcon: false,

                        iconClass: "",

                        links: [

                            {
                                title: "Create",

                                hasIcon: true,

                                iconClass: "pr-2 fas fa-plus",

                                uri: "/leads/create"


                            },

                            {
                                title: "List",

                                hasIcon: true,

                                iconClass: "pr-2 fas fa-list",

                                uri: "/leads"
                            }

                        ]

                    }
                
                ]

                
            }

        },


        methods: {


           
        },


         props: {


        

         }

    }


</script>