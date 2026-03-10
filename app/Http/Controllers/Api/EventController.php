<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return Event::orderBy('event_date','desc')->get();
    }

    public function show($slug)
    {
        return Event::where('slug',$slug)->firstOrFail();
    }
}
