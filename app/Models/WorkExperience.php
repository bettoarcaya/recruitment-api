<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $table = 'work_experiences';
    protected $fillable = [
        'person_id',
        'start',
        'end',
        'position',
        'time'
    ];
}
