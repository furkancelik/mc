<div class="container">
			<div class="navbar-header">
			  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
			  	<ul class="nav navbar-nav list-inline menu">
					<li><a href="{{ URL::route('index') }}">{{ Lang::get('layout/layout.menuitem1') }}</a></li>
					{{ Helpers::uMenus($menus) }}
					<li class="menu-item-has-children"><a href="{{ URL::route('lesson.index') }}">{{ Lang::get('layout/layout.menuitem2') }}<b class="caret"></b></a>
						{{ Helpers::uLessons($lessons) }}
					</li>
					<li><a href="{{ URL::route('article.index') }}">{{ Lang::get('layout/layout.menuitem6') }}</a></li>						
					<li><a href="{{ URL::route('calendar.index') }}">{{ Lang::get('layout/layout.menuitem3') }}</a></li>
					@if (!isset(Auth::user()->id))
					<li><a href="{{ URL::route('user.index') }}">{{ Lang::get('layout/layout.menuitem4') }}</a></li>	
					@else
					<li><a href="{{ URL::route('user.profile') }}">{{ Lang::get('layout/layout.menuitem5') }}</a></li>	
					@endif				
				</ul>
			</nav>
		</div>