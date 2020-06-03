<template>
    

    <div :class="listClass">

        <collection-item v-for="item in filteredList" :name="item.name"></collection-item>

    </div>

</template>



<script>

    export default {
        
        props: {

            collectionList: '',

            filterString: '',

            listClass: {type:String, default: 'mx-2 pt-2 pb-16 focus:outline-none overflow-y-scroll'}

        },


        computed: {


            filteredList () {

                return this.collectionList.filter((item) => {

                    return item.name.toLowerCase().includes(this.filterString.toLowerCase())

                })

            }

        },


        created () {

            console.log(this.listClass)

        }

        
    }

</script>