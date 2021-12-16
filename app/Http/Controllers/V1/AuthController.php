<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $credentials = $request->validated();

        $token = Auth::guard()->attempt($credentials);

        if (!$token) {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }

        return response()->json(['access_token' => $token]);
    }
}
