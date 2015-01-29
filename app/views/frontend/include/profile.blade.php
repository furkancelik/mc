@if (((Route::currentRouteName() == 'lesson.show') && @isset(Auth::user()->id)) and isset($veri))
	<div class="widget mars-loginform-widget"><h4 class="widget-title">{{ Lang::get('include/include.process') }}</h4>
				
			<div class="social-counter-item">
			@if ($onworked)
	            <a id="{{ $veri->id }}" href="#" class="deleteonworked">
				<i class="fa fa-thumb-tack active"></i>
				<span class="counter-text">{{ Lang::get('include/include.deleteonwork') }}</span>
				</a>
			@else
				<a id="{{ $veri->id }}" href="#" class="addonworked">
				<i class="fa fa-thumb-tack"></i>
				<span class="counter-text">{{ Lang::get('include/include.addonwork') }}</span>
				</a>
			@endif
	        </div>
			
            <div class="social-counter-item">
			@if (!$favorite)
	            <a id="{{ $veri->id }}" href="#" class="addfavorite">
	                <i class="fa fa-star"></i>
	                <span class="counter-text">{{ Lang::get('include/include.addfavorite') }}</span>
	            </a>
			@else
				<a id="{{ $veri->id }}" href="#" class="deletefavorite">
	                <i class="fa fa-star active"></i>
	                <span class="counter-text">{{ Lang::get('include/include.deletefavorite') }}</span>
	            </a>
			@endif
	        </div>
            <div class="social-counter-item">
	            <a id="{{ $veri->id }}" href="{{ URL::route('user.profile') }}#okwork">
	                <i class="fa fa-pencil-square-o"></i>
	                <span class="counter-text">{{ Lang::get('include/include.lookokwork') }}</span>
	            </a>
	        </div>
                                
        	<div class="social-counter-item last">
	            <a id="{{ $veri->id }}" href="{{ URL::route('user.profile') }}#exam">
	                <i class="fa fa-file-text-o"></i>
	                <span class="counter-text">{{ Lang::get('include/include.examnote') }}</span>
	            </a>
	        </div>
			
			
			
				
		</div>
@endif


@if (@Auth::user()->id>0)
	<div class="widget mars-loginform-widget"><h4 class="widget-title">{{ Lang::get('include/include.profile') }}</h4>
				<div class="profile-widget-header ">
					<div class="profile-widget-image">
						<a href="{{ URL::route('user.profile') }}"><img src="{{ URL::asset('upload/images/avatar/userAvatar.jpg') }}" class='avatar avatar-80 photo' height='80' width='80' style="border:1px solid #eee;" /></a>
					</div>					
					<div class="profile-widget-info">
						<h3>{{ Lang::get('include/include.welcome',array('name'=>Auth::user()->username)) }}</h3>
						<span class="profile-widget-info-item"><i class="fa fa-user"></i> <a href="{{ URL::route('user.profile') }}">{{ Lang::get('include/include.myprofile') }}</a></span>
						<span class="profile-widget-info-item"><i class="fa fa-envelope"></i> <a href="{{ URL::route('user.allmessage') }}">{{ Lang::get('include/include.postmessage',array("count"=>$messageCount)) }}</a></span>
						<span class="profile-widget-info-item"><i class="fa fa-pencil-square-o"></i> <a href="{{ URL::route('user.profile') }}#exam">{{ Lang::get('include/include.examnote2') }}</a></span>
						<span class="profile-widget-info-item"><i class="fa fa-sign-out"></i> <a href="{{ URL::route('user.logout') }}">{{ Lang::get('include/include.logout') }}</a></span>
					</div>
				</div>			
		</div>

