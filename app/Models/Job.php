<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    protected $fillable = [
        'company_name',
        'catg_position_id',
        'experience_years',
        'position_type'
    ];

    public function catg_position()
    {
        return $this->hasOne('App\Models\WorkCategory');
    }
}
