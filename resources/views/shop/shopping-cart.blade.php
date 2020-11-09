@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Nabanna Shopping Cart</title>
<!-- css: plugins -->
<style type="text/css">
#link1{
  background-color:#BDDF71;
  border:none;
  border-radius:4px;
  padding:9px;
  color:black;
   shadow:none;
}
#link1:hover{
  background-color:#FFC300;
  transition:1s all;
  
}

#link2{
 background-color:#BDDF71;
 border-radius:4px;
 shadow:none;
 border:none;
 color:black;
  padding:10px;
  margin-top:8px;
}
#link2:hover{
  color:black;
  background-color:#FFC300;
  transition:1s all;
}
</style>
</head>
@section('content')
  @if(Session::has('cart'))
<body style="background-color:#FF7C60;" >

<nav style="margin-top:67px;" class="bg-dark" aria-label="breadcrumb">
<div class="container">

<ol style="font-size:17px;" class="breadcrumb bg-dark ">
<li style="color:white;"  class="breadcrumb-item "><a style="color:white;text-decoration:none;" href="{{route('home')}}">Home</a></li>
<li class="breadcrumb-item"><a style="color:white;text-decoration:none;" href="{{route('product.index')}}">Shop</a></li>
<li  class="breadcrumb-item active" aria-current="page"><span style="color:#DAF7A6;text-shadow:0px 0px 2px #DAF7A6;">Cart</span></li>

</ol>

</div>
</nav>

<br><br>



<div>
<div class="container">
<div class="row">
<div class="col-md-12">
<img class="img-fluid" src="{{asset('images/discount wallpaper.png')}}">
</div>
</div>
</div>
</div>


<section class="py-lg-5">

<div class="container">
<div class="row">
<?php

$n=$totalPrice;
$td = $n-$total_d
?>
<div class="col-sm-6">
      @if($n >=1050 )
 <center>
 <div style="margin-top:15px;" class="form-group text-center">   
 <span style="background-color:black;border-radius:5px;text-shadow:0px 0px 5px #DAF7A6;padding:15px;color:#DAF7A6;font-size:17px;"  class="form-text "><i class="fa fa-trophy" aria-hidden="true"></i> Congrats! 15% Discount added to your purchased product</span>
 </div>
</center>
 @endif
    </div>

    <div class="col-sm">
    </div>

    <div class="col-sm-2">    
      @if(Session::has('success'))      
 <center>
 <div style="margin-top:15px;" class="form-group ">           
 <span style="background-color:black;border-radius:5px;text-shadow:0px 0px 5px #DAF7A6;padding:15px;color:#DAF7A6;font-size:17px;"  class="form-text ">{{Session::get('success')}}</span>
 </div>
</center>
 @endif

 @if(Session::has('success_rmv'))      
 <center>
 <div style="margin-top:15px;" class="form-group ">           
 <span style="background-color:black;border-radius:5px;text-shadow:0px 0px 5px #E67059;padding:15px;color: #E67059;font-size:17px;"  class="form-text ">{{Session::get('success_rmv')}}</span>
 </div>
</center>
 @endif
    </div>

  </div>
  </div>

<div class="container">
<div class="row">
<div class="col">
<div class="table-responsive">
<table style="border:none;" class="table table-striped border align-items-center table-layout-fixed">
<thead style="background-color:#BDDF71;border:none;">
<tr>
<th  class="d-none d-lg-table-cell text-center" scope="col" style="width: 150px;font-size:16px;font-weight:bold;">Product</th>
<th scope="col" style="width: 450px;font-size:16px;font-weight:bold;">Title</th>
<th scope="col" class="text-center" style="width: 80px;font-size:16px;font-weight:bold;">Price</th>
<th scope="col" class="text-center text-nowrap" style="width: 160px;font-size:16px;font-weight:bold;">Quantity</th>


</tr>
</thead>
 @foreach($products as $product)
<tbody >
<tr style="">
<td style="background-color:white;" class="d-none d-lg-table-cell text-center">
<div class="img-thumbnail rounded d-inline-block">
<img class="rounded" style="height: 100px" src="{{$product['item']['imagePath']}}">
</div>
</td>
<td style="background-color:white;">
<h6><a style="text-decoration:none;font-size:14px;color:black;" >{{$product['item']['title']}}</a></h6>
<span style="font-size:15px;color:grey;" class="" >{{$product['item']['description']}}</sapn>
</td>
<td style="font-size:15px;background-color:white;font-weight:bold;" class="text-center">&#x9f3;
<span style="font-size:15px;background-color:white;font-weight:bold;" > {{$product['price']}}</span>
</td>
<td style="font-size:15px;background-color:white;font-weight:bold;" class="text-center">
<a style="color:black;text-decoration:none;" href=" {{ route('product.remove', ['id'=> $product['item']['id']]) }} "><i title="delete all item" style="cursor:pointer;color:red;" class="fa fa-trash"></i></a>&nbsp;
<a style="color:black;text-decoration:none;" href="{{ route('product.reduceByOne', ['id'=> $product['item']['id']]) }}"><i title="reduce 1 item" style="cursor:pointer;font-weight:none;color:#DF6F56;" class="fa fa-minus-circle"></i></a> {{ $product['qty']}} <a style="color:black;text-decoration:none;color:#80A446;" href="{{ route('increase_qty', ['id'=> $product['item']['id']])}}"><i title="increase 1 item" style="cursor:pointer;" class="fa fa-plus-circle"></i></a>
</td>


</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>


<div class="row">
<div  class="col-md-8 ">
<div  class="">


</div>
<!-- end .card -->
</div>
<div class="col-md-4">
<div class="card card-default mb-0">
<h6 style="font-size:18px;" class="card-header">Order Summary</h6>
<div class="card-body">

@if($n >=1050 )
<p style="background-color:black;text-shadow:0px 0px 5px #DAF7A6;color:#DAF7A6;font-size:16px;text-align:center;padding:5px;;margin-top:-1px;">15% Discount Added</p>
@else
<p style="color:red;font-size:16px;text-shadow:0px 0px 5px red;margin-top:-5px;">No Discount Added</p>
@endif
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
<td style="font-size:16px;font-weight:bold;" class="text-right">&#x9f3; {{$td}}</td>
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

</div>
</div>


<div class="d-md-flex align-items-start mt-2 mb-4 mb-md-4">


<div class="form-group mb-0 mr-2">

</div>





<div class="d-flex d-md-block flex-column ml-md-auto">

<a id="link2" class="btn " href="{{ route('checkout')}}" role="button">Proceed to Checkout</a>
</div>
</div>

</div>
</section>
</div>
@else
 
  <div style="margin-bottom:155px;margin-top:155px;text-align:center;">
  <div class="container">
  <div  class="row text-center">
<div style="font-size:22px;" class="col-md-12 lead">
<p><i style="font-size:38px;" class="fas fa-cart-arrow-down"></i></p>
No item in Your Cart

</div>
</div>
</div>
</div>




</body>
</html>
@endif

@endsection