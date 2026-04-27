<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Log;

class AuthController extends Controller
{
    public function login(Request $request)
{
    // 1. Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // 2. Attempt login
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid email or password'
        ], 401);
    }

    // 3. Get user
    $user = Auth::user();

    // 4. Return response
    return response()->json([
        'status' => true,
        'message' => 'Login successful',
        'user' => $user
    ]);
}

    
}
