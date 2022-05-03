<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function login(Request $request){
        $user= User::where(['email'=> $request->email])->first();

        if(!$user ||! Hash::check($request->password,$user->password) ){
            return "Username or password is not match";
        }else{
            $request->session()->put('user',$user);
            return redirect('/');
        }
    }
}
