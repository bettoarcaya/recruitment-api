<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkCategory;

class WorkCategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct( CategoryRepository $category_repository )
    {   
        $this->categoryRepository = $category_repository;
    }

    /**
    * @OA\Get(
    *     path="/categories",
    *     summary="List of all the work categories",
    *     tags={"Categories"},
    *     @OA\Response(
    *       response=200,
    *       description="All the avilable categories."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="something is bad."
    *     )
    * )
    */
    public function index()
    {

        $response = $this->categoryRepository->getAll();

        return response()->json([
            'message' => 'Categories',
            'data' => $response
        ], 
        200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
