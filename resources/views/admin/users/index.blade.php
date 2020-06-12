<?php
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
                                        <li><a href="{{route('admin/dashboard')}}">users</a></li>
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


    <div class="container">
        @foreach($users as $user)
            <div class="user-info-container @if ($user->is_active === false) user-info-red @endif">
                <div class="user-info-name">
                    {{$user->name}}
                </div>
                <div class="user-info-email">
                    {{$user->email}}
                </div>
                <div class="user-info-role">
                    <span class="role-badge-{{$user->user_plan}}">{{$user->user_plan}}</span>
                    <span class="level-badge-{{$user->user_level}}">{{$user->user_level}}</span>
                </div>
                <div class="user-info-date">
                    Member from {{$user->created_at}}
                </div>

                @if ($user->is_active === false)
                    <div class="user-actions">
                        <a class="btn btn-primary" href="{{route('admin/users/activate', ['id' => $user->id]) . '?active=1&from=' . url()->full()}}">Activate</a>
                    </div>
                @else
                    <div class="user-actions">
                        <a class="btn btn-danger" href="{{route('admin/users/activate', ['id' => $user->id]) . '?active=0&from=' . url()->full()}}">Disable</a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection