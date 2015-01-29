@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')
	<div class="post-header">
		<h2>{{ $veri->title }}</h2>
		<span class="post-meta">
				<i class="fa fa-clock-o"></i> {{ Lang::get('calendar/calendar.eventdate') }}: <b>{{ date(Lang::get('layout/layout.phpdateformat'), strtotime($veri->date)) }}</b>
			</span>                    				
	</div>
	<div class="post-entry"><br />{{ $veri->description }}</div>
	
	

<div class="section-header"><span class="all"><a href="{{ URL::route('calendar.index') }}">{{ Lang::get('calendar/calendar.allevent') }}</a></span>
		<h3><i class="fa fa-calendar"></i> {{ Lang::get('calendar/calendar.otherevent') }}</h3>
	</div>	
@foreach($calendars as $k=>$calendar) 
 @if (count($calendars)>1)
	@if ($k%2==0)
	<div class="sutun">
	@endif
@endif
	<div class="col-sm-6 item list calendartype
	@if ($k%2==0)
	sol
	@else
	sag
	@endif
" id="{{ $k }}" style="width:47%;margin:1%;border-bottom:1px dotted #eee;">
		<div class="post-header">
			<h3><a href="{{ URL::route('calendar.show',array($calendar->id,Helpers::seo($calendar->title))) }}">{{ $calendar->title }}</a></h3>                    			                    				
			<span class="post-meta">
				<i class="fa fa-clock-o"></i> {{ Lang::get('calendar/calendar.eventdate') }}: <b>{{ date(Lang::get('layout/layout.phpdateformat'), strtotime($calendar->date)) }}</b>
			</span>                    				
		</div>
		<div class="post-entry">
			{{ (strlen($calendar->description)>100)?'<p>'.substr($calendar->description,0,100).'...</p><a href="'.URL::route('calendar.show',array($calendar->id,Helpers::seo($calendar->title))).'" class="readmore">'.Lang::get('calendar/calendar.readmore').'</a>':'<p>'.$calendar->description.'</p>' }}
		</div>
	</div>
@if (count($calendars)>1)	
	@if (($k%2==1) or count($calendars) == ($k+1))
		<div style="clear:both;"></div>
	</div><!-- sutun bitiş -->	
	@endif
@endif
 @endforeach

@stop


@section('rightContent')
	@include('frontend.include.profile')
@stop