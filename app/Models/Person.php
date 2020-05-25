<?php

namespace App\Models;

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
        $available = [];

        //WORKAROUND this logic should be in the sql query but i've had some troubles to implementing it
        // ---------------------------------------------------------------------------------------------
        foreach ($query->get() as $person){
            $sum = 0;

            foreach ($person->work_experiences as $work_exp){
                $sum += $work_exp->time;
            }

            if( $sum >= $years ){
                $available[] = $person->id;
            }
        }
        // -----------------------------------------------------------------------------------------------

        return $query->whereHas('work_experiences', function($q) use ($available){
            $q->whereIn('person_id', $available);
        });
    }

}
