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
        session()->put('job', $job);
        $rules = $this->rules[$job->catg_position_id];
        $candidates = $this->RegistrationRepository->getByWorkCatg($rules);
        
        return new PersonCollection($candidates->paginate(10));
    }

    public function evaluate( $candidate )
    {
        $job = session()->get('job');
        return ( $candidate->work_exp_catg == $job->catg_position_id ) ? 100 : 50;
    }

}
