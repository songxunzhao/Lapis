@extends('admin.layout')

@section('content')
    <!-- header-start -->
    @include('admin.header', ['page' => 'users'])
    <!-- header-end -->


    <div class="container mt-5">
        <ul class="list-group">
            @foreach($users as $user)
                @include('admin.users.user', ['user' => $user, 'pay_plans' => $pay_plans, 'user_levels' => $user_levels])
            @endforeach
        </ul>
        {{$users->links()}}
    </div>
@endsection

@section('jsimport')
    @parent
    <script src="/js/pages/admin.users.js"></script>
    <script src="/node_modules/handlebars/dist/handlebars.min.js"></script>
@endsection