<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkCategory extends Model
{
    protected $table = 'work_categories';
    protected $fillable = ['name'];
}
