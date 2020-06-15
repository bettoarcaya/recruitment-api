<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $token = $user->createToken('authToken')->accessToken;

        return response()->json([
            'success' => true,
            'message' => 'Registration completed',
            'data' => [
                'token' => $token,
                'user' => $user
            ]
        ]);
    }


    public function login( Request $request )
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if( !auth()->attempt($data) ){
            return response()->json([
                'success' => false,
                'message' => 'This credentials do not match our records'
            ], 401);
        }

        $token = auth()->user()->createToken('authToken')->accessToken;

        return response()->json([
            'success' => true,
            'message' => 'Login completed',
            'data' => [
                'token' => $token,
                'user' => auth()->user()
            ]
        ]);
    }

    public function logout( Request $request )
    {
        if (auth()->user()) {
            $user = auth()->user()->token();
            $user->revoke();

            return response()->json([
                'success' => true,
                'message' => 'Logout successfully'
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to Logout'
            ]);
        }
    }
}
