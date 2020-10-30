<?php

namespace App\Models\Schemas;

/**
 * @OA\Schema(
 *  required={
 *    "country",
 *    "state",
 *    "city"
 *  },
 * @OA\Xml(name="Address"))
 */
Class AddressPerson
{
    /**
     * @OA\Property(example="Venezuela")
     * @var string
     */
    private $country;

    /**
     * @OA\Property(example="Anzoategui")
     * @var string
     */
    private $state;

    /**
     * @OA\Property(example="Puerto la cruz")
     * @var string
     */
    private $city;

}