<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\JobRepository;

class JobController extends Controller
{
    protected $jobRepository;

    public function __construct( JobRepository $job_repository )
    {
        $this->jobRepository = $job_repository;
    }

    /**
     * @OA\Get(
     *     path="/jobs",
     *     summary="List of all the available Jobs",
     *     tags={"Job"},
     *     @OA\Response(
     *       response=200,
     *       description="All the avilable Jobs."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="something is bad."
     *     )
     * )
     */
    public function index()
    {
        $response = $this->jobRepository->all();

        return response()->json([
            'message' => 'All the jobs',
            'data' => $response
        ]);
    }

    /**
     * @OA\Post(
     *     path="/jobs",
     *     summary="Job position details",
     *     tags={"Job"},
     *     operationId="store",
     *     description="",
     *     @OA\RequestBody(
     *         description="Job information",
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="Job",
     *                 @OA\Items(ref="#/components/schemas/Job")
     *            )
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Job registered",
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input",
     *     )
     * )
    */
    public function store(Request $request) : JsonResponse
    {
        $response = $this->jobRepository->add($request->Job);

        return response()->json([
            'message' => 'Successful job registration',
            'data'    => $response
        ], 200);
    }

}
