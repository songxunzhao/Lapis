@extends('admin.layout')

@section('content')
    <!-- header-start -->
    @include('admin.header', ['page' => 'blogs'])
    <!-- header-end -->

    <div class="container mt-5">
        <form class="blog-form" method="POST" action="{{route('admin/blogs/create')}}">
            <h4>Title:</h4>
            <div class="">
                <input type="text" name="title" class="single-input">
            </div>

            <h4>Feature image:</h4>
            <div class="image-input-wrapper">
                <input type="file" class="" name="thumbnail_image">
                <img src="/img/blog/image-placeholder.jpg" id="feature-image">
            </div>

            <h4>Content: </h4>
            <div id="content-editor">

            </div>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i> &nbsp;Save
            </button>
            {{ csrf_field() }}
        </form>
    </div>
@endsection

@section('jsimport')
    <script src="/js/vendor/ckeditor5-build-classic/ckeditor.js"></script>
    <script src="/js/pages/admin.blogs.create.js"></script>
    <script>
        ClassicEditor
        .create(document.querySelector('#content-editor'))
        .then(function (editor) {
            window.editor = editor;
        })
        .catch(function (err) {

        })
    </script>
@endsection