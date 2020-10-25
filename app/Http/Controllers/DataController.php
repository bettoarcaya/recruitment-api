<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\DataRepository;

class DataController extends Controller
{
    protected $data_repository;

    public function __construct(DataRepository $dataRepository){
        $this->data_repository = $dataRepository;
    }

    /**
     * @OA\Get(
     *     path="/data/search/candidates",
     *     summary="List of all the select data for search candidates",
     *     tags={"Data Search"},
     *     @OA\Response(
     *       response=200,
     *       description="All the neccesary data"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="something is bad."
     *     )
     * )
     */
    public function searchCandidates(): JsonResponse
    {
        $response = $this->data_repository->getSearchData();

        return response()->json([
            'message' => 'data',
            'data' => $response
        ]);
    }
}