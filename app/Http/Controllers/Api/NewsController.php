<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        return News::orderBy('published_at','desc')->get();
    }

    public function show($slug)
    {
        return News::where('slug',$slug)->firstOrFail();
    }
}
