<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAPIController extends Controller
{
    public function getUser(){
        return response()->json(User::all(),200);
    }
    public function getUserById($id){
        $user= User::find($id);
        if(is_null($user)){
            return response()->json(['message' => 'user Not Found'],404);

        }
        return response()->json($user::find($id),200);
    }
    public function addUser(Request $request){
        $user =User::create($request->all());
        return response($user,201);
    }
    public function updateUser(Request $request , $id){
        $user= User::find($id);
        if(is_null($user)){
            return response()->json(['message' => 'User Not Found'],404);

        }
        $user->update($request->all());
        return response($user,200);
    }
    public function deleteUser(Request $request , $id){
        $user= User::find($id);
        if(is_null($user)){
            return response()->json(['message' => 'User Not Found'],404);
        }
        $user->delete();
       
        return response()->json(null,204);
    }
}
