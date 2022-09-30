<template>
    <!-- <div class="container-fluid">
        <div class="row ">
            <div class="col-3"> -->
                <div class="card p-4 m-4 col-4 text-center">
                    <div class="card-body">
                        
                        <router-link :to="'/categories/' + category.id">
                            <span :style="`background-color:` + category.color" class="badge text-white p-2 m-3 category-hover">
                                {{ category.name }}
                            </span>
                        </router-link>
                    </div>
                </div>
            <!-- </div> -->
        <!-- </div>
    </div> -->
</template>

<script>
export default {
    props: {
        category: Object,
    },
}
</script>

<style>

</style>