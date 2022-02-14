<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function registered(){
        return view('admin.edit',[
            "title" => "Account Maintenance",
            "users" => User::all()
        ]);
    }

    public function edit($id){
        $user = User::find($id);
        $role = Role::all();
        return view('admin.update',[
            "title" => "Update Role",
        ],
           compact('user','role')
        );        
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'role_id' => 'required'
        ]);

        User::find($id)->update($validatedData);

        return redirect('/account-maintenance');
    }

    public function destroy($id){
        $model = User::find($id);
        $model->delete();
        return redirect('/account-maintenance');
    }
}
