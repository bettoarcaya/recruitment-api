<?php

namespace App\Repositories;

use App\Models\Job;
use Illuminate\Support\Collection;

class JobRepository
{
    public function add( Array $job_data ) : Job
    {
        return Job::create($job_data[0]);
    }

    public function all() : Collection
    {
        return Job::all();
    }

    public function find( string $job_id) : Job
    {
        return Job::findOrFail($job_id);
    }
}
