@extends ('layouts.master')
<head>
<title>Home</title>

<style type="text/css">
.img-wrapper {
  position: relative;
 }

.img-responsive {
  width: 100%;
  height: auto;
}

.img-overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  text-align: center;
}

.img-overlay:before {
  content: ' ';
  display: block;
  /* adjust 'height' to position overlay content vertically */
  height: 50%;
}
.btn-responsive {
  /* matches 'btn-md' */
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px;
}

@media (max-width:760px) { 
    /* matches 'btn-xs' */
    .btn-responsive {
        padding: 1px 5px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }
}
</style>
</head>
@section('content')


<div class="img-wrapper">
    <img class="img-responsive" src="images/a.jpg">
    <div class="img-overlay">
      <a href="{{ route('product.index')}}"><button class="btn btn-md btn-light">Shop Online Now</button></a>
    </div>
</div>
  
 


<!-- 12 COLUMN IMAGE --> 

  

@endsection