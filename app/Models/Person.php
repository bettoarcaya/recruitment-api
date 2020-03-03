<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'People';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'gender',
        'born_date'
    ];
}
