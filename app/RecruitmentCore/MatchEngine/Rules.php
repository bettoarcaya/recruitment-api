<?php

namespace App\RecruitmentCore\MatchEngine;

Abstract Class Rules
{
    const POSITIONS = [
        '1' => ['1' , '3'],
        '2' => ['2' , '3'],
        '3' => ['3']
    ];
    const LEVELS = [
        'catg_position_id' => 50,
        'experience_years' => 40,
        'address' => 50
    ];
}