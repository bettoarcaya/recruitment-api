<?php

namespace App\Models\Schemas;

/**
 * @OA\Schema(
 *  required={
 *    "academic_level", 
 *    "academic_espec",
 *  },
 * @OA\Xml(name="Background"))
 */
class Background
{

    /**
     * @OA\Property(example="University")
     * @var string
     */
    private $academic_level;

    /**
     * @OA\Property(example="Back-end Developer")
     * @var string
     */
    private $academic_espec;

}