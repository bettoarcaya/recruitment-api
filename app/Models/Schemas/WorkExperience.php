<?php

namespace App\Models\Schemas;

/**
 * @OA\Schema(
 * @OA\Xml(name="WorkExperience"))
 */
class WorkExperience
{

    /**
     * @OA\Property(example="5 Years")
     * @var string
     */
    private $time;

    /**
     * @OA\Property(example="Backend lead developer")
     * @var string
     */
    private $position;

}