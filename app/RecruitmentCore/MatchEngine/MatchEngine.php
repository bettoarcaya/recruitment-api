<?php

namespace App\RecruitmentCore\MatchEngine;

use App\Http\Resources\PersonCollection;
use App\Models\Job;
use App\Models\Person;
use App\Repositories\RegistrationRepository;
use Illuminate\Support\Collection;

class MatchEngine
{
    private $rules;
    protected $RegistrationRepository;

    public function __construct()
    {
        $this->RegistrationRepository = new RegistrationRepository;
        $this->rules = [
            '1' => ['1' , '3'],
            '2' => ['2' , '3'],
            '3' => ['3']
        ];
    }

    public function match(Job $job)
    {
        $rules = $this->rules[$job->catg_position_id];
        $candidates = $this->RegistrationRepository->getByWorkCatg($rules);
        //return $this->evaluate($candidates, $job->catg_position_id);
        return new PersonCollection($candidates->paginate(10));
    }

    public function evaluate($candidates, $catg)
    {
        $result = [];
        foreach ($candidates->get() as $key => $candidate){
            $result[] = $candidate->toArray();
            if($candidate->work_exp_catg == $catg){
                $result[$key]['percentage'] = 10;
            }else{
                $result[$key]['percentage'] = 5;
            }
        }

        return $result;
    }

    public function evaluateCandidate( Person $candidate )
    {

    }

}
