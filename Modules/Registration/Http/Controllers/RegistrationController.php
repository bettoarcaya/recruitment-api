<?php

namespace Modules\Registration\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Registration\Http\Requests\RegistrationRequest;
use App\Repositories\RegistrationRepository;

class RegistrationController extends \App\Http\Controllers\Controller
{
    protected $RegistrationRepository;

    public function __constrctor( RegistrationRepository $registration_repository )
    {   
        $this->RegistrationRepository = $registration_repository;
    }

    
    public function index()
    {
        return view('registration::index');
    }

    
    public function create()
    {
        return view('registration::create');
    }

    /**
     * @OA\Post(
     *     path="/registration",
     *     summary="Registrar un cantidato",
     *     tags={"Registration"},
     *     operationId="register",
     *     description="",
     *     @OA\RequestBody(
     *         description="Informacion necesaria del candidato",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Candidato registrado de manera satisfactoria",
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input",
     *     )
     * )
    */
    public function store(RegistrationRequest $request)
    {

        $response = $this->RegistrationRepository->add($request->all());

        return response()->json([
            'message' => 'Registro exitoso',
            'data'    => $response
        ], 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('registration::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('registration::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
