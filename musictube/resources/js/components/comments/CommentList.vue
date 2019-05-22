<template>
    <div class="mt-4">
        <comment v-for="(comment,index) in comments"
                 v-bind:key="index"
                 v-bind:comment_props="comment"
                 v-bind:user_id="user_id"
                 v-bind:root="root"></comment>
    </div>
</template>

<script>
    export default {
        name: "comment-list",
        props:['comments_props','user_id','root'],
        data:function () {
            return{
                comments:Array.isArray(this.comments_props)?this.comments_props:JSON.parse(this.comments_props)
            }
        }
    }
</script>

<style scoped>

</style>