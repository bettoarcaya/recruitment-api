<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';
    protected $with = ['backgrounds', 'work_experiences'];
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'gender',
        'born_date'
    ];

    public function backgrounds()
    {
        return $this->hasMany('App\Models\Background');
    }

    public function work_experiences()
    {
        return $this->hasMany('App\Models\WorkExperience');
    }
}
