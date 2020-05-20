<?php

namespace App\Http\Resources;

use App\RecruitmentCore\MatchEngine\MatchEngine;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Person;

class PersonCollection extends ResourceCollection
{
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
              $engine = new MatchEngine();
              return [
                  'personal_data' => $person->fill($row->toArray()),
                  'backgrounds' => $row->backgrounds,
                  'work_experiences' => $row->work_experiences,
                  'percentage' => $engine->evaluate()
              ];
            })
        ];
        //return parent::toArray($request);
    }
}
