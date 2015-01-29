<div class="container">
			<div class="row">
				<div class="col-sm-3" id="logo">
					<a title="{{ Lang::get('layout/layout.logotitle') }}" href="{{ URL::route('index') }}">
						<img src="themes/videotube/img/logo.png" alt="{{ Lang::get('layout/layout.logotitle') }}" />
					</a>
				</div>
				{{ Form::open(array('method'=>'post','action'=>'lesson.find')) }}
				
					<div class="col-sm-6" id="header-search">
						<span class="glyphicon glyphicon-search search-icon"></span>
						<input value="" name="name" type="text" placeholder="{{ Lang::get('layout/layout.findlesson') }}" id="search" />
					</div>
				{{ Form::close() }}
				<div class="col-sm-3" id="header-social">
				<a href="{{ URL::route('language',array('en')) }}" class="language_en{{ Session::get('local')=='en'?' active':'' }}" title="English"></a>
				<a href="{{ URL::route('language',array('tr')) }}" class="language_tr{{ Session::get('local')=='tr'?' active':'' }}" title="Türkçe"></a>
				</div>
			</div>
		</div>