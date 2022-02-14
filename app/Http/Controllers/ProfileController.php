<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(){
        return view('profile',[
            "title" => "Profile",
            "genders" => Gender::all()
        ]);
    }

    public function update(ProfileRequest $request){

        Auth::user()->update;

        $request->user()->update([
            'firstName' => $request->get('firstName'),
            'lastName' => $request->get('lastName'),
            'email' => $request->get('email'),
            'middleName' => $request->get('middleName'),
            'password' => Hash::make($request->get('password')),
            'gender_id' => $request->get('gender_id'),
            'image' => $request->file('img')->store('items')
        ]);

        return redirect('saved');
    }
}
