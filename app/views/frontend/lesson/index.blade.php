@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')
 <div class="post-header">
	<h2>{{ Lang::get('lesson/lesson.alllesson')	}}</h2>
</div>
 {{ Helpers::Lessons($veriler) }}
  
@stop


@section('rightContent')
	@include('frontend.include.profile')
@stop