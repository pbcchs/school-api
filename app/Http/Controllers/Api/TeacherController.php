<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return Teacher::latest()->get();
    }

    public function show($id)
    {
        return Teacher::findOrFail($id);
    }

    public function profile(Request $request)
    {
        return $request->user()->teacher;
    }

    public function updateProfile(Request $request)
    {
        $teacher = $request->user()->teacher;

        $teacher->update([
            'full_name' => $request->full_name,
            'mobile' => $request->mobile,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address
        ]);

        return response()->json($teacher);
    }
}
