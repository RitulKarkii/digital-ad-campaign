<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',
        ]);
        $role = User::count() == 0 ? 'admin' : 'user';
        
        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$role,
        ]);

        return response()->json([
            'message'=>'User Added',
            'user'=>$user
        ]);
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credential = $request->only('email','password');

        if(Auth::attempt($credential)){
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;
            return response()->json([
                'message'=>'Login Successfully',
                'user' => $user,
                'token'=>$token,
                'role'=>$user->role
            ]);
        }

        return response()->json([
            'message'=>'Faield'
        ]);
    }

   
}
