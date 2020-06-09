@extends('admin.layout')

@section('content')
    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="{{route('home')}}">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{route('admin/dashboard')}}">dashboard</a></li>

                                        <li><a href="{{route('admin/courses')}}">courses</a></li>
                                        <li><a href="{{route('admin/blogs')}}">blogs</a></li>
                                        <li><a href="{{route('admin/tags')}}}">tags</a></li>
                                        <li><a href="{{route('admin/transactions')}}">transactions</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
    @isrole('ADMIN')
    <!-- Users -->
    <ul>
        <li><h3>Total users: {{$free_user_count + $premium_user_count}}</h3></li>
        <li>Free users: {{$free_user_count}}</li>
        <li>Premium users: {{$premium_user_count}}</li>
        <li>Admin users: {{$admin_count}}</li>
        <li>Content inspectors: {{$content_inspector_count}}</li>
        <li>Content editors: {{$content_editor_count}}</li>
    </ul>
    @endisrole

    <ul>
        <li><h3>Total Courses: {{$total_courses}}</h3></li>
    </ul>

    <ul>
        <li><h3>Total Blogs: {{$total_blogs}}</h3></li>
    </ul>

    @isrole('ADMIN')
    <ul>
        <li><h3>Total Tags: {{$total_tags}}</h3></li>
    </ul>

    <ul>
        <li><h3>Total Payment: {{$total_payment}}</h3></li>
    </ul>
    @endisrole
@endsection