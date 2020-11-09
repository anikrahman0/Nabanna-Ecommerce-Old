<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title><link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

<link rel="stylesheet" href="{{ asset('about_us/assets/fonts/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ asset('master_layout/bootstrap.min.css')}}">
<link href="{{ asset('master_layout/font-awesome.min.css')}}">@yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
            <a class="navbar-brand" href="{{ route('home')}}"><img src="/n_logo.png"></a>
                <a class="navbar-brand" href="{{ route('admin.home') }}">
                    {{ config('', '') }} {{ ucfirst(config('multiauth.prefix')) }}
                </a>
                <a class="navbar-brand" href="{{ route('getmessages')}}">Messages
                <a class="navbar-brand" href="{{ route('orderview')}}">OrderList

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.login')}}">{{ ucfirst(config('multiauth.prefix')) }} Login</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                    {{ auth('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @admin('super')
                                    <a class="dropdown-item" href="{{ route('admin.show') }}">{{ ucfirst(config('multiauth.prefix')) }}</a>
                                    <a class="dropdown-item" href="{{ route('admin.roles') }}">Roles</a>
                                @endadmin
                                    <a class="dropdown-item" href="{{ route('admin.password.change') }}">Change Password</a>
                                <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('master_layout/jquery-3.4.1.slim.min.js') }}"></script>
<script src="{{ asset('master_layout/bootstrap.min.js') }}"></script>
<script src=="{{ asset('master_layout/popper.min.js') }}"></script>  @yield('scripts')
</body>
</html>