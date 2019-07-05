<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

class ProfileController extends Controller
{
    public function profile(){
        return view('profiles.profile');
    }


    public function addProfile(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'designation' => 'required',
            'profile_pic' => 'required'

        ]);

        $profile = new Profile();
        $profile->name = $request->input('name');
        $profile->designation = $request->input('designation');
        $profile->user_id = Auth::user()->getAuthIdentifier();

        if(Input::hasFile('profile_pic')){
         $file = Input::file('profile_pic');
         $file->move(public_path().'/uploads/',$file->getClientOriginalName());
         $url = URL::to("/").'/uploads/'.$file->getClientOriginalName();
        }

        $profile->profile_pic = $url;
        $profile->save();
        return redirect('/home')->with('response','Profile Added Successfully');
    }
}
