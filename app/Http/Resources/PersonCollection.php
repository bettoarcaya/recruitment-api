<?php

namespace App\Http\Resources;

use App\RecruitmentCore\MatchEngine\MatchEngine;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Person;

class PersonCollection extends ResourceCollection
{
    protected $engine;
    protected $person;

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->engine = new MatchEngine();
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'candidates' => $this->collection->transform(function($row) {
                $person = new Person();
              return [
                  'personal_data' => [
                      'firstname' => $row->firstname,
                      'lastname' => $row->lastname,
                      'email' => $row->email,
                      'gender' => $row->gender,
                      'born_date' => $row->born_date,
                      'work_exp_catg' => $row->work_catg(),
                      'age' => Carbon::parse($row->born_date)->age,
                      'work_type_available' => $row->work_types()
                  ], //$person->fill($row->toArray()),
                  'backgrounds' => $row->backgrounds,
                  'work_experiences' => $row->work_experiences,
                  'address' => $row->address
              ];
            }),
            'links' => [
                'next' => $this->resource->nextPageUrl(),
                'prev' => $this->resource->previousPageUrl()
            ],
            'meta' => [
                'total' => $this->resource->total(),
                'current_page' => $this->resource->currentPage()
            ],
        ];
        //return parent::toArray($request);
    }
}
