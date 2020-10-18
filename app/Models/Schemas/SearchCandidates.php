<?php

namespace App\Models\Schemas;

/**
 * @OA\Schema(
 * @OA\Xml(name="SearchCandidates"))
 */
class SearchCandidates
{
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
     * @OA\Property(example="50.00")
     * @var float
     */
    private $salary_offer;

    /**
     * @OA\Property(example="1")
     * @var string
     */
    private $work_type_available;

    /**
     * @OA\Property(example="venezuela")
     * @var string
     */
    private $country;

    /**
     * @OA\Property(example="caracas")
     * @var string
     */
    private $city;
}