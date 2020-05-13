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
     * @OA\Property(example="1")
     * @var string
     */
    private $work_exp_catg;

}