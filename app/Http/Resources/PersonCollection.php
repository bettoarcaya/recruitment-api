<?php

namespace App\Http\Resources;

use App\RecruitmentCore\MatchEngine\MatchEngine;
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
                  'percentage' => $this->engine->evaluate($row),
                  'personal_data' => $person->fill($row->toArray()),
                  'backgrounds' => $row->backgrounds,
                  'work_experiences' => $row->work_experiences,
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
