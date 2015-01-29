@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')

<div class="post-header"><h2>{{ Lang::get('users/users.memberprocess') }}</h2></div>
<div class="post-entry">
@if (Session::has('success'))
	@if (!Session::get('success'))
	<div class="alert alert-danger"><button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
		<p>{{ Lang::get('users/users.loginerror') }}</p>
	</div>
	@else
		<div class = "alert alert-info alert-dismissable ">
			<button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
				<p>{{ Lang::get('users/users.singinsuccess') }}</p>
		</div>
	@endif
@endif


		


@if ($errors->count() > 0 )
<div class="alert alert-danger"><button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
<p><b>{{ Lang::get('users/users.errorstitle') }}</b></p>
	{{ $errors->first('username','<p>:message</p>') }}
	{{ $errors->first('fullname','<p>:message</p>') }}
	{{ $errors->first('email','<p>:message</p>') }}
	{{ $errors->first('number','<p>:message</p>') }}
	{{ $errors->first('class_id','<p>:message</p>') }}
	{{ $errors->first('password','<p>:message</p>') }}
	{{ $errors->first('password2','<p>:message</p>') }}
</div>
@endif
<div class="row">
		<div class="col-md-6">
			<h2>{{ Lang::get('users/users.login') }}</h2>
				{{ Form::open(array('method'=>'post','url'=>URL::route('user.register'))) }}
				<p>
					            		<label for="user_login">{{ Lang::get('users/users.username') }}</label>
					            		<input type="text" name="username" id="user_login" class="input form-control" />
					            	</p>
					            	<p>
					            		<label for="user_email">{{ Lang::get('users/users.fullname') }}</label>
					            		<input type="text" name="fullname" id="user_email" class="input form-control"/>
					            	</p>
									<p>
					            		<label for="user_email">{{ Lang::get('users/users.email') }}</label>
					            		<input type="text" name="email" id="user_email" class="input form-control"/>
					            	</p>
									<p>
					            		<label for="user_email">{{ Lang::get('users/users.schollnumber') }}</label>
					            		<input type="text" name="number" id="user_email" class="input form-control"/>
					            	</p>
									<p>
					            		<label for="user_email">{{ Lang::get('users/users.phone') }}</label>
					            		<input type="text" name="phone" id="user_email" class="input form-control"/>
					            	</p>
									<p>
					            		<label for="user_email">{{ Lang::get('users/users.inclass') }}</label>
					            		 <select id="" name="class_id" style="width:100%" class="s2_basic">                    
										<option value="0">{{ Lang::get('users/users.notclass') }}</option>
										@foreach($classes as $class)
				  				  			<option value="{{ $class->id }}">{{ $class->name }}</option>
										@endforeach
				  				  				 </select>
					            	</p>
					            	<p>
					            		<label for="user_pass1">{{ Lang::get('users/users.password') }}</label>
					            		<input type="password" name="password" id="user_pass1" class="input form-control"/>
					            	</p>
					            	<p>
					            		<label for="user_pass2">{{ Lang::get('users/users.repassword') }}</label>
					            		<input type="password" name="password2" id="user_pass2" class="input form-control"/>
										
					            	</p><input type="submit" value="{{ Lang::get('users/users.loginbutton') }}" id="register" />
									<input type="hidden" name="islem" value="üyeol" />
					            {{ Form::close() }}
							</div>

	
	<div class="col-md-6">
		<h2>{{ Lang::get('users/users.singin') }}</h2>
			{{ Form::open(array('id'=>'vt_loginform','method'=>'post','url'=>URL::route('user.postLogin'))) }}
				<p class="login-username">
					<label for="user_login">{{ Lang::get('users/users.singuser') }}</label>
					<input type="text" name="user" id="user" class="input" value="" size="20" />
				</p>
				<p class="login-password">
					<label for="user_pass">{{ Lang::get('users/users.singpassword') }}</label>
					<input type="password" name="password" id="user_pass" class="input" value="" size="20" />
				</p>
				<p class="login-remember"><label><input name="remember" type="checkbox" id="remember" value="forever" /> {{ Lang::get('users/users.singremember') }}</label></p>
				<p class="login-submit">
					<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="{{ Lang::get('users/users.singinbutton') }}" />
				</p>
			</form>
			{{ Form::close() }}
		</div>
								</div>
</div>
              
@stop


@section('rightContent')
	@include('frontend.include.profile')
@stop