@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')
	<div class="post-header">
		<h2><a href="{{ URL::route('lesson.index')}}">{{ Lang::get('lesson/lesson.lesson') }}</a>{{ Helpers::lessonName($veri->id) }}</h2>
	</div>
	@if (count($contents)>1)
	
	<div class="panel-group yourcustomclass" id="oscitas-accordion-0">   
	@foreach($contents as $k=>$content) 
			<div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse"
                data-parent="#oscitas-accordion-0"
                href="#details-{{ $content->id }}-{{ $content->id }}">
               {{ $content->title }}
                </a>
              </h4>
            </div>
				<div id="details-{{ $content->id }}-{{ $content->id }}" class="panel-collapse collapse {{ ($k==0)?'in':'' }}">
				  <div class="panel-body">{{ $content->content }}</div>
				</div>
			</div> 
		
	@endforeach
	</div>
	
	@elseif(count($contents)==1)

<div class="post-header"><h2>{{ $contents[0]->title }}</h2></div>
<div class="post-entry">
 {{ $contents[0]->content }}
</div>
	@else
		{{ Helpers::lLessons($veri->id) }}
		<p>{{ Lang::get('lesson/lesson.notcontentlesson') }}</p>
	@endif

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


@section('jqCode')

	@if (@Auth::user()->id > 0)
	setTimeout(function(){ 
		var id = {{ $veri->id  }};
		var time = {{ $veri->date }};
		
		$.ajax({
			method:'POST',url:"{{ URL::route('lesson.saveworked') }}",data:'id='+id+'&time='+time
		});
	}, {{ ($veri->date)*1000 }});


	
	var sayac = 0;
    jQuery(window).bind('beforeunload', function () {
		if (sayac == 0) { 
			var id = {{ $veri->id  }};
			var time = {{ Session::get('start_time',time()) }};
			$.ajax({
					async: false,method:'POST',url:"{{ URL::route('lesson.saveworked') }}",data:'id='+id+'&time='+time+'&session=true'
			});
		}
		sayac++;

	});



@endif


	
@stop


