<?php

namespace App\Repositories;

use App\Models\WorkType;
use App\Models\WorkCategory;

class DataRepository
{
    public function getSearchData()
    {
        $work_categories = WorkCategory::all();
        $work_type = WorkType::all();

        return compact(
            'work_categories', 
            'work_type'
        );
    }
}