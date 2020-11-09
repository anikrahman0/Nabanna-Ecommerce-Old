@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>contact</title>
    <link rel="stylesheet" href="{{asset('contact_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contact_assets')}}/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="{{asset('contact_assets')}}/css/styles.css">
</head>

<body >
  <br>

    <div style="background-color:#F9E5E1;margin-top:5px;" class="contact-clean">
<div class="container">
<div class="row">
    <div class="col-sm">    
    </div>
    <div class="col-sm">
      @if(Session::has('success'))      
 <center>
 <div style="margin-bottom:20px;margin-top:5px;" class="form-group text-center">           
 <span style="background-color:black;border-radius:5px;text-shadow:0px 0px 5px #DAF7A6;padding:15px;color:#DAF7A6;font-size:17px;"  class="form-text ">{{Session::get('success')}}</span>
 </div>
</center>
 @endif
    </div>
    <div class="col-sm">
      
    </div>
  </div>
  </div>   
        <form method="post" action="{{route('contact-form-submit')}}">
          @csrf
            <h2 style="color:black;" class="text-center">Contact us</h2>
   

            <div class="form-group"><input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" type="text" value="{{old('name')}}" name="name" placeholder="Name"><small class="form-text text-danger">{{ $errors->first('name') }}</small></div>
            <div class="form-group"><input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" type="email" name="email" value="{{old('email')}}" placeholder="Email"><small class="form-text text-danger">{{ $errors->first('email') }}</small></div>
            <div class="form-group"><textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : ''}}" name="message"  placeholder="Message" rows="14">{{ old('message') }}</textarea><small class="form-text text-danger">{{ $errors->first('message') }}</small></div>
            <div class="form-group"><button style="background-color:black;color:white;" class="btn " type="submit">send </button></div>

  </form>
    </div>
 
</body>

</html>
@endsection
