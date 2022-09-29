<template>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <div class="posts">
                    <PostCard :key="post.id" :post="post"/>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import PostCard from '../components/PostCard.vue'
import axios from 'axios';

export default {
    components: {
        PostCard,
    },
    data: function(){
        return{
            post: {},
            categories: [],
        }
    },
    methods: {
        getPost(){
            const id = this.$route.params.id;
            // console.warn(id)
            axios.get(`/api/posts/${id}`).then((response) =>{
                this.post = response.data.results;
                console.warn( response.data.results);
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