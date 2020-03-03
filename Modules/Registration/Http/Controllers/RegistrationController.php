<?php

namespace Modules\Registration\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Registration\Http\Requests\RegistrationRequest;
use App\Repositories\RegistrationRepository;

class RegistrationController extends Controller
{
    protected $RegistrationRepository;

    public function __constrctor( RegistrationRepository $registration_repository )
    {   
        $this->RegistrationRepository = $registration_repository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('registration::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('registration::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param RegistrationRequest $request
     * @return Response
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
