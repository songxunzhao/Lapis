@extends('admin.layout')

@section('content')
    <!-- header-start -->
    @include('admin.header', ['page' => 'blogs'])
    <!-- header-end -->

    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="blog-form" method="post" action="{{route('admin/blogs/create')}}" enctype="multipart/form-data">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="single-input">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="single-textarea"></textarea>
            </div>

            <div class="form-group mt-5">
                <label>Feature image</label>
                <div class="image-input-wrapper">
                    <input type="file" class="hidden-input" name="thumbnail_image" accept="image/*">
                    <img src="/img/blog/image-placeholder.jpg" id="feature-image">
                </div>
            </div>


            <div class="form-group mt-5">
                <label>Content</label>
                <div id="content-editor"></div>
                <input type="hidden" name="content">
            </div>

            <div class="form-group mt-5">
                <label>Tag</label>
                <select name="tag_id">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-5">
                <div class="primary-checkbox d-inline-block">
                    <input type="checkbox" name="is_premium" id="is_premium">
                    <label for="is_premium"></label>
                </div>
                <span>Is premium content?</span>

            </div>

            <div class="form-group">
                <button class="btn btn-primary">
                    <i class="fa fa-save"></i> &nbsp;Save
                </button>
            </div>

            {{ csrf_field() }}
        </form>
    </div>
@endsection

@section('jsimport')
    @parent
    <script src="/js/vendor/ckeditor5-build-classic/ckeditor.js"></script>
    <script src="/js/pages/admin.blogs.create.js"></script>
    <script>

    </script>
@endsection