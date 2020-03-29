<?php

namespace App\Repositories;

use App\Models\WorkCategory;
use Illuminate\Support\Collection;

class CategoryRepository
{
    public function getAll() : Collection
    {
        return WorkCategory::all();
    }
}