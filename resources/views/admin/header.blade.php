<header>
    <div class="admin-header-area">
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
                                    <li><a @if($page == 'dashboard') class="active" @endif href="{{route('admin/dashboard')}}">dashboard</a></li>
                                    <li><a @if($page == 'users') class="active" @endif href="{{route('admin/users')}}">users</a></li>
                                    <li><a @if($page == 'courses') class="active" @endif href="{{route('admin/courses')}}">courses</a></li>
                                    <li><a @if($page == 'blogs') class="active" @endif href="{{route('admin/blogs')}}">blogs</a></li>
                                    <li><a @if($page == 'tags') class="active" @endif href="{{route('admin/tags')}}}">tags</a></li>
                                    <li><a @if($page == 'transactions') class="active" @endif href="{{route('admin/transactions')}}">transactions</a></li>
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