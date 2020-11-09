<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="{{asset('login_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="{{asset('login_assets')}}/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="{{asset('login_assets')}}/css/styles.css">
</head>

<body style="background-color: #F9BEB3;">
    <div class="login-clean" style="background-color: #F9BEB3;">
        <form method="post" style="width: 340px;">
            <h2 class="sr-only">Login Form</h2>
            <div class="text-left illustration" style="font-size: 18px;">
                <p class="text-center" style="font-size: 24px;font-family: 'Open Sans', sans-serif;font-weight: bold;color: rgb(0,0,0);font-style: normal;">Login</p>
            </div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" style="padding: 0px;width: 250px;"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" style="padding: 0px;width: 250px;"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(0,0,0);padding: 8px;width: 250px;">SIGN IN</button></div><a class="forgot" href="#">Don't have account? Sign Up Now</a></form>
    </div>
    <script src="{{asset('login_assets')}}/js/jquery.min.js"></script>
    <script src="{{asset('login_assets')}}/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>