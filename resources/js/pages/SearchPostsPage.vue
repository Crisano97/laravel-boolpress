<template>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <MainLoader v-if="isLoading"/>
                <div v-else class="posts">
                    <div class="searchbar">
                        <div class="form-inline my-2 my-lg-0">
                            <input type="search" class="form-control mr-sm-2" placeholder="Search" v-model.trim="needle" @keyup.enter="searchPosts(needle)">
                            <a class="btn btn-outline-success my-2 my-sm-0" @click="searchPosts(needle)">
                                Search
                            </a>
                        </div>
                    </div>
                    <h2 class="p-3 m-3">Results for {{ needle }} </h2>
                    <div v-if="!isLoading" class="posts">
                        <PostCard v-for="post in posts" :key="post.id" :post="post"/>
                    </div>
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
            posts: {},
            needle: '',
            isLoading: true,
        }
    },
    methods: {
        getPosts(needle){
            axios.get('/api/posts/search/' + needle).then((response) =>{
                console.log(response.data.results);
                this.posts = response.data.results;
                this.isLoading = false;
            }).catch((error) =>{
                console.error(error.message);
            })
        },
        searchPosts(needle){
            this.getPosts(needle)
        }
    },
    created(){
            this.searchPosts()
        
    }

}
</script>

<style>
    
</style>