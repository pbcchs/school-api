<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function index()
    {
        return Notice::orderBy('published_at','desc')->get();
    }

    public function show($slug)
    {
        return Notice::where('slug',$slug)->firstOrFail();
    }
}
