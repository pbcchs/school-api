<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherAcademic;

class TeacherAcademicController extends Controller
{
    public function store(Request $request)
    {
        $teacher = $request->user()->teacher;

        $academic = TeacherAcademic::create([
            'teacher_id' => $teacher->id,
            'degree' => $request->degree,
            'university' => $request->university,
            'subject' => $request->subject,
            'passing_year' => $request->passing_year,
            'result' => $request->result
        ]);

        return response()->json($academic);
    }

    public function destroy($id)
    {
        TeacherAcademic::destroy($id);

        return response()->json(['message'=>'Deleted']);
    }
}
