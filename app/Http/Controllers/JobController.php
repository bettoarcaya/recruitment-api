<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class JobController extends Controller
{
    public function store(Request $request) : JsonResponse
    {

        return response()->json([
            'message' => 'Successful job registration',
            'data'    => []
        ], 200);
    }
}
