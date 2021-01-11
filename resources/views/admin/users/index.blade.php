@extends('admin.layout')

@section('content')
    <!-- header-start -->
    @include('admin.header', ['page' => 'users'])
    <!-- header-end -->

    @if(count($users) == 0)
        <h2 class="text-center" style="margin-top: 100px">
            <i class="fa fa-search"></i>&nbsp; No user was found
        </h2>
    @else
        <div class="container mt-5">
            <ul class="list-group">
                @foreach($users as $user)
                    @include('admin.users.user', ['user' => $user, 'pay_plans' => $pay_plans, 'user_levels' => $user_levels])
                @endforeach
            </ul>
            {{$users->links()}}
        </div>
    @endif

@endsection

@section('jsimport')
    @parent
    <script src="/js/pages/admin.users.js"></script>
    <script src="/node_modules/handlebars/dist/handlebars.min.js"></script>
@endsection