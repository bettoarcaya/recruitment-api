<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class Person extends Model
{
    protected $table = 'people';
    protected $with = ['backgrounds', 'work_experiences'];
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'gender',
        'born_date',
        'work_exp_catg'
    ];

    public function backgrounds()
    {
        return $this->hasMany('App\Models\Background');
    }

    public function work_experiences()
    {
        return $this->hasMany('App\Models\WorkExperience');
    }

    public function scopeWorkCategory($query, $rules)
    {
        return $query->whereHas('backgrounds', function($q) use($rules) {
            $q->whereIn('work_exp_catg', $rules);
        });
    }

    public function scopeWhereExperience($query)
    {
        $years = session()->get('job')->experience_years;

        return $query->whereHas('work_experiences', function($q) use ($years){
            $q->where(function ($query) {
                $query->sum('time');
            }, '>=', $years);
        });
    }

}
