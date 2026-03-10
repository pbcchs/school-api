<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use Illuminate\Support\Str;

class NoticeAdminController extends Controller
{
    public function store(Request $request)
    {
        $notice = Notice::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'description'=>$request->description,
            'published_at'=>now(),
            'created_by'=>auth()->id()
        ]);

        return response()->json($notice);
    }

    public function update(Request $request,$id)
    {
        $notice = Notice::findOrFail($id);

        $notice->update([
            'title'=>$request->title,
            'description'=>$request->description
        ]);

        return response()->json($notice);
    }

    public function destroy($id)
    {
        Notice::destroy($id);

        return response()->json(['message'=>'Deleted']);
    }
}
