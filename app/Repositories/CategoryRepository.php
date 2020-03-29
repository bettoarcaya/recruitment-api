<?php

namespace App\Repositories;

use App\Models\WorkCategory;

class CategoryRepository
{
    public function getAll() : Collection
    {
        return WorkCategory::all();
    }
}