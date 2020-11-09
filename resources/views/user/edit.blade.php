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
<div class="col-lg-12">
<div class="card card-default">
<h6 class="card-header"><i class="fas fa-edit"></i> Edit Profile</h6>
<div class="card-body">


<form id="myForm" action="{{route('user.update',Auth::user()->id)}}" method="POST">
@csrf
<div class="form-group row">
<div class="col-md-6 mb-3 mb-md-0">
<label style="font-size:16px;font-weight:bold;" for="first-name">Full Name</label>
<input name="name" value="{{Auth::user()->name}}"  type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="first-name" placeholder="Enter Your Full Name">
<small class="form-text text-danger">{{ $errors->first('name') }}</small>
</div>
<div class="col-md-6">
<label style="font-size:16px;font-weight:bold;" for="email">Email Address</label>
<input readonly  name="email" value="{{Auth::user()->email}}" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}">
<small class="form-text text-danger">{{ $errors->first('email') }}</small>
</div>

</div>

<div class="form-group row">
<div class="col-md-6 mb-3 mb-md-0">
<label style="font-size:16px;font-weight:bold;" for="contact">Contact No.</label>
<input name="contact" value="{{Auth::user()->contact}}" type="text" class="form-control {{ $errors->has('contact') ? 'is-invalid' : ''}}" id="contact" placeholder="Contact No">
<small class="form-text text-danger">{{ $errors->first('contact') }}</small>
</div>

<div class="col-md-6">
<label style="font-size:16px;font-weight:bold;" for="gender">Gender</label>
<select  name="gender" class="form-control {{ $errors->has('gender') ? 'is-invalid' : ''}}">
<option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }} >Male</option>/u
<option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>


</select>
<small class="form-text text-danger">{{ $errors->first('gender') }}</small>
</div>
</div>

<div class="form-group row">
<div class="col-md-6 mb-3 mb-md-0">
<label style="font-size:16px;font-weight:bold;" for="address">Address</label>
<input name="address" value="{{Auth::user()->address}}" type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}" id="address" placeholder="Address">
<small class="form-text text-danger">{{ $errors->first('address') }}</small>
</div>

<div class="col-md-6">
<label style="font-size:16px;font-weight:bold;" for="city">City</label>
<select name="city" class="form-control {{ $errors->has('city') ? 'is-invalid' : ''}}">
<option style="font-weight:bold;" disabled  value="Choose City"  {{ Auth::user()->city == '' ? 'selected' : '' }}>Choose City</option>
<option value="dhaka" {{ Auth::user()->city == 'dhaka' ? 'selected' : '' }} >Dhaka</option>
<option value="chittagong" {{ Auth::user()->city == 'chittagong' ? 'selected' : '' }}>Chittagong</option>
<option value="rajshahi" {{ Auth::user()->city == 'rajshahi' ? 'selected' : '' }}>Rajshahi</option>
<option value="khulna" {{ Auth::user()->city == 'khulna' ? 'selected' : '' }}>Khulna</option>
<option value="sylhet" {{ Auth::user()->city == 'sylhet' ? 'selected' : '' }}>Sylhet</option>
<option value="barisal" {{ Auth::user()->city == 'barisal' ? 'selected' : '' }}>Barisal</option>
<option value="comilla" {{ Auth::user()->city == 'comilla' ? 'selected' : '' }}>Comilla</option>
<option value="rangpur" {{ Auth::user()->city == 'rangpur' ? 'selected' : '' }}>Rangpur</option>
</select>
<small class="form-text text-danger">{{ $errors->first('city') }}</small>
</div>
</div>


<div class="form-group row">
<div class="col-md-6">
<label style="font-size:16px;font-weight:bold;" for="date_of_birth">Date of Birth</label>
<input max="2002-01-01" min="1900-01-01"   name="date_of_birth" value="{{Auth::user()->date_of_birth}}" type="date" class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : ''}}">
<small class="form-text text-danger">{{ $errors->first('date_of_birth') }}</small>
</div>

<div class="col-md-6">
<label style="font-size:16px;font-weight:bold;" for="email"></label>
<div class="text-right">
<button id="link2" name="submit" type="submit" class="btn ">Save Changes</button>
</div>
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