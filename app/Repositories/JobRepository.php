<?php

namespace App\Repositories;

use App\Models\Job;

class JobRepository
{
    public function add( Array $job_data ) : Job
    {
        return Job::create($job_data);
    }
}