<template>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
                    <router-link class="nav-link active" to="/">Home</router-link>
                    <!-- <a class="nav-link" href="#">About</a> -->
                    <router-link class="nav-link active" to="/about">About us</router-link>

                    <!-- <a class="nav-link" href="#">Contacts</a> -->
                    <router-link class="nav-link active" to="/contacts">Contact us</router-link>
                    
                    <router-link class="nav-link active" to="/posts/2">Post 2</router-link>


                </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {

}
</script>

<style>

</style>