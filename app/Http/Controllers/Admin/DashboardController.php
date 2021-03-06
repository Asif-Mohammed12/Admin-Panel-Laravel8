<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registered()
    {
        $users = User::all();
        return view('admin.register')->with('users',$users);
    }
    public function registeredit(Request $request,$id)
    {
        $users = User::findorfail($id);
        return view('admin.register-edit')->with('users',$users);
    }
    
    public function registerupdate(Request $request, $id)
    {
        $users = user::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->update();

        return redirect('/role-register')->with('status','Your Data has Been Updated');
    }

    public function registerdelete($id)
    {
        $users = User::findorfail($id);
        $users->delete();
        return redirect('/role-register')->with('status','Your Data is Deleted');
    }
}
