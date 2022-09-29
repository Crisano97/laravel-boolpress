<template>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <MainLoader v-if="isLoading"/>
                <div v-else class="posts">
                    <PostCard :key="post.id" :post="post"/>
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
            post: {},
            categories: [],
            isLoading: true
        }
    },
    methods: {
        getPost(){
            const id = this.$route.params.id;
            // console.warn(id)
            axios.get(`/api/posts/${id}`).then((response) =>{
                this.post = response.data.results;
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