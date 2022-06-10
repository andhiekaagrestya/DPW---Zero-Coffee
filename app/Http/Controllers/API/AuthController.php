<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $data = $request->all();
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        
        if(Auth::attempt($credentials)){
            $user = User::where('email', $data['email'])->first();

            return response()->json([
                "token" => $user->createToken('VRTkXGtLhP11xe1owk0w7qjzc1qQn89ZFZese5xg')->accessToken['token'],
                "message" => "Berhasil Login.",
                "data" => []
            ]);
        }
        
        return response()->json([
            "message" => "Gagal Login.",
            "data" => []
        ]);
    }

    public function register(Request $request){
        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            "role" => "customer"
        ]);

        return response()->json([
            "message" => "Berhasil Daftar.",
            "data" => []
        ]);
    }
}   
