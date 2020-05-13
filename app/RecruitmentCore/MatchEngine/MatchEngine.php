<?php

namespace App\RecruitmentCore\MatchEngine;

use App\Models\Job;
use App\Repositories\RegistrationRepository;

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

        return $candidates;
    }

}
