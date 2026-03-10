<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryAdminController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('image')->store('gallery','public');

        $gallery = \App\Models\Gallery::create([
            'title'=>$request->title,
            'image'=>$image
        ]);

        return response()->json($gallery);
    }
}
