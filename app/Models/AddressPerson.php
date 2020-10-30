<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressPerson extends Model
{
    protected $table = 'address_people';
    protected $fillable = [
        'country',
        'state',
        'city'
    ];

    public function setCountryAttribute($value)
    {
        $this->attributes['country'] = strtolower($value);
    }

    public function setStateAtribute($value)
    {
        $this->attributes['state'] = strtolower($value);
    }

    public function setCityAttribute($value)
    {
        $this->attributes['city'] = strtolower($value);
    }
}
