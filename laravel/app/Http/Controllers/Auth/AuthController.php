<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'message' => 'Logged in successfully :)',
            ]);
        }

        return response()->json([
            'message' => '認証失敗'
        ], 422);
    }

    public function signup(SignupRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
            'display_id' => $validated['display_id'],
        ]);
        Auth::login($user);
        return response()->json([//成功を返す
            'message' => 'Created successfully :)'
        ], 201);
    }

    public function logout()
    {
        session()->invalidate();
        Auth::logout();
        return response()->json([
            'message' => 'Logged out successfully :)'
        ], 200);
    }

    public function getCurrentUser()
    {
        $user = Auth::user();
        return $user;
    }
}
