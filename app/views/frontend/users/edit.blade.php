@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')
	<div class="post-header">
		<h2>{{ Lang::get('users/users.updateprofile') }}</h2>
	</div>
	<p><a href="{{ URL::route('user.index') }}">{{ Lang::get('users/users.profile') }}</a> | <a href="{{ URL::route('user.createmessage') }}">{{ Lang::get('users/users.createmessage')	}}</a> | <a href="{{ URL::route('user.allmessage') }}">{{ Lang::get('users/users.postmessage2') }}</a></p>
	<br />
	
@if (Session::has('success'))
	@if (Session::get('success'))
		<div class = "alert alert-info alert-dismissable ">
			<button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
				<p>{{ Lang::get('users/users.successupdateprofile') }}</p>
				<meta http-equiv="refresh" content="1;url={{ URL::route('user.profile') }}" /> 
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
	{{ $errors->first('password2','<p>:message</p>') }}
	{{ $errors->first('password','<p>:message</p>') }}
</div>
@endif
	
	<div class="post-entry">
                    		<div class="wppb_holder" id="wppb_modify">
	
			{{ Form::open(array('method'=>'POST','action'=>'user.profile.update','id'=>'edituser','class'=>'user-forms')) }}
						<p class="username">
								<label for="user_login">{{ Lang::get('users/users.username') }}</label>
								<input class="text-input form-control" name="username" id="user_login" value="{{ $profiles->username }}" type="text"> 
								
							</p><!-- .first_name -->
						<p class="first_name">
							<label for="first_name">{{ Lang::get('users/users.fullname') }}</label>
							<input class="text-input form-control" name="fullname" id="first_name" value="{{ $profiles->fullname }}" type="text">
						</p><!-- .first_name -->
						<p class="last_name">
							<label for="last_name">{{ Lang::get('users/users.email') }}</label>
							<input class="text-input form-control" name="email" id="last_name" value="{{ $profiles->email }}" type="text">
						</p><!-- .last_name -->
						<p class="nickname">
							<label for="nickname">{{ Lang::get('users/users.schollnumber') }}</label>
							<input class="text-input form-control" name="number" id="nickname" value="{{ $profiles->number }}" type="text">
						</p><!-- .nickname -->
						<p class="display_name">
							<label for="display_name">{{ Lang::get('users/users.phone') }}</label>
							<input class="text-input form-control" name="phone" id="nickname" value="{{ $profiles->phone }}" type="text">
						</p>
							<p class="form-email">
								<label for="email">{{ Lang::get('users/users.inclass') }}</label>
								<select id="" name="class_id" style="padding:0px;border:0px none;width:60%" class="s2_basic">                    
									@if ($profiles->class_id==0)
									<option value="0" selected>{{ Lang::get('users/users.notclass') }}</option>
									@else
									<option value="0" selected>{{ Lang::get('users/users.notclass') }}</option>
									@endif
									
									@foreach($classes as $class)
										@if ($profiles->class_id==$class->id)
				  				  		<option value="{{ $class->id }}" selected>{{ $class->name }}</option>
										@else
										<option value="{{ $class->id }}">{{ $class->name }}</option>
										@endif
									@endforeach
				  				  </select>
							</p><!-- .form-email -->
						<p class="form-website">
							<label for="website">{{ Lang::get('users/users.password') }}</label>
							<input class="text-input form-control" name="password" id="website" value="" type="password">
						</p><!-- .form-website -->
						<p class="form-aim">
							<label for="aim">{{ Lang::get('users/users.repassword') }}</label>
							<input class="text-input form-control" name="password2" id="aim" value="" type="password">
						</p><!-- .form-aim -->
									
				<p class="form-submit">
										<input name="updateuser" id="updateuser" class="submit button btn btn-default" value="{{ Lang::get('users/users.updateprofilebutton') }}" type="submit" />
										<a href="javascript:history.go(-1)" id="updateuser" class="submit button btn btn-default">{{ Lang::get('users/users.updatecancelprofile') }}</a>
				</p><!-- .form-submit -->
				{{ Form::close() }}
			
			
	</div>	
	

                    </div>
	
	
	
	
	
	
@stop


@section('rightContent')
	@include('frontend.include.profile')
@stop



