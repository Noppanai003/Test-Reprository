<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'Carcare') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            background-color:#00FFFF;
        }
    </style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('', 'Carcare') }} -->
                    <img class="logo-light" src="{{asset('img/logo2.png')}}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <!-- เช็คบุคคลทั่วไป -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('สมัครสมาชิก') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('ออกจากระบบ') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content เมื่อ login เสร็จแล้ว-->
        <main class="py-4">
            @auth
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                    <div class="card-header"><b> welcome : </b> {{ Auth::user()->name }} </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('dashboard.index')}}">แดชบอร์ด</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('manageUser.index')}}">จัดการข้อมูลสมาชิก</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('categoryStore.index')}}">ประเภทร้าน</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('categories.index')}}">ประเภทการซ่อม</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('tags.index')}}">Tags</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.index')}}">จัดการข้อมูลร้าน</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('manageRequests.index')}}">จัดการคำขอบริการ</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('manageAssessment.index')}}">จัดการข้อมูลประเมินการใช้บริการ</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('promotions.index')}}">จัดการข้อมูลโปรโมชัน</a>
                            </li>

                        </ul>

                    </div>
                    <div class="col-md-9">

                        @if(Session()->has('success'))
                            <div class="alert alert-success">
                                {{Session()->get('success')}}
                            </div>
                        @endif
                        @if(Session()->has('error'))
                            <div class="alert alert-danger">
                                {{Session()->get('error')}}
                            </div>
                        @endif
                        @yield('content')

                    </div>
                </div>
            </div>
            @else
                @yield('content')
            @endauth
        </main>
    </div>
</body>

</html>
