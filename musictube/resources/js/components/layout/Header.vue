<template>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="height: 10vh;background-color:rgb(49, 53, 61)">
        <a class="navbar-brand" href="/" id="navbar-brand" style="max-width: 18%">
            MusicTube
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="d-inline-block m-auto h-100 w-50 mt-2">

            </div>
            <a href="/login" class="btn btn-primary" v-if="logged_in!=='true'">Log in</a>
            <form method="post" action="/logout" v-if="logged_in==='true'">
                <input type="hidden" name="_token" :value="csrf" >
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "header-component",
        props:['logged_in'],
        data(){
            return {
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                search_type: 1,
                search_name: ""
            }
        },
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        }
    }
</script>

<style scoped>
    a.navbar-brand#navbar-brand
    {
        color: #818896;
        text-transform: uppercase;
        font-weight: bold;
        flex-grow: 1;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 1.8rem;
        letter-spacing: 0.5rem;
    }
    a.navbar-brand#navbar-brand:hover
    {
        color: #b8bfce;
    }

</style>