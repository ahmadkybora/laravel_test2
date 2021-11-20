<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        if(Auth::attempt([
            'username' => $request->input('username'), 
            'password' => $request->input('password')
        ]))
        {
            $user = $request->user();
            return response()->json([
                'state' => true,
                'message' => 'you are loggedIn!',
                'data' => [
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                    'username' => $user->username,
                    'token' => null
                ]
            ], 200);
        }
    }
}
