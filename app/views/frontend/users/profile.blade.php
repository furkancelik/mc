@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')
	<div class="post-header">
		<h2>{{ Lang::get('users/users.profile') }}</h2>
		{{ Lang::get('users/users.welcome',array('name'=>Auth::user()->fullname)) }}
	</div>
	
	<ul>
		<li><a href="{{ URL::route('user.profile.edit') }}">{{ Lang::get('users/users.updateprofile') }}</a></li>
		<li><a href="{{ URL::route('user.createmessage') }}">{{ Lang::get('users/users.createmessage') }}</a></li>
		<li><a href="{{ URL::route('user.allmessage') }}">{{ Lang::get('users/users.postmessage',array('count'=>$messageCount)) }}</a></li>
		<li><a href="{{ URL::current() }}#okwork">{{ Lang::get('users/users.onwork') }}</a></li>
		<li><a href="{{ URL::current() }}#onwork">{{ Lang::get('users/users.okwork') }}</a></li>
		<li><a href="{{ URL::current() }}#favorite">{{ Lang::get('users/users.favoritework') }}</a></li>
		<li><a href="{{ URL::current() }}#exam">{{ Lang::get('users/users.examnote') }}</a></li>
		<li><a href="{{ URL::route('user.logout') }}">{{ Lang::get('users/users.logout') }}</a></li>
	</ul>
	
	


<div id="okwork" class="post-header">
		<h2>{{ Lang::get('users/users.menuokwork') }}</h2>
</div>
@if($workeds->count()>0)
<ul>
	@foreach($workeds as $worked)
		<li>{{ Helpers::workedLesson($worked->lessons->id) }}</li>
	@endforeach
</ul>
@else
 {{ Lang::get('users/users.notokwork') }}
@endif
	
	
	<div id="onwork" class="post-header">
		<h2>{{ Lang::get('users/users.menuonwork') }}</h2>
	</div>
@if($onworkeds->count()>0)	
	<ul>
	@foreach($onworkeds as $onworked)
		<li>{{ Helpers::workedLesson($onworked->lessons->id) }} <a class="fa fa-times-circle onworkedDel" id="{{ $onworked->id }}" href="#" title="{{ Lang::get('users/users.deleteonwork') }}"></a></li>
	@endforeach
</ul>
@else
{{ Lang::get('users/users.notonwork') }}
@endif
	
<div id="favorite" class="post-header">
		<h2>{{ Lang::get('users/users.menufavoritework') }}</h2>
	</div>
@if($favorites->count()>0)	
	<ul>
	@foreach($favorites as $favorite)
		<li>{{ Helpers::workedLesson($favorite->lessons->id) }} <a class="fa fa-times-circle favoriteDel" id="{{ $favorite->id }}" title="{{ Lang::get('users/users.deletefavoritework') }}" href="#"></a></li>
	@endforeach
</ul>
@else
	{{ Lang::get('users/users.notfavoritework') }}
@endif



<div id="exam" class="post-header">
		<h2>{{ Lang::get('users/users.menuexamnote') }}</h2>
</div>
@if($notes->count()>0)
	
	<div class="notestable">
                <table>
                    <tr>
                        <td>{{ Lang::get('users/users.tableexam') }}</td>
                        <td>{{ Lang::get('users/users.tablenote') }}</td>
                        <td>{{ Lang::get('users/users.tableinfo') }}</td>
                    </tr>
				@foreach($notes as $note)
				<tr>
					<td>{{ $note->type }}</td>
					<td>{{ $note->note }}</td>
					<td>{{ ($note->info!="")?$note->info:Lang::get('users/users.notexaminfo') }}</td>
				</tr>
				@endforeach
                </table>
           </div>
            

@else
{{ Lang::get('users/users.notexamnote') }}
@endif
	

	
	
	
@stop



@section('rightContent')
	@include('frontend.include.profile')
@stop



