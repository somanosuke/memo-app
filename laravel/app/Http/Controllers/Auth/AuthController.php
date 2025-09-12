<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'display_id' => ['required', 'alpha_num'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'message' => 'ログイン成功',
                'user' => Auth::user()
            ]);
        }

        return response()->json([
            'message' => '認証失敗'
        ], 422);
    }

    public function getCurrentUser()
    {
        $user = Auth::user();
        return $user;
    }
}
