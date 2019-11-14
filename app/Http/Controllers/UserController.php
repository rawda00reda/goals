<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $users = User::whereIn('roles',['admin'])->latest()->paginate(10);
        return view('admin.users.all',compact('users'));
    }

    public function usersID(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        if ($user->roles == 'admin') {
            $user->roles = 'user';
            $user->save() ;
        }else{
            $user->roles = 'admin';
            $user->save() ;
        }

        return back()->with('success','تم الترقية بنجاح');
    }
}
