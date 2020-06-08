<?php

namespace App\Models\Schemas;

/**
 * @OA\Schema(
 *  required={
 *    "firstname",
 *    "lastname",
 *    "email",
 *    "gender",
 *    "born_date"
 *  },
 * @OA\Xml(name="Person"))
 */
class Person
{

    /**
     * @OA\Property(example="Jhon")
     * @var string
     */
    private $firstname;

    /**
     * @OA\Property(example="Doe")
     * @var string
     */
    private $lastname;

    /**
     * @OA\Property(example="Jhondoe@mail.com")
     * @var string
     */
    private $email;

    /**
     * @OA\Property(example="gender")
     * @var string
     */
    private $gender;

    /**
     * @OA\Property(example="YYYY-MM-DD")
     * @var string
     */
    private $born_date;

    /**
     * @OA\Property(example="1")
     * @var string
     */
    private $work_exp_catg;

}
