<template>
    <div class="row m-4">
        <div class="col-3">
            <img class="img-thumbnail" v-bind:src="image">
        </div>

        <div class="col-9">
            <h3><a v-bind:href="url">{{name}}</a> </h3>
            <p>{{description}}</p>
            <small>Uploaded by: {{album_name}}</small>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Track",
        props: [ 'image', 'name', 'description', 'url', 'album_name']
    }
</script>

<style scoped>

</style>