<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAcademic extends Model
{
    protected $fillable = [
        'teacher_id',
        'degree',
        'university',
        'subject',
        'session',
        'passing_year',
        'duration',
        'result',
    ];
}
