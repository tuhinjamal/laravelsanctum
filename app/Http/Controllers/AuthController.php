<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            
            return response()->json(['status_code' => 400, 'message' => 'bad request']);

        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password= bcrypt($request->password);
        $user->save();
        return response()->json(['status_code' => 200, 'message' => 'User created successfully']);
    }

    public function login(Request $request){
         $validator = Validator::make($request->all(),[
            
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            
            return response()->json(['status_code' => 400, 'message' => 'bad request']);

        }

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json(['status_code' => 500, 'message' => 'unauthorized']);
        }
        $user =User::where('email',$request->email)->first();
        $tokenResult= $user->createToken('authToken')->plainTextToken;

        return response()->json(['status_code' => 200, 'token' => $tokenResult]);
    }
    public function logout(Request $request){
        
        $request->user()->currentAccessToken()->delete();

        return response()->json(['status_code' => 200, 'message' => 'token deleted successfully']);
    
    }
}
