@extends('frontend.layout.template')

@section('title')
	{{ Lang::get('errors/error.title') }}
@stop

@section('mainContent')


<div class="video-section">

		<h1>{{ Lang::get('errors/error.title') }}</h1>
		<div class="col-sm-12"><br />
           <p>{{ Lang::get('errors/error.content',array('error'=>@$error)) }}</p>
		   <br />
               @if (Request::is('admin/*'))
			   <a href="{{ url('/admin') }}" class="btn btn-large btn-danger">{{ Lang::get('errors/404.button1') }}</a>
			   <a href="javascript:history.go(-1)" class="btn btn-large btn-danger">{{ Lang::get('errors/404.button2') }}</a>
			  @else
			  <a href="{{ url('/') }}" class="btn btn-large btn-danger">{{ Lang::get('errors/404.button1') }}</a>
			   <a href="javascript:history.go(-1)" class="btn btn-large btn-danger">{{ Lang::get('errors/404.button2') }}</a>
			  @endif
		</div>

</div>

              
@stop


@section('rightContent')
	@include('frontend.include.profile')
@stop