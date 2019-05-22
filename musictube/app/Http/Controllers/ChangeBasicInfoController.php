<?php

namespace MusicTube\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ChangeBasicInfoController extends Controller
{

    protected $rules = [
        'name' => 'required|max:191',
        'surname' => 'required|max:191',
        'email' => 'required|email|max:191',
        'avatar_url' => 'required|max:191',
    ];


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editBasicInformation($id)
    {
        $user=DB::table('users')->where('id',$id)->first();
        return view('auth.edit_basic_info',compact('user'));
    }

    protected function updateBasicInformation(Request $request)
    {

        $this->validate($request, $this->rules);
        $data=$request->all();
        DB::table('users')
            ->where('id',$data['id'])
            ->update(
                array(
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'email' => $data['email'],
                    'avatar_url'=> $data['avatar_url'],
                )
            );
        $user=DB::table('users')->where('id',$data['id'])->first();
        return view('auth.edit_basic_info',compact('user'));
    }
}
