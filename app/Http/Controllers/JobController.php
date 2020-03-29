<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class JobController extends Controller
{
    public function store(Request $request) : JsonResponse
    {

        return response()->json([
            'message' => 'Candidate list to this Job',
            'data'    => []
        ], 200);
    }
}
