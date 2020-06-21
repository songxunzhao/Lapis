<li class="list-group-item">
    <div class="blog-avatar">
        <img src="{{ asset('storage/'.$blog->thumbnail_url) }}">
    </div>
    <div class="blog-content">
        <div class="blog-title">
            {{$blog->title}}
        </div>
        <div class="blog-detail mt-2">
            <span>Authored by {{$blog->user->name}}</span><br>
            <span>Created at {{$blog->created_at}}</span>
        </div>
        <div class="blog-description mt-1">
            {{$blog->description}}
        </div>
        <div class="blog-tag mt-1">
            {{$blog->tag->name}}
        </div>
        <div class="blog-actions">
            @if($blog->status == \App\Models\ContentStatus::DRAFT)
                <button data-action="publishBlog" data-url="{{route('admin/blogs/publish', ['id' => $blog->id])}}" data-id="{{$blog->id}}" class="btn btn-primary">
                    Publish
                </button>
            @endif
            <a href="{{route('admin/blogs/update', ['id' => $blog->id])}}" class="btn btn-success">
                <i class="fa fa-pencil"></i>
                &nbsp; Edit
            </a>
        </div>
    </div>
</li>