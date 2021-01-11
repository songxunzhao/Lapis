<?php


namespace App\Http\Controllers\Admin\Courses;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\UserLevel;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager');
    }

    public function index() {

        $user = Auth::user();

        $courses = [];
        if($user->user_level == UserLevel::ADMIN) {
            $courses = Course::paginate(10);
        } else if($user->user_level == UserLevel::CONTENT_EDITOR ||
            $user->user_level == UserLevel::CONTENT_INSPECTOR)
        {
            $tag_ids = array_map(function ($tag_user) {
                return $tag_user->tag_id;
            }, $user->tag_users);

            $courses = Course::whereIn("tag", $tag_ids)->paginate(10);
        }

        return view('admin.courses.index', ['courses' => $courses]);
    }
}