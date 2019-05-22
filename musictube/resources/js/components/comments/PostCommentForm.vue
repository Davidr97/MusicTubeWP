<template>
    <div class="row mt-4">
        <div class="col-10">
            <form method="post" action="/post_comment" style="margin-bottom:15%">
                <input type="hidden" name="_token" :value="csrf" >
                <input type="hidden" name="track_id" :value="track_id"/>
                <input type="hidden" name="user_id" :value="user_id"/>
                <input type="hidden" name="replied_to_id" :value="replied_to_id"/>
                <textarea name="text" rows="5" cols="60" placeholder="Enter a comment..." class="form-control" style="width: auto;margin: auto"></textarea>
                <button type="submit" class="btn btn-outline-primary mt-3 float-right mr-5">Post</button>
            </form>
        </div>
    </div>

</template>

<script>
    export default {
        name: "post-comment-form",
        props:['track_id','user_id','replied_to_id'],
        data(){
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    }
</script>

<style scoped>

</style>