<?php

namespace App\Repositories;

use App\Models\Job;

class JobRepository
{
    public function add( Array $job_data ) : Job
    {
        return Job::create($job_data[0]);
    }

    public function all()
    {
        return Job::all();
    }

    public function find( string $job_id)
    {
        return Job::findOrFail($job_id);
    }
}
