<?php


namespace App\Http\Controllers\Admin\Tags;


use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\UserLevel;
use Illuminate\Http\Request;

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

    public function create(Request $request) {
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $tag = Tag::create($validated_data);
        return $tag->toArray();
    }

    public function update(Request $request, $id) {
        $validated_data = $request->validate([
            'is_active' => 'boolean|required'
        ]);

        $tag = Tag::where('id', $id)->update($validated_data);
        return $tag->toArray();
    }
}