@else
<div class="widget mars-loginform-widget"><h4 class="widget-title">{{ Lang::get('include/include.login') }}</h4>
		@if (Session::has('success'))
			@if (!Session::get('success'))
			<div class="alert alert-danger"><button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
				<p>{{ Lang::get('include/include.loginerror') }}</p>
			</div>
			@endif
		@endif
		{{ Form::open(array('method'=>'POST','action'=>'user.postLogin','id'=>'vt_loginform')) }}
			
			<p class="login-username">
				<label for="user_login">{{ Lang::get('include/include.username') }}</label>
				<input type="text" name="user" id="user" class="input" value="" size="20" />
			</p>
			<p class="login-password">
				<label for="user_pass">{{ Lang::get('include/include.password') }}</label>
				<input type="password" name="password" id="user_pass" class="input" value="" size="20" />
			</p>
			<p class="login-remember"><label><input name="remember" type="checkbox" id="rememberme" value="forever" /> {{ Lang::get('include/include.remember') }}</label></p>
			<p class="login-submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="{{ Lang::get('include/include.loginbutton') }}" />
				<input type="hidden" name="post"  value="true" />
			</p>
		{{ Form::close() }}
		
		</div>
@endif


<div class="widget mars-loginform-widget"><h4 class="widget-title">{{ Lang::get('include/include.lesson') }}</h4>

        <div class="col-sm-12 col-md-12">
            <div class="panel-group panel-group-red" id="accordion">
			@foreach($lessonMenus as $k=>$lessonMenu)
				 <div class="panel panel-red">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" class="openlesson" href="#collapse{{ $lessonMenu->id }}">
						@if ($k==0)
						<i class="fa fa-chevron-down"></i> 
						@else 
						<i class="fa fa-chevron-right"></i> 
						@endif
							{{ $lessonMenu->name }}</a>
                        </h4>
                    </div>
                    <div id="collapse{{ $lessonMenu->id }}" class="panel-collapse collapse 
					@if ($k==0)
					in
					@endif
					">
                        <div class="panel-body">
							{{ Helpers::mLessons($lessonMenu->id) }}
						</div>
                    </div>
                </div>
			@endforeach  
            </div>
        </div>
</div>

@if(@$lastArticles->count() > 0)
<div class="widget mars-loginform-widget"><h4 class="widget-title">{{ Lang::get('include/include.lastcontent') }}</h4>

				        <div class="row" style="margin-left:10px;">
	@foreach($lastArticles as $lastArticle)
		<div  class="col-xs-12 item rowitem">
					<div class="post-header">              	         	
	                	<h3><a href="{{ URL::route('article.show',array($lastArticle->id,Helpers::seo($lastArticle->title))) }}">{{ $lastArticle->title }}</a></h3>
						<span class="post-meta"><i class="fa fa-clock-o"></i> {{ date(Lang::get('layout/layout.phpdateformat'), strtotime($lastArticle->created_at)) }}</span>
					{{ (strlen(strip_tags($lastArticle->content,'<strong><br><p>'))>100)?'<p>'.substr(strip_tags($lastArticle->content,'<strong><br><p>'),0,100).'...</p><a href="'.URL::route('article.show',array($lastArticle->id,Helpers::seo($lastArticle->title))).'" class="itemreadmore">'.Lang::get('include/include.readmore').'</a>':'<p>'.strip_tags($lastArticle->content,'<strong><br><p>').'</p>' }}
	                </div>
	       		</div>
						
		
	@endforeach
	</div>
        
</div>
@endif

@if(@$lastCalenders->count() > 0)
<div class="widget mars-loginform-widget"><h4 class="widget-title">{{ Lang::get('include/include.nextevent') }}</h4>

				        <div class="row" style="margin-left:10px;">
	@foreach($lastCalenders as $lastCalender)
		<div  class="col-xs-12 item rowitem">
					<div class="post-header">              	         	
	                	<h3><a href="{{ URL::route('calendar.show',array($lastCalender->id,Helpers::seo($lastCalender->title))) }}">{{ $lastCalender->title }}</a></h3>
						<span class="post-meta"><i class="fa fa-clock-o"></i> {{ date(Lang::get('layout/layout.phpdateformat'), strtotime($lastCalender->date)) }}</span>
					{{ (strlen(strip_tags($lastCalender->description,'<strong><br><p>'))>100)?'<p>'.substr(strip_tags($lastCalender->description,'<strong><br><p>'),0,100).'...</p><a href="'.URL::route('calendar.show',array($lastCalender->id,Helpers::seo($lastCalender->title))).'" class="itemreadmore">'.Lang::get('include/include.readmore').'</a>':'<p>'.strip_tags($lastCalender->description,'<strong><br><p>').'</p>' }}
	                </div>
	       		</div>
						
		
	
	@endforeach
	</div>
        
</div>
@endif

