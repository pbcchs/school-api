<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'full_name_bn',
        'father_name',
        'mother_name',
        'spouse_name',
        'marital_status',
        'religion',
        'gender',
        'date_of_birth',
        'nid_number',
        'birth_certificate',
        'photo',
        'mobile',
        'mobile_alt',
        'present_address',
        'permanent_address',
        'designation',
    ];
}
