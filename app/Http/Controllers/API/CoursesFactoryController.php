<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\CourseFactory;

class CoursesFactoryController extends Controller
{
    public function index()
    {
        $factoryCourses = new CourseFactory();
        dispatch($factoryCourses);
        return 'course factory generator dispatched';
    }
}
