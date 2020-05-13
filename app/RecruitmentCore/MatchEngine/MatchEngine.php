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
        return $this->RegistrationRepository->getByWorkCatg($rules);
    }

    public function engine(Collection $profiles) : CandidateCollection
    {
        return new CandidateCollection($profiles);
    }

}
