<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Nullable;

class RegisterController extends Controller
{
    
    public function sign_up(){
        return view('auth.register',[
            "title" => "Sign Up", 
            "roles" => Role::all(),
            "genders" => Gender::all()
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'firstName' => 'required|max:25',
            'lastName' => 'required|max:25',
            'gender_id' => 'required',
            'middleName'=> 'nullable',
            'email' => 'required|email',
            'role_id'=>'required',
            'password'=> ['required','min:8','regex:/^.*(?=.*[0-9]).*$/'],
            'image' => 'image'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $validatedData ['image'] = $request->file('img')->store('items');
        
        User::create($validatedData);

        return redirect('/home');
    }
}
