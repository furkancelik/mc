@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')


<div class="video-section">
	<div class="section-header">
		<h3><i class="fa fa-pencil"></i> {{ Lang::get('index/index.saveworked') }}</h3>
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



<div class="row">
	<div class="col-sm-12 section-header"><h3><i class="fa fa-calendar"></i> {{ Lang::get('index/index.calendarevent') }}</h3></div>	
	<div class="col-sm-4 item">
		<div id="dp-ex-2" class="" data-date-format="{{ Lang::get('layout/layout.jqdateformat') }}"></div>
		@section('jqCode')
		
	
			$('#dp-ex-2').datepicker({ jsonDate : {
							date: [ @foreach($calendars as $k=>$calendar)'{{ date(Lang::get('layout/layout.phpdateformat'), strtotime($calendar->date)) }}' @if (($k+1)==$calendars->count()) @else , @endif @endforeach ],
							link: [ @foreach($calendars as $k=>$calendar) '{{ $calendar->id }}' @if (($k+1)==$calendars->count()) @else , @endif @endforeach ]
					},language:"{{ Session::get('local') }}"
					});
			
				$(".active2").live("click",function(){
					var id = $(this).attr("id");
					$(".calendarinfo").html("{{ Lang::get('index/index.loading') }}");
						$.ajax({
									method:'POST',url:"{{URL::route('index.selectcalendar')  }}",data:'id='+id,success:function(c){ 
										if (c=="false"){
											alert("{{ Lang::get('index/index.calendarerror1') }}");
										}
										else { var obj = $.parseJSON(c);
												var time = obj[0];
												time = time.date.split(" ");
												time = time[0].split("-");
												var d = time[2];
												var m = time[1];
												var Y = time[0];
												function dateformat(d,m,Y,format){
													var res = format.replace("d",d); 
													res = res.replace("m",m); 
													res = res.replace("Y",Y); 
													return res;
												}
												
												function dateformat2(times,format){
													time2 = times.split(" ");
													time2s = time2[0].split("-");
													var d = time2s[2];
													var m = time2s[1];
													var Y = time2s[0];
													var res = format.replace("d",d); 
													res = res.replace("m",m); 
													res = res.replace("Y",Y); 
													return res;
												}
												
												function stringFormat(str,link="#"){
													if (str.length>50){
														str = str.substr(0,50);
														str += "...";
														str += "<br /><a href=\""+link+"\">{{ Lang::get('index/index.readmore') }}</a>";
														return str;
													}else { return str; }
												}
												
												
												$(".calendarinfo").html("");
												$(".calendarinfo").html("<h3><a href=\"{{ URL::route('calendar.index') }}\"><i class=\"fa fa-calendar\"></i> "+dateformat(d,m,Y,"{{ Lang::get('layout/layout.phpdateformat') }}")+" {{ Lang::get('index/index.inevents') }}</a></h3><br /><ul class=\"calendartxt\">{{ Lang::get('index/index.loading') }}</ul>");
												$(".calendartxt").html("");
											$.each(obj, function(i, item) {
												$(".calendartxt").append("<li>"+
																			"<a href=\"{{ URL::to('openshowcalendar') }}/"+item.id+"\"><h3><b>"+item.title+"</b></h3></a>"+
																			"<i class=\"fa fa-clock-o\"></i> "+
																			"<span>"+dateformat2(item.date,"{{ Lang::get('layout/layout.phpdateformat') }}")+"</span> <br />"+
																			stringFormat(item.description,"{{ URL::to('openshowcalendar') }}/"+item.id)+"</li>");
												
											});
											
										}
									}
								});
					
				});
			
			
		@stop
	</div>
	
	<div class="col-sm-8 item">
		
		<div class="calendarinfo">
		<h3><a href="{{ URL::route('calendar.index') }}"><i class="fa fa-calendar"></i> {{ date(Lang::get('layout/layout.phpdateformat'), time()) }} {{ Lang::get('index/index.inevents') }}</a></h3>
		<br />
		@if ($nowcalendars->count()>0)
			<ul class="calendartxt">
			@foreach($nowcalendars as $nowcalendar)
				<li>
				<a href="{{ URL::route('calendar.show',array($nowcalendar->id,Helpers::seo($nowcalendar->title))) }}"><h3><b>{{ $nowcalendar->title }}</b></h3></a>
				<i class="fa fa-clock-o"></i> <span>{{ date(Lang::get('layout/layout.phpdateformat'), strtotime($nowcalendar->date)) }}</span> <br />
				{{ (strlen($nowcalendar->description)>50)?substr($nowcalendar->description,0,50).'... <br /><a href="'.URL::route('calendar.show',array($nowcalendar->id,Helpers::seo($nowcalendar->title))).'" class="readmore">'.Lang::get('index/index.readmore').'</a>' : $nowcalendar->description }}
				</li>
			@endforeach
			</ul>
		@else
			<b>{{ date(Lang::get('layout/layout.phpdateformat'), time()) }}</b> {{ Lang::get('index/index.nullevent') }}
		@endif
		
		</div>                                
	</div>
						                	
					

</div>

<br />

<div class="row">
<div class="video-section">
	<div class="section-header">
		<h3><i class="fa fa-pencil"></i> {{ Lang::get('index/index.lastcontent') }} </h3><span class="all"><a href="{{ URL::route('article.index') }}">{{ Lang::get('index/index.allcontents') }}</a></span>
	</div>
@if ($lastArticles->count()>0)
	<div class="item">
@foreach($lastArticles as $lastArticle)
<div class="row">
	<div class="col-sm-12 item list">
		<h3><a href="{{ URL::route('article.show',array($lastArticle->id,Helpers::seo($lastArticle->title))) }}">{{ $lastArticle->title }}</a></h3>
		<div class="meta">
			<span class="date">{{ date(Lang::get('layout/layout.phpdateformat'), strtotime($lastArticle->created_at)) }}</span>
		</div>
		{{ (strlen(strip_tags($lastArticle->content,'<strong><br><p>'))>360)?'<p>'.substr(strip_tags($lastArticle->content,'<strong><br><p>'),0,360).'...</p><p><a href="'.URL::route('article.show',array($lastArticle->id,Helpers::seo($lastArticle->title))).'"><i class="fa fa-play-circle"></i>'.Lang::get('index/index.readmore').'</a></p>':'<p>'.strip_tags($lastArticle->content,'<strong><br><p>').'</p>' }}
	</div>
</div>
@endforeach
</div>
@else
{{ Lang::get('index/index.notarticles') }}
@endif
</div>
</div>













<div class="row">
	<div class="col-sm-12 section-header"><h3><i class="fa fa-pencil"></i> {{ Lang::get('index/index.turkeymap') }}</h3></div>

<img src="{{ URL::asset('upload/images/turkey_flag_map.png') }}" style="width:100%;" />
	</div>


              
@stop


@section('rightContent')
	@include('frontend.include.profile')
@stop