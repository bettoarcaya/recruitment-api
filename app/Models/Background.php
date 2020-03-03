<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    protected $table = 'backgrounds';
    protected $fillable = [
        'person_id',
        'academic_level',
        'academic_espec'
    ];
}
