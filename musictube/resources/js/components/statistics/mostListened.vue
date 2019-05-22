<template>
      <div>
          <statistics-track v-for="(track,index) in tracks"
                            v-bind:key="index"
                            :name="track.name"
                            :description="track.description"
                            :url="'play/song/'+track.id"
                            :image="track.image"
                            :album_name="track.artistName"></statistics-track>
      </div>
</template>

<script>
    export default {
        name: "mostListened",

        data(){
            return {
                tracks: []
            }
        },

        created(){
            axios.get('/statistics/mostListened').then(({data}) => this.tracks = data);
        }
    }
</script>

<style scoped>

</style>