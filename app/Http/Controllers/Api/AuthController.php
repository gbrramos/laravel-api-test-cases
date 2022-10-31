<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;

class AuthController extends Controller
{

    public function authenticate(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function register(Request $request){
            try
            {
                $userExists = User::where('email', $request['email'])->count();

                if($userExists > 0)
                    return response()->json([
                        'message' => 'The email has already been taken.',
                    ], 409);

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);

                return response()->json([
                    'message' => 'User created successfully',
                    'user' => $user,
                ]);
        }
        catch(Exception $th)
        {
            return response()->json([
                'message' => 'Error creating user',
            ], 500);
        }

    }
}
