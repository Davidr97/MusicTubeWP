<template>
    <div class="row m-4">
        <div class="col-6">
            <img class="img-fluid" v-bind:src="image">
        </div>

        <div class="col-6">
            <h4><a v-bind:href="url">{{name}}</a></h4>
            <small><b>Album: </b>{{ album_name}}</small>
            <p>{{description}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "side-track",
        props: [ 'image', 'name', 'description', 'url', 'album_name']
    }
</script>

<style scoped>

</style>