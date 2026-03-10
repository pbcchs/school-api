<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'pdf_file',
        'published_at',
        'created_by'
    ];
}
