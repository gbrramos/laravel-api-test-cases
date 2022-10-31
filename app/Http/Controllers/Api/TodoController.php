<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::all();

        if(count($todos) <= 0)
        {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }

        return response()->json([
            'todos' => $todos,
        ], 200);
    }
}
