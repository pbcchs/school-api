<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherEmployment extends Model
{
    protected $fillable = [
        'teacher_id',
        'designation',
        'ntrca_number',
        'joining_date',
        'mpo_date',
        'pds_id',
        'index_number',
        'employment_type',
    ];
}
