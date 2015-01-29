@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')
 <div class="post-header">
	<h2>{{ Lang::get('calendar/calendar.allevent') }}</h2>
</div>
 
 @foreach($veriler as $k=>$veri) 
 @if (count($veriler)>1)
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
			<h3><a href="{{ URL::route('calendar.show',array($veri->id,Helpers::seo($veri->title))) }}">{{ $veri->title }}</a></h3>                    			                    				
			<span class="post-meta">
				<i class="fa fa-clock-o"></i> {{ Lang::get('calendar/calendar.eventdate') }}: <b>{{ date(Lang::get('layout/layout.phpdateformat'), strtotime($veri->date)) }}</b>
			</span>                    				
		</div>
		<div class="post-entry">
			{{ (strlen($veri->description)>100)?'<p>'.substr($veri->description,0,100).'...</p><a href="'.URL::route('calendar.show',array($veri->id,Helpers::seo($veri->title))).'" class="readmore">'.Lang::get('calendar/calendar.readmore').'</a>':'<p>'.$veri->description.'</p>' }}
		</div>
	</div>
@if (count($veriler)>1)	
	@if (($k%2==1) or count($veriler) == ($k+1))
		<div style="clear:both;"></div>
	</div><!-- sutun bitiş -->	
	@endif
@endif
 @endforeach
 


 {{ $veriler->links(); }}

@stop



@section('rightContent')
	@include('frontend.include.profile')
@stop