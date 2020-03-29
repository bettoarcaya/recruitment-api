<?php

namespace App\Models\Schemas;

/**
 * @OA\Schema(
 * @OA\Xml(name="WorkExperience"))
 */
class WorkExperience
{

    /**
     * @OA\Property(example="YYYY-MM-DD")
     * @var date
     */
    private $start;

    /**
     * @OA\Property(example="YYYY-MM-DD")
     * @var date
     */
    private $end;

    /**
     * @OA\Property(example="Backend lead developer")
     * @var string
     */
    private $position;

}