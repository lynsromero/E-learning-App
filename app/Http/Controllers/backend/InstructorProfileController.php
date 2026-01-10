<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorProfileRequest;
use App\Services\ProfileService;

class InstructorProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService){
        $this->profileService = $profileService;
    }
    public function index(){
        return view('backend.instructor.profile.index');
    }

        public function settings(){
        return view('backend.instructor.profile.settings');
    }

    public function store(InstructorProfileRequest $request){
        $this->profileService->saveProfile($request->all(), $request->file('photo'));

        return redirect()->back()->with('success' , 'Profile Updated Successfully');
    }
}
