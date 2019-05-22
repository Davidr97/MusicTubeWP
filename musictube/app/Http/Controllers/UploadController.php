<?php

namespace MusicTube\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use MusicTube\Album;
use MusicTube\Track;

class UploadController extends Controller
{

    protected $rules = [
        'name' => 'required|max:191',
        'lyrics' => 'nullable|max:191',
        'description' => 'nullable|max:191',
        'album' => 'required|numeric|min:1',
    ];

    protected $messages = [
        'required' => 'The :attribute field is required!',
        'min' => 'The album must be selected!',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tracks=Track::where('uploaded_by',auth()->user()->id)->with('album')->get();
        return view('upload.index',compact('tracks'));
    }

    public function add_track()
    {
        $albums=Album::all();
        return view('upload.upload_track',compact('albums'));
    }
    public function add_track_post(Request $request)
    {
        $data=$request->all();
        $track=Track::where('uploaded_by',auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->first();
        $user_email=auth()->user()->email;
        $validator = Validator::make($data, $this->rules,$this->messages);
        if ($validator->fails())
        {
            $filename=$track->name;
            Storage::disk('local')->delete('tracks/'.$user_email."/".$filename);
            Track::where('uploaded_by',auth()->user()->id)->where('name',$filename)->delete();
            return back()->with('error_messages',$validator->errors()->all());
        }
        else
        {
            $filename=$track->name;
            Storage::disk('local')->move('tracks/'.$user_email."/".$filename, 'tracks/'.$user_email."/".$data['name']);
            $track->update(
                array(
                    'name'=>$data['name'],
                    'lyrics'=>$data['lyrics'],
                    'album_id'=>$data['album'],
                    'description'=>$data['description']
                )
            );
            return redirect()->route('tracks')->with('message','Track uploaded successfully');
        }
    }

    public function edit_track($id)
    {
        $track=Track::where('id',$id)->first();
        $albums=Album::all();
        return view('upload.edit_track',compact('track','albums'));
    }

    public function edit_track_post(Request $request)
    {
        $data=$request->all();
        $validator = Validator::make($data, $this->rules,$this->messages);
        if ($validator->fails())
        {
            return back()->with('error_messages',$validator->errors()->all());
        }
        else
        {
            $track=Track::where('id',$data['id'])->first();
            if($track->name!=$data['name'])
            {
                $filename=$track->name;
                $user_email=auth()->user()->email;
                Storage::disk('local')->move('tracks/'.$user_email."/".$filename, 'tracks/'.$user_email."/".$data['name']);
            }
            $track->update(
                    array(
                        'name'=>$data['name'],
                        'lyrics'=>$data['lyrics'],
                        'album_id'=>$data['album'],
                        'description'=>$data['description']
                    )
            );
            return back()->with('message','Track edited successfully');
        }
    }

    public function delete_track($id)
    {
        $track=Track::where('id',$id)->where('uploaded_by',auth()->user()->id)->first();
        if($track!=null)
        {
            $filename=$track->name;
            $user_email=auth()->user()->email;
            Storage::disk('local')->delete('tracks/'.$user_email."/".$filename);
            Track::where('id',$id)->delete();
        }
        return redirect()->route('tracks')->with('message','Track deleted successfully');
    }


    public function upload(Request $request)
    {
        $uploadedFile=$request->file('file');
        $filename=$uploadedFile->getClientOriginalName();
        $user_email=auth()->user()->email;
        Storage::disk('local')->putFileAs(
            'tracks/'.$user_email,$uploadedFile,$filename
        );
        $track=new Track;
        $track->name=$filename;
        $track->lyrics='';
        $track->description='';
        $track->album_id=null;
        $track->created_at=date("Y-m-d H:i:s");
        $track->updated_at=date("Y-m-d H:i:s");
        $track->user_id()->associate(auth()->user());
        $track->save();
        return response()->json([
            'id' => $track->id
        ]);
    }
    public function delete_uploaded(Request $request)
    {
        $filename=$request->name;
        $user_email=auth()->user()->email;
        Storage::disk('local')->delete('tracks/'.$user_email."/".$filename);
        Track::where('uploaded_by',auth()->user()->id)->where('name',$filename)->delete();
    }
}
