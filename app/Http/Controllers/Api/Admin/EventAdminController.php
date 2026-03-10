<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Str;

class EventAdminController extends Controller
{
    public function store(Request $request)
    {
        $image = null;

        if($request->hasFile('image')){
            $image = $request->file('image')->store('events','public');
        }

        $event = Event::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'image'=>$image,
            'event_date'=>$request->event_date,
            'description'=>$request->description,
            'created_by'=>auth()->id()
        ]);

        return response()->json($event);
    }

    public function destroy($id)
    {
        Event::destroy($id);

        return response()->json(['message'=>'deleted']);
    }
}
