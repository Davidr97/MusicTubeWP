<template>
    <form method="POST" action="/edit_track">
        <input type="hidden" name="id" v-model="id"/>
        <track-form :name="name"
                    :lyrics="lyrics"
                    :description="description"
                    :album="album"
                    :album_props="album_props"
                    button_text="Edit"></track-form>
    </form>
</template>

<script>
    export default {
        name: "edit-track-form",
        props:['id','name','lyrics','description','album','album_props']
    }
</script>

<style scoped>

</style>