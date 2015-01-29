@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')
 <div class="post-header">
	<h2>{{ Lang::get('article/article.allarticle2')	}}</h2>
</div>
 
 @foreach($veriler as $veri)
	<div class="col-sm-12 item list" style="border-bottom:1px dotted #eee;">
		<div class="post-header">
			<h3><a href="{{ URL::route('article.show',array($veri->id,Helpers::seo($veri->title))) }}">{{ $veri->title }}</a></h3>                    			                    				
			<span class="post-meta">
				<i class="fa fa-clock-o"></i> {{ date('d.m.Y ', strtotime($veri->created_at)) }}
			</span>                    				
		</div>
		<div class="post-entry">
			{{ (strlen(strip_tags($veri->content,'<strong><br><p>'))>360)?'<p>'.substr(strip_tags($veri->content,'<strong><br><p>'),0,360).'...</p><a href="'.URL::route('article.show',array($veri->id,Helpers::seo($veri->title))).'" class="readmore">'.Lang::get('article/article.readmore').'</a>':'<p>'.strip_tags($veri->content,'<strong><br><p>').'</p>' }}
		</div>
	</div>
 @endforeach

 {{ $veriler->links(); }}

 

@stop


@section('rightContent')
	@include('frontend.include.profile')
@stop