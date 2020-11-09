<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="{{asset('header_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="{{asset('header_assets')}}/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('header_assets')}}/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('header_assets')}}/fonts/fontawesome5-overrides.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top text-left" id="mainNav" style="background-color: #ffffff;">
        <div class="container"><a class="navbar-brand" href="{{ route('home')}}" style="color: rgb(0,0,0);font-family: 'Open Sans', sans-serif;"><i class="fas fa-leaf" style="color:green;font-size:17px;"></i> Nabanna</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="{{ route('home')}}" style="color: rgb(0,0,0);">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('aboutus')}}" style="color: rgb(0,0,0);">About</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('contactus')}}" style="color: rgb(0,0,0);">Contact&nbsp;</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('product.index')}}" style="color: rgb(0,0,0);">shop</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('product.shoppingCart')}}" style="color: rgb(0,0,0);"><i class="fas fa-shopping-cart"></i>&nbsp;cart&nbsp;&nbsp;<span class="badge badge-pill badge-primary" style="background-color: rgb(235,214,20);color: rgb(17,17,17);font-size: 11px;">{{Session::has('cart') ? Session::get('cart') ->totalQty : '' }}</span></a></li>
                    <li class="nav-item" role="presentation">
                        <li class="nav-item dropdown">
                         @if (Auth::check())
                         <?php 
                         
                         if( Auth::user()->avatar=='p.png')
                          $title="Upload profile image";
                         else
                         $title="Update profile image";
                         ?>
                         <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(0,0,0);">
                         
                           {{{ substr((Auth::user()->name), 0,26)?substr((Auth::user()->name), 0,26) : substr((Auth::user()->email), 0,26) }}}
             
                            </a>
                        <!-- {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} -->
                        <a href="{{route('user.upload-profile-image')}}"><img width="32" height="32" title="{{$title}}"  style="border-radius:50%;" src="{{asset('images/profile_images')}}/{{Auth::user()->avatar}}"></a>
                        @else
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(0,0,0);text-decoration:none;">

                        <i class="fas fa-user" style="font-size: 14px;"></i>
                        </a>
                        @endif
                          
                          

                        <div class="dropdown-menu" role="menu" style="background-color: #ffffff;">
                        @if (Auth::check())
                        <a class="dropdown-item text-left" role="presentation" href="{{route('user.order')}}" style="font-family: 'Open Sans', sans-serif;">My Order</a>
                       <a class="dropdown-item text-left" role="presentation" href="{{route('user.myprofile',Auth::user()->id)}}" style="font-family: 'Open Sans', sans-serif;">My Profile</a>
                        <a class="dropdown-item text-left" role="presentation" href="{{route('user.logout')}}" style="font-family: 'Open Sans', sans-serif;">Logout</a>
                        @else
                        <a class="dropdown-item text-left" role="presentation" href="{{route('user.signin')}}" style="font-family: 'Open Sans', sans-serif;">Login</a>
                        <a class="dropdown-item text-left" role="presentation" href="{{route('user.signup')}}" style="font-family: 'Open Sans', sans-serif;">Sign Up</a>
                        @endif
                        </div>
                        </li>
                        </li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>