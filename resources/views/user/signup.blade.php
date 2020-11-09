@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title></title>
<!-- css: plugins -->
<link rel="stylesheet" href="{{asset('checkout_assets')}}/plugins/bootstrap-select/css/bootstrap-select.min.css">
<!-- css: theme -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<style type="text/css">

#link2{
 background-color:#BDDF71;
 border-radius:4px;
 shadow:none;
margin-top:5px;
 border:none;
 color:black;
  padding:10px;
}
#link2:hover{
  color:black;
  background-color:#FFC300;
  transition:1s all;
}


</style>
</head>
<body >




<section style="margin-top:50px;"  class="py-lg-5">
<div class="container">
<div class="row">
    <div class="col-sm">    
    </div>
    <div class="col-sm">
      @if(Session::has('success'))      
 <center>
 <div style="" class="form-group text-center">           
 <span style="background-color:black;border-radius:5px;text-shadow:0px 0px 5px #DAF7A6;padding:15px;color:#DAF7A6;font-size:17px;"  class="form-text ">{{Session::get('success')}}</span>
 </div>
</center>
 @endif
    </div>
    <div class="col-sm">
      
    </div>
  </div>
  </div>
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="card card-default">
<h6 class="card-header"><i class="fas fa-plus-circle"></i> Create New Account</h6>
<div class="card-body">
<form  action="{{route('user.signup')}}" method="POST">
@csrf
<div class="form-group row">
<div class="col-md-6 mb-3 mb-md-0">
<label style="font-size:16px;font-weight:bold;" for="first-name">Full Name</label>
<input name="name" type="text" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="first-name" placeholder="Enter your full name">
<small class="form-text text-danger">{{ $errors->first('name') }}</small>
</div>
<div class="col-md-6">
<label style="font-size:16px;font-weight:bold;" for="email">Email Address</label>
<input   name="email" value="{{ old('email') }}" placeholder="Enter valid email address" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}">
<small class="form-text text-danger">{{ $errors->first('email') }}</small>
</div>


</div>

<div class="form-group row">
<div class="col-md-6 mb-3 mb-md-0">
<label style="font-size:16px;font-weight:bold;" for="contact">Contact No.</label>
<input name="contact" value="{{ old('contact') }}" type="text" class="form-control {{ $errors->has('contact') ? 'is-invalid' : ''}}" id="contact" placeholder="Enter valid contact no ">
<small class="form-text text-danger">{{ $errors->first('contact') }}</small>
</div>

<div class="col-md-6">
<label style="font-size:16px;font-weight:bold;" for="gender">Gender</label>
<select name="gender" class="form-control {{ $errors->has('gender') ? 'is-invalid' : ''}}">
<option style="font-weight:bold;" disabled   selected>Choose your gender</option>
<option value="male">Male</option>
<option value="female">Female</option>

</select>
<small class="form-text text-danger">{{ $errors->first('gender') }}</small>
</div>
</div>

<div class="form-group row">
<div class="col-md-6 mb-3 mb-md-0">
<label style="font-size:16px;font-weight:bold;" for="first-name">Password</label>
<input name="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="first-name" placeholder="Enter strong password ">
<small class="form-text text-danger">{{ $errors->first('password') }}</small>
</div>
<div class="col-md-6">
<label style="font-size:16px;font-weight:bold;" for="email">Confirm Password</label>
<input   name="confirm_password" value="" placeholder="Confirm your password" type="password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : ''}}">
<small class="form-text text-danger">{{ $errors->first('confirm_password') }}</small>
</div>

</div>


<div class="form-group row">


<div class="col-md-6">
<label style="font-size:16px;font-weight:bold;"  for="date_of_birth">Date of Birth</label>
<input   name="date_of_birth" value="{{ old('date_of_birth') }}" max="2002-01-01" min="1900-01-01" value="" type="date" class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : ''}}">
<small class="form-text text-danger">{{ $errors->first('date_of_birth') }}</small>
</div>
<input type="hidden" name="address" >
<input type="hidden" name="city" >

<div class="col-md-6">
<label style="font-size:16px;font-weight:bold;" for="email"></label>
<div class="text-right">
<button id="link2" name="submit" type="submit" class="btn ">Create Account</button>
</div>
</div>
</div>

</div>
</div>
<!-- end .card -->
</form>


</div>


<!-- end .card -->

</div>
</div>
</div>
</section>
<br>

</body>
</html>
@endsection