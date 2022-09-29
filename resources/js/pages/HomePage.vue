<template>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <MainLoader v-if="isLoading"/>
                <div v-else class="posts">
                    <PostCard v-for="post in posts" :key="post.id" :post="post"/>
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
            posts: [],
            categories: [],
            isLoading: true,
        }
    },
    methods: {
        getPosts(postPage = 1){
            axios.get('/api/posts/', {
                page: postPage
            }).then((response) =>{
                console.log(response.data.results.data);
                this.posts = response.data.results.data;
                this.isLoading = false;
            }).catch((error) =>{
                console.error(error.message);
            })
        },
        
    },

    created(){
        this.getPosts();
    }
}
</script>

<style>
    
</style>