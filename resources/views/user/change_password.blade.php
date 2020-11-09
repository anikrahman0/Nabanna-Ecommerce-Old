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



<section style="margin-top:67px;"  class="py-lg-5">
<div class="container">
<div class="row">
<div class="col-lg-3">
</div>
<div class="col-lg-6">
<div class="card card-default">
<h6 class="card-header"><i class="fas fa-refresh"></i> Reset Password</h6>
<div class="card-body">


<form id="myForm" action="{{route('reset_password')}}" method="POST">
@csrf
<div class="form-group row">
<div class="col-md-12 mb-3 mb-md-0">
<label style="font-size:16px;font-weight:bold;" for="current_password">Current Password</label>
<input name="current_password"   type="password" class="form-control {{ $errors->has('current_password') ? 'is-invalid' : ''}} {{ Session::has('error') ? 'is-invalid' : ''}}" id="current_password" placeholder="Enter Current Password">
<small class="form-text text-danger">{{ $errors->first('current_password') }}</small>
<small class="form-text text-danger">{{ Session::get('error') }}</small>
</div>


</div>

<div class="form-group row">
<div class="col-md-12 mb-3 mb-md-0">
<label style="font-size:16px;font-weight:bold;" for="new_password">New Password</label>
<input name="new_password"  type="password" class="form-control {{ $errors->has('new_password') ? 'is-invalid' : ''}}" id="new_password" placeholder="Enter New Password">
<small class="form-text text-danger">{{ $errors->first('new_password') }}</small>
</div>

</div>



<div class="form-group row">
<div class="col-md-9 mb-3 mb-md-0">
<label style="font-size:16px;font-weight:bold;" for="confirm_new_password">Confirm New Password</label>
<input name="confirm_new_password"  type="password" class="form-control {{ $errors->has('confirm_new_password') ? 'is-invalid' : ''}}" id="contact" placeholder="Confirm New Password">
<small class="form-text text-danger">{{ $errors->first('confirm_new_password') }}</small>
</div>


<div class="col-md-3">
<label style="font-size:16px;font-weight:bold;" for="email"></label>
<div class="text-right">
<button id="link2" name="submit" type="submit" class="btn ">Reset</button>
</div>
</div>


<div class="col-md-12 mb-3 mb-md-0">
<input type="hidden" readonly name="email" value="{{Auth::user()->email}}" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="contact" placeholder="">
</div>

</div>



<div class="col-lg-3">
</div>

</div>

</div>
</form>
</div>
<!-- end .card -->



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