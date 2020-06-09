<?php


namespace App\Http\Controllers\Admin\Blogs;


use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function index() {
        $blogs = Blog::paginate(10);
        return view('admin.blogs.index', ['blogs' => $blogs]);
    }
}