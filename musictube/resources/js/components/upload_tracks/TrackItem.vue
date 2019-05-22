<template>
    <div class="row m-4 border-bottom border-dark pb-3">
        <div class="col-2">
            <img class="img-fluid rounded-circle" v-bind:src="track.album.cover_photo_url" style="width: 100px;height: 100px">
        </div>
        <div class="col-8">
            <h4><a v-bind:href="play_song_url">{{track.name}}</a></h4>
            <p v-if="track.description!==''">{{track.description}}</p>
            <a v-bind:href="edit_song_url" class="btn btn-sm btn-primary">Edit</a>
            <a v-bind:href="delete_song_url" class="btn btn-sm btn-danger">Delete</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "track-item",
        props:['track'],
        data:function () {
            return{
                play_song_url:'/play/song/'+this.track.id,
                edit_song_url:'/edit_track/'+this.track.id,
                delete_song_url:'/delete_track/'+this.track.id,
            }
        }
    }
</script>

<style scoped>

</style>