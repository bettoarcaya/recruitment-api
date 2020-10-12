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
}
