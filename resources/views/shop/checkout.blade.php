@extends('layouts.master')


@section('title')
Laravel Shopping Cart
@endsection

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
 margin-bottom:5px;
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




<nav style="margin-top:67px;" class="bg-dark" aria-label="breadcrumb">
<div class="container">

<ol style="font-size:17px;" class="breadcrumb bg-dark ">
<li style="color:white;"  class="breadcrumb-item "><a style="color:white;text-decoration:none;" href="{{route('home')}}">Home</a></li>
<li class="breadcrumb-item"><a style="color:white;text-decoration:none;" href="{{route('product.index')}}">Shop</a></li>
<li class="breadcrumb-item"><a style="color:white;text-decoration:none;" href="{{route('product.shoppingCart')}}">Cart</a></li>
<li  class="breadcrumb-item active" aria-current="page"><span style="color:#DAF7A6;text-shadow:0px 0px 2px #DAF7A6;">Checkout</span></li>

</ol>

</div>
</nav>

<section   class="py-lg-5">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="card card-default">
<h6 class="card-header"><i class="fas fa-map-marker-alt"></i> Billing Address</h6>
<div class="card-body">
<form id="myForm" action="{{route('checkout')}}" method="POST">
@csrf
<div class="form-group row">
<div class="col-md-12 mb-3 mb-md-0">
<label style="font-size:16px;font-weight:bold;" for="first-name">Full Name</label>
<input name="name" value="{{Auth::user()->name}}" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="first-name" placeholder="Enter Your Full Name">
<small class="form-text text-danger">{{ $errors->first('name') }}</small>
</div>

</div>

<div class="form-group row">
<div class="col-md-6 mb-3 mb-md-0">
<label style="font-size:16px;font-weight:bold;" for="address">Address</label>
<input name="address" type="text" value="{{Auth::user()->address}}" class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}" id="address" placeholder="Enter your address">
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
@if (Auth::check())
<div class="col-md-6">
<label style="font-size:16px;font-weight:bold;" for="email">Email Address</label>
<input readonly  name="email" value="{{Auth::user()->email}}" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}">
<small class="form-text text-danger">{{ $errors->first('email') }}</small>
</div>
@endif
<div class="col-md-6">
<label style="font-size:16px;font-weight:bold;" for="email">Contact No</label>
<input name="contact" value="{{Auth::user()->contact}}" type="text" class="form-control {{ $errors->has('contact') ? 'is-invalid' : ''}}" placeholder="Enter Contact No">
<small class="form-text text-danger">{{ $errors->first('contact') }}</small>
</div>
</div>

</div>
</div>
<!-- end .card -->

</div>
<div class="col-lg-4">
<div class="card card-default mb-3">
<h6 class="card-header">Order Summary</h6>
<div class="card-body px-2">
<p style="font-size:16px;" ></p>
<table class="table table-striped mt-4 mb-0">
<tbody>
<tr>
<th style="font-size:16px;" scope="row">Cart Subtotal</th>
<td style="font-size:16px;font-weight:bold;" class="text-right">&#x9f3; {{ $totalPrice }} </td>
</tr>
<tr>
<th style="font-size:16px;" scope="row">Discount</th>
<td style="font-size:16px;font-weight:bold;"  class="text-right">- &#x9f3; {{$total_d}}</td>
</tr>
<tr>
<th style="font-size:16px;" scope="row">Total with Discount</th>
<td style="font-size:16px;font-weight:bold;" class="text-right">&#x9f3; {{$n}}</td>
</tr>
<tr>
<th style="font-size:16px;" scope="row">Delivery Charge</th>
<td style="font-size:16px;font-weight:bold;" class="text-right">+ &#x9f3; {{$shipping}}</td>
</tr>
<tr>
<th style="font-size:16px;" scope="row">Order Total</th>
<td style="font-size:16px;" class="text-right">
<strong style="font-size:16px;font-weight:bold;" class="text-danger">&#x9f3; {{$total}}</strong>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- end .card -->
<div class="text-right">
<button id="link2" name="submit" type="submit" class="btn ">Submit Order</button>
</form>
</div>
</div>
</div>
</div>
</section>
<br>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script>
$('#myForm').submit(function() {
    var c = confirm("Submitted order cannot be cancled, Do you want to Confirm your order?");
    return c; //you can just return c because it will be true or false
});
</script>

</body>
</html>
 @endsection