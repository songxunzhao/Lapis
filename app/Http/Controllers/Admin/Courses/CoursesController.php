<?php


namespace App\Http\Controllers\Admin\Courses;


use App\Http\Controllers\Controller;
use App\Models\Course;

class CoursesController extends Controller
{
    public function index() {
        $courses = Course::paginate(10);
        return view('admin.courses.index', ['courses' => $courses]);
    }
}