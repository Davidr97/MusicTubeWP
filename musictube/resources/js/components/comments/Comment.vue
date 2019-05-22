<template>
    <div class="media border border-dark rounded p-4 mb-3" style="background-color: #eeeeee">
        <div class="media-left">
            <img v-bind:src="comment_props.written_by.avatar_url" class="media-object img-fluid rounded-circle" style="width:60px">
        </div>
        <div class="media-body ml-3 mt-3">
            <h6 class="media-heading"><b>{{comment_props.written_by.name + " " +comment_props.written_by.surname}}</b></h6>
            <p>{{comment_props.text}}</p>
            <div class="row" style="color: black">
                <div class="offset-2"></div>
                <div class="col-2">
                    <a class="btn btn-success" v-on:click="like">
                        <i class="fa fa-thumbs-up">{{likes}}</i>
                    </a>
                </div>
                <div class="col-2">
                    <a class="btn btn-danger" v-on:click="dislike">
                        <i class="fa fa-thumbs-down">{{dislikes}}</i>
                    </a>
                </div>
                <div v-if="canDelete" class="col-2">
                    <a v-bind:href="deleteUrl" class="btn btn-danger" style="color:black">
                        <i class="fa fa-trash"> Delete</i>
                    </a>
                </div>

                <div v-if="canReplyTo" class="col-2">
                    <button class="btn btn-link" v-on:click="showForm">Reply</button>
                </div>
                <div v-if="formVisible">
                    <post-comment-form v-bind:track_id="comment_props.track_id"
                                       v-bind:user_id="user_id"
                                       v-bind:replied_to_id="comment_props.id"></post-comment-form>
                </div>
            </div>
            <comment-list v-if="canReplyTo"
                          v-bind:comments_props="comment_props.replies"
                          v-bind:user_id="user_id"
                          v-bind:root="false"></comment-list>
        </div>
    </div>
</template>

<script>
    export default {
        name: "comment",
        props:['comment_props','user_id','root'],
        data:function () {
            return{
                likes:this.comment_props.likes.length,
                dislikes:this.comment_props.dislikes.length,
                formVisible:false,
                canReplyTo:this.root==="true",
                canDelete:this.user_id==this.comment_props.written_by.id,
                deleteUrl:"/delete_comment/"+this.comment_props.id
            }
        },
        methods:{
            like:function () {
                alert(this.user_id);
                axios.post('/like_comment',{
                    user_id:this.user_id,
                    comment_id:this.comment_props.id
                }).then(response=>{
                    return this.update(response.data)
                })
                    .catch(error=>window.location.href = '/login');
            },
            dislike:function () {
                axios.post('/dislike_comment',{
                    user_id:this.user_id,
                    comment_id:this.comment_props.id
                }).then(response=>{
                    return this.update(response.data)
                })
                    .catch(error=>window.location.href = '/login');
            },
            update:function (data) {
                let comment_likes=data.filter(comment=>comment.type===1).length;
                let comment_dislikes=data.filter(comment=>comment.type===0).length;
                this.likes=comment_likes;
                this.dislikes=comment_dislikes;
            },
            showForm:function () {
                this.formVisible=!this.formVisible;
            }
        }
    }
</script>

<style scoped>

</style>