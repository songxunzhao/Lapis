<li>
    <div class="blog-avatar">
        <img src="{{$blog->thumbail_url}}">
    </div>
    <div class="blog-content">
        <div class="blog-title">
            {{$blog->name}}
        </div>
        <div class="blog-detail">
            <span>Created by {{$blog->user->name}}</span><br>
            <span>Published at {{$blog->created_at}}</span>
        </div>
        <div class="blog-description">
            {{$blog->description}}
        </div>
    </div>
</li>