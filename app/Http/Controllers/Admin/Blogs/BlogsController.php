<?php


namespace App\Http\Controllers\Admin\Blogs;


use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use App\Models\UserLevel;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    public function index() {
        $user = Auth::user();

        $blogs = [];
        if($user->user_level == UserLevel::ADMIN) {
            $blogs = Blog::paginate(10);
        } else if($user->user_level == UserLevel::CONTENT_EDITOR ||
            $user->user_level == UserLevel::CONTENT_INSPECTOR)
        {
            $tag_ids = array_map(function ($tag_user) {
                return $tag_user->tag_id;
            }, $user->tag_users);

            $blogs = Blog::whereIn("tag", $tag_ids)->paginate(10);
        }
        return view('admin.blogs.index', ['blogs' => $blogs]);
    }

    public function create() {
        $blog = new Blog();
        $blog->save();
    }

    public function __construct()
    {
        $this->middleware('manager');
    }
}