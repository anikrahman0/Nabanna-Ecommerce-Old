@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="{{asset('about_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('about_assets')}}/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('about_assets')}}/css/styles.css">
    <link rel="stylesheet" href="{{asset('about_assets')}}/css/Team-Presentation---2-Persons---Social-Media-Icon.css">
</head>

<body style="font-size:16px;">
     <br><br>
                  <div class="container-fluid">
    
                
                
                

                <div style="background-color:#F9E5E1;text-align:center;margin-top:50px;" class="row">
                <div class="col-md-12">
                <h3><u>About Us</u></h3>
                </div>
                </div>

            <div style="background-color:#F9E5E1;" class="row">
            
                <div class="col-md-6" style="text-align: center;padding:40px;"><img class="teamprofilepictures" src="{{asset('about_assets')}}/img/a7.png">
                    <h3 style="color:#581845;font-size:22px;" class="teamprofilenames">Md. Anik Rahman</h3>
                    <h4 style="color:#1B271F;font-size:20px;" class="teamprofileprofessions">Designer</h4>
                    <p style="font-size:18px;" class="teamprofiledescription text-center">Attractive design is very delighting.</p>
                   
                </div>
                <div class="col-md-6" style="text-align: center;padding:40px;"><img class="teamprofilepictures" src="{{asset('about_assets')}}/img/a6.png">
                    <h3 style="color:#581845;font-size:22px;" class="teamprofilenames">Md. Anik Rahman</h3>
                    <h4 style="color:#1B271F;font-size:20px;" class="teamprofileprofessions">Bug Tester</h4>
                    <p style="font-size:18px;" class="teamprofiledescription text-center">Find out the bugs as soon as you can.</p>
                   
                </div>
                
            </div>
           
           <div style="background-color:#F9E5E1;" class="row">
                <div class="col-md-6" style="text-align: center;padding:40px;"><img class="teamprofilepictures" src="{{asset('about_assets')}}/img/a2.png">
                    <h3 style="color:#581845;font-size:22px;" class="teamprofilenames">Md. Anik Rahman</h3>
                    <h4 style="color:#1B271F;font-size:20px;" class="teamprofileprofessions">Developer</h4>
                    <p style="font-size:18px;" class="teamprofiledescription text-center">Developing is the toughest of all. </p>
                   
                </div>
                <div class="col-md-6" style="text-align: center;padding:40px;margin-bottom:50px;"><img class="teamprofilepictures" src="{{asset('about_assets')}}/img/a3.png">
                    <h3 style="color:#581845;font-size:22px;" class="teamprofilenames">Md. Anik Rahman</h3>
                    <h4 style="color:#1B271F;font-size:20px;" class="teamprofileprofessions">Coder</h4>
                    <p style="font-size:18px;" class="teamprofiledescription text-center">Eat, Sleep and Code.</p>
                   
                </div>
                
            </div>

     </div>
            
   

</body>

</html>
@endsection