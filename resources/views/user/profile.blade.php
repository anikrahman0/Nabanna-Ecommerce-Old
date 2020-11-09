@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('profile_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('profile_assets')}}/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('profile_assets')}}/css/styles.css">
    <style type="text/css">
@media only screen and (max-width: 767px) {
}
    .cover{ background-color:#262626;
    background-image:url('/images/t.jpg');
      background-position: center center;
  background-repeat: no-repeat;
    background-size: cover;
    }

    </style>
</head>
<!-- background:url('/images/t.jpg'); -->

<body class="text-center">
<?php 
if( Auth::user()->avatar=='p.png')
$title="Upload profile image";
else
$title="Update profile image";
?>
<div  class="cover">
    <div  class="container">
        <figure class="figure"><a href="{{route('user.upload-profile-image')}}"><img title="{{$title}}" class="rounded-circle img-fluid figure-img" style="margin-top: 110px;margin-bottom:30px;" src="{{asset('images/profile_images')}}/{{Auth::user()->avatar}}" width="200" height="200" alt="profile image"></a>
            <figcaption class="figure-caption" style="font-size: 24px;font-weight: bold;color: rgb(0,0,0);margin-bottom:20px;color:#FBE5E1;">{{Auth::user()->name}}</figcaption>
        </figure>
        
    </div>
</div>
<div style="margin-top: 10px;">


<div class="container">
<div class="row">
    <div class="col-sm">    
    </div>
    <div class="col-sm">
      @if(Session::has('success'))      
 <center>
 <div style="margin-top:35px;" class="form-group text-center">           
 <span style="background-color:black;border-radius:5px;text-shadow:0px 0px 5px #DAF7A6;padding:15px;color:#DAF7A6;font-size:17px;"  class="form-text ">{{Session::get('success')}}</span>
 </div>
</center>
 @endif
    </div>
    <div class="col-sm">
      
    </div>
  </div>
  </div>

<div style="margin-top: 10px;">
        <div class="container">
<div class="row">
    <div class="col-sm">    
    </div>
    <div class="col-sm-5">
@if(Session::has('success2'))      
 <center>
 <div style="margin-top:35px;" class="form-group text-center">           
 <span style="background-color:#DC1D4E;border:1px solid #DC1D4E;border-radius:5px;text-shadow:0px 0px 3px #DC1D4E;box-shadow:0px 0px 3px #DC1D4E;padding:14px;color:white;font-size:16px;"  class="form-text ">{{Session::get('success2')}}</span>
 <div style="margin-top:10px;"><a href="{{route('user.delete',Auth::user()->id)}}" style="text-decoration:none;font-size:16px;color:white;background-color:black;border-radius:4px;padding:8px;">Confirm</a>&nbsp;<a href="{{route('user.myprofile')}}" style="text-decoration:none;font-size:16px;color:black;background-color:#C5D36E;border-radius:4px;padding:8px;">Cancle</a></div>
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
                <div class="col-md">
                    <p class="float-left" style="font-size: 22px;font-weight: bold;"><i class="fas fa-user-circle"></i>&nbsp;About</p>
                    <a style="color:black;" href="{{route('user.edit',Auth::user()->id)}}"><p class="float-right" style="font-weight: bold;font-size: 17px;"><i class="fas fa-edit" style="font-size: 16px;font-weight: bold;"></i>&nbsp;Edit</p></a>
                </div>
				
            </div>
			<hr>
			</div>
        
        </div>
  </div>
	
	
    <div style="margin-top: 20px;font-size:16px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p class="float-left" style="font-weight: bold;"><strong>Name:</strong></p>
                    <p class="float-right">{{Auth::user()->name}}</p>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <p class="float-left" style="font-weight: bold;">Contact No:</p>
                    <p class="float-right">{{Auth::user()->contact}}</p>
                </div>
                <div class="col-md-4">
                    <p class="float-left" style="font-weight: bold;">Eamil:</p>
                    <p class="float-right">{{Auth::user()->email}}</p>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <p class="float-left" style="font-weight: bold;">Date of Birth:</p>
                    <p class="float-right">{{Auth::user()->date_of_birth}}</p>
                </div>
                <div class="col-md-4">
                    <p class="float-left" style="font-weight: bold;">Gender:</p>
                    <p class="float-right">{{Auth::user()->gender}}</p>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <p class="float-left" style="font-weight: bold;">City:</p>
                      @if(Auth::user()->city=='')
                    <p class="float-right">-</p>
                    @else
                     <p class="float-right">{{Auth::user()->city}}</p>
                    @endif
                </div>
                <div class="col-md-4">
                 
                    <p class="float-left" style="font-weight: bold;">Address:</p>
                    @if(Auth::user()->address=='')
                    <p class="float-right">-</p>
                    @else
                     <p class="float-right">{{Auth::user()->address}}</p>
                    @endif
                </div>
                <?php 
                
                //  $time =date('h:i A', strtotime(Auth::user()->created_at));
                 $date =date('d-m-Y', strtotime(Auth::user()->created_at));
                ?>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <p class="float-left" style="font-weight: bold;">Profile Created:</p>
                    <p class="float-right"><?php echo $date;?></p>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="float-left" style="font-size: 20px;font-weight: bold;"><i class="fas fa-cog"></i>&nbsp;Settings</p>
                </div>
            </div>  
            <hr>
            <div class="row">
                <div class="col-md-12" style="margin-top: 18px;margin-bottom: 25px;font-size:16px;">
                    <a style="color:black;" href="{{route('delete_confirm')}}"><p class="float-right" style="font-weight: bold;"><i class="fas fa-trash" style="font-size: 16px;font-weight: bold;"></i>&nbsp;Delete Account</p></a>
                    <a style="color:black;" href="{{route('change_password')}}"><p class="float-left" style="font-weight: bold;"><i class="fas fa-edit" style="font-size: 16px;font-weight: bold;"></i>&nbsp;Change Password</p></a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
@endsection