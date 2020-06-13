@extends('admin.layout')

@section('content')
    <!-- header-start -->
    <header>
        <div class="admin-header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="{{route('home')}}">
                                    <img src="/img/logo.png" alt="">
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
                                        <li><a href="{{route('admin/tags')}}">tags</a></li>
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
    <div class="admin-content-area">
        <div class="container">
            <div class="admin-page-title">
                <h2> Welcome to Dashboard! </h2>
            </div>

            <!-- header-end -->
            @isrole('ADMIN')
            <!-- Users -->
            <div class="card mt-5">
                <div class="card-header">
                    Total users: {{$free_user_count + $premium_user_count}}
                </div>
                <div class="card-body">
                    <ul>
                        <li>Free users: {{$free_user_count}}</li>
                        <li>Premium users: {{$premium_user_count}}</li>
                        <li>Admin users: {{$admin_count}}</li>
                        <li>Content inspectors: {{$content_inspector_count}}</li>
                        <li>Content editors: {{$content_editor_count}}</li>
                    </ul>
                </div>
            </div>
            @endisrole

            <div class="card mt-5">
                <div class="card-header">
                    Total Courses: {{$total_courses}}
                </div>
                <div class="card-body"></div>
            </div>

            <div class="card mt-5">
                <div class="card-header">
                    Total Blogs: {{$total_blogs}}
                </div>
                <div class="card-body"></div>
            </div>


            @isrole('ADMIN')
            <div class="card mt-5">
                <div class="card-header">Total Tags: {{$total_tags}}</div>
            </div>

            <div class="card mt-5">
                <div class="card-header">Total Payment: {{$total_payment}}</div>
                <div class="card-body"></div>
            </div>
            @endisrole
        </div>
    </div>

@endsection