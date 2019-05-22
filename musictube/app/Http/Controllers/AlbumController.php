<?php

namespace MusicTube\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MusicTube\Album;
use MusicTube\Artist;
use MusicTube\Track;

class AlbumController extends Controller
{

    protected $rules = [
        'name' => 'required|unique:album|max:255',
        'year' => 'numeric',
    ];

    protected $messages = [
        'required' => 'The :attribute field is required!',
        'unique' => 'The :attribute field is unique!',
        'numeric' => 'The :attribute must be number'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = DB::table('track')
                    ->where('uploaded_by','=', auth()->user()->id)
                    ->select('album_id')
                    ->distinct()
                    ->pluck('album_id')
                    ->toArray();
        $albums = Album::whereIn('id', $tracks)->get();
        return view('album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::all();
        return view('album.create', compact('artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, $this->rules,$this->messages);

        if ($validator->fails()) {
            return back()->with('error_messages',$validator->errors()->all());
        }

        $album = new Album();
        $album->name = $request['name'];
        $album->year_released = $request['year'];
        $album->cover_photo_url = $request['photo_url'];
        $album->artist_id = $request['artist'];
        $album->save();
        return redirect('album');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);
        return view('album.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        $artists = Artist::all();
        return view("album.edit", compact('album', 'artists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'year' => 'numeric',
        ],$this->messages);

        if ($validator->fails()) {
            return back()->with('error_messages',$validator->errors()->all());
        }

        $album = Album::find($id);
        $album->name = $request['name'];
        $album->year_released = $request['year'];
        $album->cover_photo_url = $request['photo_url'];
        $album->artist_id = $request['artist'];
        $album->save();
        return redirect('album');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::find($id)->delete();
        return redirect("album");
    }
}
