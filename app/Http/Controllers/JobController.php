<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\JobRepository;
use App\RecruitmentCore\MatchEngine\MatchEngine;
use App\Http\Requests\SearchCandidate;

class JobController extends Controller
{
    protected $jobRepository;
    protected $matchEngine;

    public function __construct(
        JobRepository $job_repository,
        MatchEngine $match_engine
    ){
        $this->jobRepository = $job_repository;
        $this->matchEngine = $match_engine;
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
    public function index() : JsonResponse
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
     *         @OA\JsonContent(ref="#/components/schemas/Job")
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
    public function store(JobRequest $request) : JsonResponse
    {
        $response = $this->jobRepository->add($request->all());

        return response()->json([
            'message' => 'Successfully job registration',
            'data'    => $response
        ], 200);
    }

    /**
     * @OA\Get(
     *     path="/jobs/match/{jobId}",
     *     summary="List of all the available professionals to this job",
     *     tags={"Job"},
     *     @OA\Parameter(
     *         name="jobId",
     *         in="path",
     *         description="Job ID",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="All the avilable professionals to this job."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="something is bad."
     *     )
     * )
     */
    public function match(string $job_id) : JsonResponse
    {
        $job = $this->jobRepository->find($job_id);
        $response = $this->matchEngine->match($job);

        return response()->json([
            'message' => 'Candidate List for this Job',
            'data' => $response
        ], 200);
    }
           
    /**
     * @OA\Post(
     *     path="/jobs/search",
     *     summary="Get candidates for a position",
     *     tags={"Search Candidates"},
     *     operationId="search",
     *     description="Search candidates by an specifications",
     *     @OA\RequestBody(
     *         description="Job information for candidates",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/SearchCandidates")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Available candidates"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input",
     *     )
     * )
    */
    public function search(SearchCandidate $request) : JsonResponse
    {
        $response = $this->matchEngine->search($request->all());
        
        return response()->json([
            'message' => 'Candidates',
            'data' => $response
        ], 200);
    }

}
