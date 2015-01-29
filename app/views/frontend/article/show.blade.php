@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')
	<div class="post-header">
		<h2>{{ $veri->title }}</h2>
	</div>
	<div class="post-entry">{{ $veri->content }}</div>
	
	
	
<div class="row">
<div class="video-section">
	<div class="section-header">
		<h3><i class="fa fa-pencil"></i> {{ Lang::get('article/article.otherarticles') }}</h3><span class="all"><a href="{{ URL::route('article.index') }}">{{ Lang::get('article/article.allarticle') }}</a></span>
	</div>
				<div class="item">
@foreach($lastArticles as $lastArticle)
<div class="row">
	<div class="col-sm-12 item list">
		<h3><a href="{{ URL::route('article.show',array($lastArticle->id,Helpers::seo($lastArticle->title))) }}">{{ $lastArticle->title }}</a></h3>
		<div class="meta">
			<span class="date">{{ date('d.m.Y ', strtotime($lastArticle->created_at)) }}</span>
		</div>
		{{ (strlen(strip_tags($lastArticle->content,'<strong><br><p>'))>360)?'<p>'.substr(strip_tags($lastArticle->content,'<strong><br><p>'),0,360).'...</p><p><a href="'.URL::route('article.show',array($lastArticle->id,Helpers::seo($lastArticle->title))).'"><i class="fa fa-play-circle"></i>'.Lang::get('article/article.readmore').'</a></p>':'<p>'.strip_tags($lastArticle->content,'<strong><br><p>').'</p>' }}
	</div>
</div>
@endforeach
</div>
</div>
</div>	

@stop


@section('rightContent')
	@include('frontend.include.profile')
@stop