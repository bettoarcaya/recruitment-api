<?php

namespace App\RecruitmentCore\MatchEngine;

class MatchEngine
{
    private $rules;
    
    public function __construct(Array $rules)
    {
        $this->rules = $rules;
    }

    public function match()
    {

    }
}