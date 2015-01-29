<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <title>Login Management Panel</title>
@include('backend.layout.head')
</head>

<body class="account-bg">
<hr class="account-header-divider">
<div class="account-wrapper">

  <div class="account-logo">
    <img src="img/logo-login.png" alt="Target Admin">
  </div>

    <div class="account-body">

      <h3 class="account-body-title">Welcome back to Target Admin.</h3>

      <h5 class="account-body-subtitle">Please sign in to get access.</h5>
	  

	  
	  @if ($errors->has())
	  <div class="alert alert-danger">
        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
        {{ $errors->first() }}
      </div>
	  @endif

	  {{ Form::open(array('method'=>'POST','action'=>'loginFormPost','class'=>'form account-form')); }}
          <div class="form-group">
          <label for="login-username" class="placeholder-hidden">Username</label>
          <input type="text" class="form-control" id="login-username" placeholder="Username" name="username" tabindex="1">

        </div> <!-- /.form-group -->

        <div class="form-group">
          <label for="login-password" class="placeholder-hidden">Password</label>
          <input type="password" class="form-control" id="login-password" placeholder="Password" name="password" tabindex="2">
        </div> <!-- /.form-group -->

        <div class="form-group clearfix">
          <div class="pull-left">         
            <label class="checkbox-inline">
            <input type="checkbox" name="remeber" class="" value="true" tabindex="3">Remember me
            </label>
          </div>

          <!--<div class="pull-right">
            <a href="account-forgot.html">Forgot Password?</a>
          </div>-->
        </div> <!-- /.form-group -->

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4">
            Signin &nbsp; <i class="fa fa-play-circle"></i>
          </button>
        </div> <!-- /.form-group -->

      {{ Form::close() }}


    </div> <!-- /.account-body -->

    <div class="account-footer">
     <!-- <p>
      Don't have an account? &nbsp;
      <a href="account-signup.html" class="">Create an Account!</a>
      </p> -->
    </div> <!-- /.account-footer -->

  </div> <!-- /.account-wrapper -->       
  {{ HTML::script('assets/backend/js/libs/jquery-1.10.1.min.js') }}
  {{ HTML::script('assets/backend/js/libs/jquery-ui-1.9.2.custom.min.js') }}
  {{ HTML::script('assets/backend/js/libs/bootstrap.min.js') }}

  <!--[if lt IE 9]>
  {{ HTML::script('assets/backend/./js/libs/excanvas.compiled.js') }}
  <![endif]-->
  <!-- App JS -->
  {{ HTML::script('assets/backend/js/target-admin.js') }}
  
  <!-- Plugin JS -->
  {{ HTML::script('assets/backend/js/target-account.js') }}

</body>
</html>
