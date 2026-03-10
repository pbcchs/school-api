<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherEmployment;

class TeacherEmploymentController extends Controller
{
    public function store(Request $request)
    {
        $teacher = $request->user()->teacher;

        $employment = TeacherEmployment::create([
            'teacher_id' => $teacher->id,
            'designation' => $request->designation,
            'joining_date' => $request->joining_date,
            'employment_type' => $request->employment_type
        ]);

        return response()->json($employment);
    }

    public function destroy($id)
    {
        TeacherEmployment::destroy($id);

        return response()->json(['message'=>'Deleted']);
    }
}
