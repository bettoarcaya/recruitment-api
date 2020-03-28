<?php

namespace App\Models\Schemas;

/**
 * @OA\Schema(
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