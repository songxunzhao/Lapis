@extends('admin.layout')

@section('content')
    <!-- header-start -->
    @include('admin.header', ['page' => 'blogs'])
    <!-- header-end -->

    <div class="container mt-5">
        @if(count($blogs) == 0)
            <h2 class="text-center" style="margin-top: 100px">
                <i class="fa fa-search"></i>&nbsp; No blog was found <br>
                <a href="{{route('admin/blogs/create')}}" class="btn btn-primary mt-4">
                    <i class="fa fa-plus"></i>&nbsp; Add New
                </a>
            </h2>
        @else
        <div class="list-actions">
            <a href="{{route('admin/blogs/create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i>Add New
            </a>
        </div>
        <ul class="list-group mt-2">
            @foreach($blogs as $blog)
                @include('admin.blogs.blog', ['blog' => $blog])
            @endforeach
        </ul>
        {{$blogs->links()}}
        @endif
    </div>
@endsection

@section('jsimport')
    @parent
    <script src="/js/pages/admin.blogs.js"></script>

@endsection