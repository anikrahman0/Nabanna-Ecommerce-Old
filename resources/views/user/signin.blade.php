@extends('layouts.master')


@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="{{asset('login_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="{{asset('login_assets')}}/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="{{asset('login_assets')}}/css/styles.css">
</head>

<body>
    <div style="background-color:#F9E5E1;" class="login-clean">
        <form style="box-shadow:0px 0px 5px black;" method="post" action="{{route('user.signin')}}">
            @csrf
            <div>
                <p class="text-center" style="font-size: 20px;font-family: 'Open Sans', sans-serif;font-weight: bold;color:black;">Login</p>
                @if(Session::has('error'))
                <center>
                <p  style="font-size:14px;text-align:center;" class="text-danger ">{{ Session::get('error')}}</p>
                </center>
                @endif
            </div>
            <div class="form-group"><input class="form-control"  value="{{ old('email') }}" name="email" placeholder="Email" style="padding: 0px;" type="text"> <span style="font-size:14px;" class="text-danger">{{ $errors->first('email') }}</span></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" style="padding: 0px;"><span style="font-size:14px;" class="text-danger">{{ $errors->first('password') }}</span></div>
            <div class="form-group"><button class="btn btn-t btn-block" type="submit" style="background-color: rgb(11,11,11);">Log In</button></div><a class="forgot" href="{{route('user.signup')}}">Don't Have Account? Sign Up&nbsp;</a>
            
         </form>
    </div>

</body>

</html>

@endsection

