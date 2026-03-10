<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsAdminController extends Controller
{
    public function store(Request $request)
    {
        $image = null;

        if($request->hasFile('thumbnail')){
            $image = $request->file('thumbnail')->store('news','public');
        }

        $news = News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'thumbnail' => $image,
            'content' => $request->content,
            'published_at' => now(),
            'created_by' => auth()->id()
        ]);

        return response()->json($news);
    }

    public function destroy($id)
    {
        News::destroy($id);

        return response()->json(['message'=>'deleted']);
    }
}
