<?php

namespace MusicTube\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use MusicTube\Artist;

class ArtistController extends Controller
{
    protected $rules = [
        'name' => 'required|unique:artist|max:255',
        'country' => 'required',
        'year' => 'numeric'
    ];

    protected $messages = [
        'required' => 'The :attribute field is required!',
        'unique' => 'The :attribute field is unique!',
        'numeric' => 'The :attribute must be number!',
        'max' => 'The :attribute must be maximum of 255 characters!'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();
        return view('artist.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artist.create');
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
        $artist = new Artist();
        $artist->name = $request['name'];
        $artist->country = $request['country'];
        $artist->year_formed = $request['year'];
        $artist->photo_url = $request['photo_url'];
        $artist->description = $request['description'];
        $artist->is_band = isset($request['is_band']) ? 1 : 0;
        $artist->save();
        return redirect('artist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::find($id);
        return view('artist.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artist::find($id);
        return view('artist.edit', compact('artist'));
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
            'country' => 'required',
            'year' => 'numeric'
        ],$this->messages);

        if ($validator->fails()) {
            return back()->with('error_messages',$validator->errors()->all());
        }
        $artist = Artist::find($id);
        $artist->name = $request['name'];
        $artist->country = $request['country'];
        $artist->year_formed = $request['year'];
        $artist->photo_url = $request['photo_url'];
        $artist->description = $request['description'] != null ? $request['description'] : "";
        $artist->is_band = isset($request['is_band']) ? 1 : 0;
        $artist->save();
        return redirect('artist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artist::find($id)->delete();
        return redirect("artist");
    }
}
