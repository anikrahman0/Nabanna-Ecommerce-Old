
@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
  #btn{

    border:none;
    background-color:black;
    color:white;
    padding-left:20px;
     padding-right:20px;
     border-top-right-radius:5px;
     border-bottom-right-radius:5px;
     outline:0;
  }
  #btn:hover{
background-color:#FFC300;
color:black;

  }


  #btn-2{
background-color:#FFC300;
color: black;
border-radius:4px;
font-size:13px;
padding:6px;
border:none;
}
  

#btn-2:hover{
background-color:black;
color:#FFC300;
transition:.3s all;
  }
  </style>
</head>
<body>




    <div class="container">

    <div style="background-color: #F9E5E1;">
    <div style="margin-top:150px;margin-bottom:50px;" class="container ">

     
  <form action="{{route('search')}}" method="get">

    <div class="input-group mb-3">
  
      <input required style="padding:25px;" type="text" class="form-control " value="{{request()->input('query')}}" placeholder="Search Product"  name="query">
    
     <button id="btn" type="submit"><i class="fas fa-search"></i></button>
      <div class="input-group-append">
            
      </div>
    </div>
    
  </form>
</div>
        
    <h3 style="text-align:center;">Search Results</h3>
     <p style="text-align:center;">{{ $products->count()}} result for {{ request()->input('query') }}</p>
         
        
            <div class="row" style="padding: 50px;">
            @foreach($products as $product) 
           
                <div  class="col-md-4">
                    <div class="card" style="margin-bottom: 50px;" >
                        <div style="box-shadow:0px 0px 4px  black;" class="card-body">
                            <div class="text-center"><img class="img-fluid" width="150" height="150" src="{{$product->imagePath}}"></div>
                            <h4 style="font-size:18px;" class="text-center card-title">{{$product->title}}</h4>
                            <h6 style="font-size:15px;margin-top:20px;" class="text-center text-muted card-subtitle mb-2">{{$product->description}}<br><br></h6>
                            
                            <h6  class="text-center card-text" style="font-size: 16px;font-weight: bold;margin-bottom:25px;">&#2547; {{$product->price}}<br></h6>
                           <div style="text-decoration:none;font-size:12px;margin-bottom:5px;" class="text-center"><a href="{{ route('product.addToCart', ['id'=> $product->id])}}"><button id="btn-2" class="btn" type="button"  ><i class="fas fa-plus-circle"></i>&nbsp;Add TO CART <i class="fas fa-shopping-cart"></i></button></a></div>
                        </div>
                    </div>
                </div>
            @endforeach    
            </div>
         

        </div>
    </div>



</body>
</html>


@endsection