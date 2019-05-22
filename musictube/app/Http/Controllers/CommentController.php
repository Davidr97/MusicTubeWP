<?php

namespace MusicTube\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MusicTube\Comment;
use MusicTube\Comment_Status;

class CommentController extends Controller
{

    protected $rules = [
        'text' => 'required|max:191',
        'track_id'=>'required|integer',
        'user_id'=>'required|integer'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function postComment(Request $request)
    {
        $data=$request->all();
        $validator = Validator::make($data, $this->rules);

        if ($validator->fails()) {
            return back()->with('error_messages',$validator->errors()->all());
        }
        $comment=new Comment();
        $comment->text=$request['text'];
        $comment->track_id=$request['track_id'];
        $comment->user_id=$request['user_id'];
        $comment->replied_to_id=$request['replied_to_id'];
        $comment->save();
        return back();
    }

    public function deleteComment($id)
    {
        Comment::find($id)->delete();
        return back();
    }

    public function likeComment(Request $request)
    {
        $user_id=$request['user_id'];
        $comment_id=$request['comment_id'];
        $comment_status=DB::table('Comment_Status')
            ->where('user_id',$user_id)
            ->where('comment_id',$comment_id)
            ->first();
        if($comment_status==null)
        {
            $comment_status=new Comment_Status();
            $comment_status->type=1;
            $comment_status->user_id=$user_id;
            $comment_status->comment_id=$comment_id;
            $comment_status->save();
        }
        else if($comment_status->type==0)
        {
            DB::table('Comment_Status')
                ->where('user_id',$user_id)
                ->where('comment_id',$comment_id)
                ->update(['type'=>1]);
        }
        return Comment_Status::where('comment_id',$comment_id)->get();
    }

    public function dislikeComment(Request $request)
    {
        $user_id=$request['user_id'];
        $comment_id=$request['comment_id'];
        $comment_status=DB::table('Comment_Status')
            ->where('user_id',$user_id)
            ->where('comment_id',$comment_id)
            ->first();
        if($comment_status==null)
        {
            $comment_status=new Comment_Status();
            $comment_status->type=0;
            $comment_status->user_id=$user_id;
            $comment_status->comment_id=$comment_id;
            $comment_status->save();
        }
        else if($comment_status->type==1)
        {
            DB::table('Comment_Status')
                ->where('user_id',$user_id)
                ->where('comment_id',$comment_id)
                ->update(['type'=>0]);
        }
        return Comment_Status::where('comment_id',$comment_id)->get();
    }
}
