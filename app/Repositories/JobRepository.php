<?php

namespace App\Repositories;

use App\Models\Job;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class JobRepository
{
    public function add( Array $job_data ) : Job
    {
        return Job::create($job_data);
    }

    public function all() : LengthAwarePaginator
    {
        return Job::paginate(10);
    }

    public function find( string $job_id) : Job
    {
        return Job::findOrFail($job_id);
    }
}
