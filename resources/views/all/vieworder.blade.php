@extends('layouts.masteradmin')

@section('content')
<br>
<h1 class='text-center'>Order list</h1><br>
@if(session('order'))

<div style='width:300px;background-color:#212021;color:#DAF7A6;box-shadow:0px 0px 7px #DAF7A6;text-shadow:0px 0px 7px #DAF7A6;' class='alert lead' >

{{session('order')}}
</div>
@endif
@if(count($order) > 0)
  @foreach($order as $message )
   <ul class='list-group text-center'>
      <li style='color:white;background-color:#DF4054;'class='list-group-item'>Order Id : {{$message->id}}</li>
      <li style='color:white;background-color:#342B38;' class='list-group-item'>User Id : {{$message->user_id}}</li>
      <li style='color:white;background-color:#342B38;' class='list-group-item'>Name : {{$message->name}}</li>
      <li style='color:white;background-color:#342B38;'class='list-group-item'>Address : {{$message->address}}</li>
      <li style='color:white;background-color:#342B38;' class='list-group-item'>Contact : {{$message->contact}}</li>
      <li style='color:white;background-color:#342B38;'class='list-group-item'>Total Bill : {{$message->total_price}} tk</li>
      <li style='color:white;background-color:#342B38;'class='list-group-item'>
      @if($message->payment_status == 1)
       <button  type="button" class="btn btn-success">Payment : Paid</button>
       
      @else
       
       <button type="button" class="btn btn-danger">Payment : Pending</button>
      @endif
      
      </li>
      <li style='color:white;background-color:#342B38;'class='list-group-item'>Order Time : {{$message->created_at}}</li>
      <br>
    </ul> <br>
  @endforeach
 @endif

 
@endsection

