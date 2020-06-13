<?php


namespace App\Http\Controllers\Admin\Blogs;


use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContentStatus;
use App\Models\Course;
use App\Models\UserLevel;
use Illuminate\Http\Request;
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

    public function create(Request $request) {
        $validated_data = $request->validate([
            'name'=> 'required',
            'description' => 'nullable',
            'thumbnail_url' => 'required',
            'content_path' => 'required',
            'is_premium' => 'boolean|required',
            'status' => ContentStatus::DRAFT
        ]);
        $blog = Blog::create($validated_data);
        return $blog->toArray();
    }

    public function update(Request $request, $id) {
        $validated_data = $request->validate([
            'name'=> 'required',
            'description' => 'nullable',
            'thumbnail_url' => 'required',
            'content_path' => 'required',
            'is_premium' => 'boolean|required',
            'status' => ContentStatus::DRAFT
        ]);
        $blog = Blog::where('id', $id)->update($validated_data);
        return $blog->toArray();
    }

    public function __construct()
    {
        $this->middleware('manager');
    }
}