  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <base href="{{ URL::asset('assets/backend') }}/" />
  
  {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700') }}
  {{ HTML::style('http://fonts.googleapis.com/css?family=Oswald:400,300,700') }}
  {{ HTML::style('assets/backend/css/font-awesome.min.css') }}
  {{ HTML::style('assets/backend/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css') }}
  {{ HTML::style('assets/backend/css/bootstrap.min.css') }}
  
  @yield('pulginCss')
  
    <!-- App CSS -->
	{{ HTML::style('assets/backend/css/target-admin.css') }}
	{{ HTML::style('assets/backend/css/custom.css') }}

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  {{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
  {{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
  <![endif]-->