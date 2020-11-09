<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
 

       <link href="{{ asset('master_layout/font-awesome.min.css')}}">
    @yield('styles')
</head>
<body style="background-color:#F9E5E1;">

@include('partials.header')



@if(Request::is('product'))
<div><hr></div>
@endif
@if(Request::is('user/signin'))
<div><hr></div>
@endif



@if(Request::is('user/signup'))
<div><hr></div>
@endif


    @yield('content')

@include('partials.footer')

@yield('scripts')
</body>
</html>