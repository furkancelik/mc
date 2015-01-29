<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <title>@yield('title')</title>
  @include('backend.layout.head')
</head>

<body>
	@include('backend.layout.navbar')
	@include('backend.layout.mainbar')
<div class="container">
  <div class="content">

    <div class="content-container">    
@yield('contentHeader')
@yield('contentContainer')
    </div> <!-- /.content-container -->
      
  </div> <!-- /.content -->

</div> <!-- /.container -->
@include('backend.layout.footer')
  
</body>
</html>