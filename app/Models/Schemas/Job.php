<?php

namespace App\Models\Schemas;

/**
 * @OA\Schema(
 * @OA\Xml(name="Job"))
 */
class Job
{

    /**
     * @OA\Property(example="Microsoft")
     * @var string
     */
    private $company_name;

    /**
     * @OA\Property(example="1")
     * @var string
     */
    private $catg_position_id;

    /**
     * @OA\Property(example="5")
     * @var string
     */
    private $experience_years;

    /**
     * @OA\Property(example="remote")
     * @var string
     */
    private $position_type;

}