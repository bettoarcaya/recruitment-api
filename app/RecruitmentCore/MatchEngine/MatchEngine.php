<?php

namespace App\RecruitmentCore\MatchEngine;

use App\Http\Resources\CandidateCollection;
use App\Models\Job;
use App\Repositories\RegistrationRepository;
use Illuminate\Support\Collection;

class MatchEngine
{
    private $rules;
    protected $RegistrationRepository;

    public function __construct( RegistrationRepository $registration_repository )
    {
        $this->RegistrationRepository = $registration_repository;
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
        return $this->evaluate($candidates, $job->catg_position_id);
    }

    public function evaluate($candidates, $catg)
    {

        foreach ($candidates as $key => $candidate){
            if($candidate->work_exp_catg == $catg){
                $candidates[$key]->merge(['percentage' => 10]);
            }else{
                $candidates[$key]->merge(['percentage' => 5]);
            }
        }

        return $candidates->get();
    }

}
