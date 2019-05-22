<template>
    <div>
        <track-item v-for="(track,index) in tracks"
                    v-bind:key="index"
                    v-bind:index="index"
                    v-bind:track="track">
        </track-item>
    </div>

</template>

<script>
    export default {
        name: "track-list",
        props:['tracks_props'],
        data:function () {
            return{
                tracks:JSON.parse(this.tracks_props)
            }
        }
    }
</script>

<style scoped>

</style>