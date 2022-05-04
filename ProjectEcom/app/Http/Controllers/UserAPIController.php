<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Laravel\Passport\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;
use Illuminate\Support\Facades\Hash;

class UserAPIController extends Controller

{
    use HasApiTokens;
    private $user;

    public function __construct()
    {
        $this->users = new User();
    }
    public function getUser()
    {
        return response()->json(User::all(), 200);
    }
    public function getUserById($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json(['message' => 'user Not Found'], 404);

        }
        return response()->json($user::find($id), 200);
    }
    public function addUser(Request $request)
    {
        $user = User::create($request->all());
        return response($user, 201);
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json(['message' => 'User Not Found'], 404);

        }
        $user->update($request->all());
        return response($user, 200);
    }
    public function deleteUser(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $user->delete();

        return response()->json(null, 204);
    }
    public $successStatus = 200;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:6',

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        // $user = new User();
        // $user->name =$request->name;
        // $user->email =$request->email;
        // $user->password =$request->bcrypt(['password']);        
        // $user->role = 'user';
        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        // $input['role']= $request->role;
        // $user->save();
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success' => $success], $this->successStatus);
    }
    /** @var \App\Models\User $user **/
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $success['token'] = $user->createToken('MyApp')->accessToken;
                $success['name'] = $user->name;
                return response()->json(['success' => $success], $this->successStatus);
            }
            else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        }
        else {
            $response = ["message" => 'User does not exist'];
            return response($response, 422);
        }
    }
    public function logout(Request $request)
    { // Chua lay duoc token
        if ($request->user()) {
            $token = $request->user()->token();
            $token->revoke();
            $response = ['message' => 'You have been successfully logged out!'];
            return response($response, 200);
        }
        return response()->json(['message' => 'K co user'], 200);
    }
}
