<?php

namespace App\RecruitmentCore\MatchEngine;

use App\Http\Resources\MatchCollection;
use App\Http\Resources\PersonCollection;
use App\Models\Job;
use App\Models\Person;
use App\Repositories\RegistrationRepository;
use App\RecruitmentCore\MatchEngine\Rules;

class MatchEngine extends Rules
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

    public function match(Job $job) : MatchCollection
    {
        session()->put('job', $job);
        $rules = $this->rules[$job->catg_position_id];
        $candidates = $this->RegistrationRepository->getByWorkCatg($rules);

        return new MatchCollection($candidates->paginate(10));
    }

    public function search(array $request) : MatchCollection
    {
        session()->put('job', $request);
        $data = [
            'position' => self::POSITIONS[$request['catg_position_id']],
            'experience_years' => $request['experience_years'],
            'work_type' => $request['work_type_available']
        ];
        $candidates = $this->RegistrationRepository->getCandidates($data);

        return new SearchCandidatesCollection($candidates->paginate(10));
    }

    public function evaluate( Person $candidate ) : int
    {
        $job = session()->get('job');
        $result = 0;
        $sum = 0;

        foreach ($candidate->work_experiences as $work_experience){
            $sum += $work_experience->time;
        }

        $result += ( $candidate->work_exp_catg == $job->catg_position_id ) ? 50 : 25;
        $result += ( $sum / $job->experience_years ) * 10;

        return ($result > 100) ? 100 : $result;
    }

    public function evaluateSearch( Person $candidate ): int
    {
        $job = session()->get('job');
        $result = 0;
        $sum = 0;

        foreach ($candidate->work_experiences as $work_experience){
            $sum += $work_experience->time;
        }
    }

}
