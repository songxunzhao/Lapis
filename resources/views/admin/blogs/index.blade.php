<?php
@extends('admin.layout')

@section('content')
    <!-- header-start -->
    @include('admin.header', ['page' => 'blogs'])
    <!-- header-end -->

    <div class="container mt-5">
        <ul class="list-group">
            @foreach($blogs as $blog)
                @include('admin.blogs.blog', ['blog' => $blog])
            @endforeach
        </ul>
        {{$blogs->links()}}
    </div>
@endsection