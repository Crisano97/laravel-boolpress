<template>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <MainLoader v-if="isLoading"/>
                <div v-else class="posts">
                    <h2>
                        Currents posts of 
                             <span :style="`background-color:` + category.color" class="badge text-white p-2 m-3 category-hover">
                                {{ category.name }}
                            </span>
                         category
                    </h2>
                    <PostCard v-for="post in category.posts" :key="post.id" :post="post"/>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import PostCard from '../components/PostCard.vue';
import MainLoader from '../components/MainLoader.vue';

import axios from 'axios';

export default {
    components: {
        PostCard,
        MainLoader
    },
    data: function(){
        return{
            category: {},
            isLoading: true
        }
    },
    methods: {
        getPost(){
            const id = this.$route.params.id;
            // console.warn(id)
            axios.get(`/api/categories/${id}`).then((response) =>{
                this.category = response.data.results;
                console.warn( response.data.results);
                this.isLoading = false;
            }).catch((error) =>{
                console.error(error.message);
            })
        },
        
    },

    created(){
        this.getPost();
    }
}
</script>

<style>

</style>