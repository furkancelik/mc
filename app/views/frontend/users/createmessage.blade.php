@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')
	<div class="post-header">
		<h2>{{ Lang::get('users/users.createnewmessage') }}</h2>
	</div>
	<p><a href="{{ URL::route('user.index') }}">{{ Lang::get('users/users.profile') }}</a> | <a href="{{ URL::route('user.profile.edit') }}">{{ Lang::get('users/users.updateprofile') }}</a> | <a href="{{ URL::route('user.allmessage') }}">{{ Lang::get('users/users.postmessage2') }}</a> </p>
	<br />
	
@if (Session::has('success'))
	@if (Session::get('success'))
		<div class = "alert alert-info alert-dismissable ">
			<button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
				<p>{{ Lang::get('users/users.successsendmessage') }}</p>
				<meta http-equiv="refresh" content="1;url={{ URL::route('user.profile') }}" /> 
		</div>
	@endif
@endif

@if ($errors->count() > 0 )
<div class="alert alert-danger"><button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
<p><b>{{ Lang::get('users/users.errorstitle') }}</b></p>
	{{ $errors->first('send_id','<p>:message</p>') }}
	{{ $errors->first('subject','<p>:message</p>') }}
	{{ $errors->first('message','<p>:message</p>') }}
</div>
@endif
	

	
	<div class="post-entry">
                    		<div class="wppb_holder" id="wppb_modify">
	
			{{ Form::open(array('method'=>'POST','action'=>'user.message.create','id'=>'edituser','class'=>'user-forms')) }}
						<p class="username">
								<label for="user_login">{{ Lang::get('users/users.sendmessage') }}</label>
								<select id="" name="send_id" style="padding:0px;border:0px none;width:60%" class="s2_basic">                    
									<option value="0" selected>{{ Lang::get('users/users.sendmessage2') }}</option>
									@foreach($users as $user)
				  				  		<option value="{{ $user->id }}">{{ $user->fullname }}</option>
									@endforeach
				  				  </select>
							</p><!-- .first_name -->
						<p class="first_name">
							<label for="first_name">{{ Lang::get('users/users.messagesubject') }}</label>
							<input class="text-input form-control" name="subject" id="first_name" type="text">
						</p><!-- .first_name -->
						<p class="last_name">
							<label for="last_name">{{ Lang::get('users/users.messagecontent') }}</label>
							<textarea class="text-input form-control" name="message"></textarea>
						</p><!-- .last_name -->
									
				<p class="form-submit" style="text-align:right;padding-right:10%;">
										<input name="updateuser" id="updateuser" class="submit button btn btn-default" value="{{ Lang::get('users/users.messagesendbutton') }}" type="submit" />
										<a href="javascript:history.go(-1)" id="updateuser" class="submit button btn btn-default">{{ Lang::get('users/users.messagesendcancel') }}</a>
				</p><!-- .form-submit -->
			{{ Form::close() }}
			
			
	</div>	
	

                    </div>
	
	
	
	
	
	
@stop


@section('rightContent')
	@include('frontend.include.profile')
@stop



