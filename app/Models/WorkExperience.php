<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $table = 'work_experiences';
    protected $fillable = [
        'person_id',
        'time',
        'position'
    ];
}
