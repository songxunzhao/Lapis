<?php


namespace App\Http\Controllers\Admin\Tags;


use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\UserLevel;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:' . UserLevel::ADMIN);
    }

    public function index() {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', ['tags' => $tags]);
    }

}