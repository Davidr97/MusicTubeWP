<template>
    <div class="row">
        <div class="col-12">
            <h1 class="col-10 offset-1"> {{name}} </h1>
            <div class="row">
                <div class="col-10 offset-1 bg-light">
                    <img v-bind:src="album_photo" class="w-100 img-fluid" ><br/>

                    <audio class="w-100" controls autoplay>
                        <source v-bind:src="url" type="audio/mp3">
                        Your browser does not support the audio tag.
                    </audio>
                </div>
            </div>
        </div>
        <div class="col-10 offset-1">
            <p class="row">
                <button class="btn btn-link col-2" type="button" data-toggle="collapse" data-target="#lyrics" aria-expanded="false" aria-controls="lyrics">Lyrics</button>
                <span class="offset-3  col-2">
                    <a class="btn btn-primary" :href="subscribe">
                        <i class="fa fa-th-list"></i>
                    </a>
                </span>
                <span class="col-2">
                    <a class="btn btn-success" v-on:click="like">
                        <i class="fa fa-thumbs-up"></i>
                    </a>
                    {{ song_likes}}
                </span>
                <span class="col-2">
                    <a class="btn btn-danger" v-on:click="dislike">
                        <i class="fa fa-thumbs-down"></i>
                    </a>
                    {{ song_dislikes }}
                </span>
                <span class="col-3">Views: {{views}}</span>
            </p>
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="lyrics">
                        <div class="card card-body">
                            {{ lyrics }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "player",
        props: ['lyrics', 'name', 'album_photo', 'url', 'likes', 'dislikes', 'views', 'song_id', 'user_id','subscribe'],
        data(){
          return {
              song_likes: this.likes,
              song_dislikes: this.dislikes,
          }
        },
        methods: {
            like: function(){
                axios.post('/like_song',{
                    song_id: this.song_id,
                    user_id: this.user_id
                }).then(response => {
                    return this.update(response.data);
                })
                   .catch(error=>window.location.href = '/login');
            },
            dislike: function(){
                axios.post('/dislike_song',{
                    song_id: this.song_id,
                    user_id: this.user_id
                }).then(response => {
                    return this.update(response.data);
                })
                    .catch(error=>window.location.href = '/login');
            },
            update: function (data) {
                let likes = data.filter(function(track){
                    return track.type === 1;
                }).length;
                let dislikes = data.filter(function(track){
                    return track.type === 0;
                }).length;
                this.song_likes = likes;
                this.song_dislikes = dislikes;
            }
        }
    }
</script>

<style scoped>

</style>