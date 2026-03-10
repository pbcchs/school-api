<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'teacher'
        ]);

        $teacher = \App\Models\Teacher::create([
            'user_id' => $user->id,
            'full_name' => $request->name,
            'mobile' => $request->mobile
        ]);

        return response()->json([
            'message' => 'Teacher registered successfully'
        ]);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                'message' => 'Invalid credentials'
            ],401);
        }

        $user = Auth::user();

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    public function profile(Request $request)
    {
        return $request->user();
    }
}
