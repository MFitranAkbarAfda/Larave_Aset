<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Illuminate\Support\Facaes\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function login(Request $request){
        $success = "berhasil login"; 
        $user = $request->only('username','password');
        if(Auth::attempt($user)){
            $token = Str::random(80);
            $role  = Auth::user()->role;
            Auth::user()->api_token = $request->password;
            Auth::user()->save();
            return response()->json(['token' => $token,$role,$success],200);
        }
        return response()->json(['token' => 'username dan password salah'],403);
    }

    public function register(Request $request) {    
        $validator = Validator::make($request->all(), [ 
          'nama'        => 'required|unique:users',
          'username'    => 'required|unique:users',
          'no_hp'     => 'required|unique:users',
          'password'    => 'required|string|min:6|confirmed', 
          'email'       => 'required|email',
          'alamat'      => 'required',
          'description' => '',
      ]);   
        if ($validator->fails()) {          
         return response()->json(['error'=>$validator->errors()], 401);  
     }    
     $input = $request->all();
     $token = Str::random(80);  
     $input['password'] = bcrypt($input['password']);
     $input['api_token'] = $request->password;
     $user = User::create($input); 
     return response()->json(['success'=> $token],200); 
    }

}
