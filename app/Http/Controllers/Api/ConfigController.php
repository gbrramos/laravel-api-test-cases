<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ConfigController extends Controller
{
    public function config()
    {
        $userAuthenticated = JWTAuth::user();

        if($userAuthenticated)
        {
            return response()->json([
                'message' => 'Route not found',
            ], 404);
        }
        return response()->json([
            'message' => 'Unauthorized',
        ], 401);
    }
}
