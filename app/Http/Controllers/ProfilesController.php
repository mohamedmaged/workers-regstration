<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    //

    public function create(){
        $this->middleware('auth');

        $user =auth()->user();

        return view('profiles.create',compact('user'));
    }

    public function update(User $user){
        $this->middleware('auth');


        $data=request()->validate([
            'jobTitle'=>'required',
            'description'=>'required',
            'birthday'=>'date|required',
            'image'=>'',
        ]);
        if(\request('image')){
            $imagePath= \request('image')->store('uploads','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray=['image' => $imagePath];
            $data =array_merge($data,$imageArray);
        }
//        dd($data);
        auth()->user()->profile()->update($data);

        return redirect("/home");
    }
    public function index(User $user){
        $prof= $user->profile;
        return $prof;
    }
}
