<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'gender',
        'mother_name',
        'father_name',
        'health_info',
    ];
}
