<?php

namespace App\Http\Controllers\API;

use App\Course;
use App\CourseRegister;
use App\Exports\CoursesExport;
use App\Http\Controllers\Controller;
use Excel;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }

    public function index()
    {
        return response()->json(Course::all());
    }

    public function create(Request $request)
    {
        $id = $request->id;
        $course = Course::find($id);

        $checkIfUserHaveCourse = CourseRegister::where('course_id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($checkIfUserHaveCourse == null) {
            $createdCourse = $course->course_registers()->create([
                'user_id' => auth()->id(),
            ]);

            return response()->json($course->find($createdCourse->course_id));
        }

        return response()->json('course already registered');

    }

    public function export()
    {
        return Excel::download(new CoursesExport, 'courses.xlsx');
    }
}
