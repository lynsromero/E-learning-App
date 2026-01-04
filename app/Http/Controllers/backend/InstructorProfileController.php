<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorProfileController extends Controller
{
    public function index(){
        return view('backend.instructor.profile.index');
    }

        public function settings(){
        return view('backend.instructor.profile.settings');
    }

    public function update(Request $request){



        $photo = $request->file('photo');
        if ($photo){

            if(Auth::user()->photo){
                unlink((Auth::user()->photo));
            }


            $photo_name = time() . rand(10000 , 200000) . $photo->getClientOriginalName();
            $photo->storeAs('instructors/photos' , $photo_name , 'public');
            $photo_name = 'storage/instructors/photos/' . $photo_name;

        }

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->bio = $request->input('bio');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->photo = isset($photo_name) ?$photo_name : null;
        $user->save();



        return back()->with('success', 'Profile updated successfully');
    }
}
