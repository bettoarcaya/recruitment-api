<?php

namespace App\Models\Schemas;

/**
 * @OA\Schema(
 * @OA\Xml(name="Background"))
 */
class Background
{
    /**
     * @OA\Property(example="Standford")
     * @var string
     */
    private $name;

    /**
     * @OA\Property(example="University")
     * @var string
     */
    private $academic_level;

}
