<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RegistrationRepository;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\JsonResponse;

class RegistrationController extends Controller
{

    protected $RegistrationRepository;

    public function __construct( RegistrationRepository $registration_repository )
    {
        $this->RegistrationRepository = $registration_repository;
    }

    /**
    * @OA\Get(
    *     path="/registration",
    *     summary="List of all the registered candidates",
    *     tags={"Registration"},
    *     @OA\Response(
    *       response=200,
    *       description="List all candidates."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="something is bad."
    *     )
    * )
    */
    public function index() : JsonResponse
    {
        $response = $this->RegistrationRepository->getAll();

        return response()->json([
            'message' => 'Candidate list',
            'data'    => $response
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/registration",
     *     summary="Candidate registration",
     *     tags={"Registration"},
     *     operationId="register",
     *     description="",
     *     @OA\RequestBody(
     *         description="Candidate information",
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="person",
     *                 ref="#/components/schemas/Person"
     *            ),
     *            @OA\Property(
     *                 property="background",
     *                 @OA\Items(ref="#/components/schemas/Background")
     *            ),
     *            @OA\Property(
     *                 property="work_experience",
     *                 @OA\Items(ref="#/components/schemas/WorkExperience")
     *            ),
     *            @OA\Property(
     *                 property="address",
     *                 ref="#/components/schemas/AddressPerson"
     *            )
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Candidate registered",
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input",
     *     )
     * )
    */
    public function store(RegistrationRequest $request) : JsonResponse
    {
        $response = $this->RegistrationRepository->add($request->all());

        return response()->json([
            'message' => 'Successful registration',
            'data'    => $response
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
