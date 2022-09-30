<template>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <MainLoader v-if="isLoading"/>
                <div v-else class="categories">
                    <div class="container">
                        <div class="row justify-content-center">
                            <CategoryCard v-for="category in categories" :key="category.id" :category="category"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import CategoryCard from '../components/CategoryCard.vue';
import MainLoader from '../components/MainLoader.vue';

import axios from 'axios';
export default {
    components:{
        CategoryCard,
        MainLoader,
    },
    data: function(){
        return{
            categories: [],
            isLoading: true,
        }
    },
    methods:{
        getCategories(categoriesPage = 1){
            axios.get('/api/categories/', {
                // page: postPage
            }).then((response) =>{
                console.log(response.data.results.data);
                this.categories = response.data.results.data;
                this.isLoading = false;
            }).catch((error) =>{
                console.error(error.message);
            })
        }
    },
    created(){
        this.getCategories();
    }
}
</script>

<style>

</style>