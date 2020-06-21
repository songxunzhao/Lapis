<?php


namespace App\Http\Controllers\Admin\Blogs;


use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContentStatus;
use App\Models\Course;
use App\Models\Image;
use App\Models\Tag;
use App\Models\UserLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        $user = Auth::user();

        if(!$request->isMethod('post')) {

            if($user->user_level == UserLevel::ADMIN) {
                $tags = Tag::all();
            } else if($user->user_level == UserLevel::CONTENT_EDITOR ||
                $user->user_level == UserLevel::CONTENT_INSPECTOR)
            {
                $tags = $user->tags();
            } else {
                $tags = [];
            }

            return view('admin.blogs.create', ['tags' => $tags]);
        } else {
            $validated_data = $request->validate([
                'title'=> 'required',
                'description' => 'nullable',
                'thumbnail_image' => 'required|file|image',
                'content' => 'required',
                'tag_id' => 'required',
                'is_premium' => 'boolean|nullable'
            ]);
            $validated_data['status'] = ContentStatus::DRAFT;

            // Save thumbnail image
            $thumbnail_file = $request->file('thumbnail_image');
            $image_name = $thumbnail_file->getFilename();
            $image_path = ltrim(
                $thumbnail_file->storeAs('public/feature_image', Str::random(9)),
                'public/'
            );
            $image = Image::create([
                'name' => $image_name,
                'path' => $image_path
            ]);
            $validated_data['thumbnail_url'] = $image_path;

            $validated_data['is_premium'] = $validated_data['is_premium'] ?? false;
            $validated_data['user_id'] = $user->id;

            Blog::create($validated_data);

            return redirect(route('admin/blogs'));
        }
    }

    public function update(Request $request, $id) {
        $user = Auth::user();

        if(!$request->isMethod('post')) {

            if($user->user_level == UserLevel::ADMIN) {
                $tags = Tag::all();
            } else if($user->user_level == UserLevel::CONTENT_EDITOR ||
                $user->user_level == UserLevel::CONTENT_INSPECTOR)
            {
                $tags = $user->tags();
            } else {
                $tags = [];
            }

            $blog = Blog::find($id);
            return view('admin.blogs.update', ['blog' => $blog, 'tags' => $tags]);
        } else {
            $validated_data = $request->validate([
                'title'=> 'required',
                'description' => 'nullable',
                'thumbnail_image' => 'file|image',
                'content' => 'required',
                'tag_id' => 'required',
                'is_premium' => 'boolean|nullable'
            ]);
            $validated_data['status'] = ContentStatus::DRAFT;

            // Save thumbnail image if uploaded
            $thumbnail_file = $request->file('thumbnail_image');
            if($thumbnail_file->isValid()) {
                $image_name = $thumbnail_file->getFilename();
                $image_path = ltrim(
                    $thumbnail_file->storeAs('public/feature_image', Str::random(9)),
                    'public/'
                );
                $image = Image::create([
                    'name' => $image_name,
                    'path' => $image_path
                ]);
                $validated_data['thumbnail_url'] = $image_path;
            }

            $validated_data['is_premium'] = $validated_data['is_premium'] ?? false;

            Blog::where('id', $id)->update($validated_data);

            return redirect(route('admin/blogs'));
        }
    }

    public function publish(Request $request, $id) {
        $blog = Blog::find($id);
        $blog->status = ContentStatus::PUBLISHED;
        $blog->save();
        return view('admin.blogs.blog', ['blog' => $blog]);
    }

    public function __construct()
    {
        $this->middleware('manager');
    }
}