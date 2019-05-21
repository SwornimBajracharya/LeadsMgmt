<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/fontssans/open-sans.css') }}"/>
</head>
<body>
  <!--color line--><div class="color-line"></div><!--color line-->
  <div class="container-fluid">
    <div class="login-wrapper col-md-4 col-md-offset-4" style="text-align: center;">
      <h3>PLEASE LOGIN TO APP</h3>
      <p>Enter your credentials to login.</p>
      <!--login form starts here-->
      <div class="login-form">
        <form name="login_form" method="post" action="">
          {{csrf_field()}}
          <div class="form-group">
            @if(session('logout_msg'))
              <div class="">{{session('logout_msg')}}</div>
            @endif
            @if(session('loginError'))
              <div class="error">There was an error with your E-Mail/Password combination.<br> Please try again.</div>
            @endif
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="example@gmail.com" value="{{old('email')}}">
            <p>Your unique email address to app</p>
            <p class="error">{{$errors->first('email')}}</p>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="********" value="{{old('password')}}">
            <p>Your strong password</p>
            <p class="error">{{$errors->first('password')}}</p>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember-me">Remember Login
              <p>(If this is a private computer)</p>
            </label>
          </div>
          <button type="submit" class="btn btn-block login-btn">Login</button>
          <button type="button" class="btn btn-block register-btn">Register</button>
        </form>
      </div><!--login form ends here-->
      <p>Leads Management System</p>
      <p>2015 Copyright ISMT College</p>
    </div>
  </div>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"/></script>
</body>
</html>