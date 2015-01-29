@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')

<div class="video-section">
	<div class="section-header">
		<h3><i class="fa fa-search"></i> {{ Lang::get('lesson/lesson.findlessontitle',array("name"=>$input['name'])) }}</h3>
	</div>
	<div class="latest-wrapper">
		<div class="row">
			<div class="carousel-inner">
				<div class="item active">
					@if ($findlessons->count()>0)
					@foreach($findlessons as $findlesson)
					<div  class="col-sm-4 col-xs-6">
						<a href="{{ URL::route('lesson.show',array($findlesson->id,Helpers::seo($findlesson->name))) }}" class="lessonimg">
							<p>{{ (strlen($findlesson->name)>16)?substr($findlesson->name,0,15)."..":$findlesson->name }}</p>
							<img class="img-responsive" src="{{ URL::asset('assets/frontend/uploads/blank.png') }}" style="margin:0px;" height="150" width="230" />
						</a>
						<div class="post-header">
							<h3><a href="{{ URL::route('lesson.show',array($findlesson->id,Helpers::seo($findlesson->name))) }}">{{ $findlesson->name }}</a></h3>
						</div>
					</div> 
					@endforeach
					@else
						{{ Lang::get('lesson/lesson.notfindlesson',array("name"=>$input['name'])) }}
					@endif
				</div> 
			</div>
		</div>
	</div>
</div>	



<div class="video-section">
	<div class="section-header"><span class="all"><a href="{{ URL::route('lesson.index') }}">{{ Lang::get('lesson/lesson.alllesson') }}</a></span>
		<h3><i class="fa fa-pencil"></i> {{ Lang::get('lesson/lesson.otherlesson') }}</h3>
	</div>
	<div class="latest-wrapper">
		<div class="row">
			<div class="carousel-inner">
				<div class="item active">
					@foreach($lessons as $lesson)
					<div  class="col-sm-4 col-xs-6">
						<a href="{{ URL::route('lesson.show',array($lesson->id,Helpers::seo($lesson->name))) }}" class="lessonimg">
							<p>{{ (strlen($lesson->name)>16)?substr($lesson->name,0,15)."..":$lesson->name }}</p>
							<img class="img-responsive" src="{{ URL::asset('assets/frontend/uploads/blank.png') }}" style="margin:0px;" height="150" width="230" />
						</a>
						<div class="post-header">
							<h3><a href="{{ URL::route('lesson.show',array($lesson->id,Helpers::seo($lesson->name))) }}">{{ $lesson->name }}</a></h3>
						</div>
					</div> 
					@endforeach
				</div> 
			</div>
		</div>
	</div>
</div>	

@stop


@section('rightContent')
	@include('frontend.include.profile')
@stop


