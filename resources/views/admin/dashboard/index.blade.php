@extends('admin.layout')

@section('content')
    <!-- header-start -->
    @include('admin.header', ['page' => 'dashboard'])
    <!-- header-end -->

    <div class="admin-content-area">
        <div class="container">
            <div class="admin-page-title">
                <h2> Welcome to Dashboard! </h2>
            </div>

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