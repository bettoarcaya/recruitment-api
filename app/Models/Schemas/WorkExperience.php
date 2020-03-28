<?php

namespace App\Models\Schemas;

/**
 * @OA\Schema(
 *  required={
 *    "time", 
 *    "position",
 *  },
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