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
        'position'
    ];

    public function time()
    {
        $start = Carbon::parse( $this->start );
        $end = Carbon::parse( $this->end );

        return $end - $start;
    }
}
