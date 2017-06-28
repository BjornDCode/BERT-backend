<?php

namespace App\Http\Controllers;

use JWTAuth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    public function signup(RegisterFormRequest $request) {
        User::create([
            'username' => $request->json('username'),
            'email' => $request->json('email'),
            'password' => bcrypt($request->json('password')),
        ]);

        return response()->json([
            'success' => true
        ], 200);

        // return response()->json([
        //     'success' => 'finally'
        // ], 200);
    }

    public function signin(Request $request) {

        try {
            $user = User::where('email', $request->email)->first();
            $token = JWTAuth::attempt($request->only('email', 'password'), [
                'exp' => Carbon::now()->addWeek()->timestamp,
                'username' => $user->username
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'password' => ['Could not authenticate']
            ], 500);
        }

        if (!$token) {
            return response()->json([
                'password' => ['Email or password is wrong']
            ], 401);
        }

        return response()->json(compact('token'));

    }

}
