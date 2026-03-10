<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'content',
        'published_at',
        'created_by'
    ];
}
