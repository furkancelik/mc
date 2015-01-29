@extends('frontend.layout.template')

@section('title')
	{{ $title }}
@stop

@section('mainContent')
	<div class="post-header">
		<h2>{{ Lang::get('users/users.message.postmessage') }}</h2>
	</div>
	
	<p><a href="{{ URL::route('user.index') }}">{{ Lang::get('users/users.profile') }}</a> | <a href="{{ URL::route('user.profile.edit') }}">{{ Lang::get('users/users.updateprofile') }}</a> | <a href="{{ URL::route('user.createmessage') }}">{{ Lang::get('users/users.createmessage') }}</a> </p>
	<br />

	
@if ($messages->count()>0)	
<div class="datagrid">
<table>
<thead>
	<tr>
		<th>{{ Lang::get('users/users.tablemessagesend') }}</th>
		<th>{{ Lang::get('users/users.tablemessagesubj') }}</th>
		<th>{{ Lang::get('users/users.tablemessageread') }}</th>
		<th>{{ Lang::get('users/users.tablemessagedate') }}</th>
		<th>{{ Lang::get('users/users.tablemessageprocess') }}</th>
	</tr>
</thead>
<tbody>	
	@foreach($messages as $k=>$message)
	@if (@$message->deletepost)
	@else
	<tr
	@if ($k%2==0) 
	 class="alt"
	@endif
	> 
		<td>{{ $message->users->fullname }}</td>
		<td><a style="color:#C00;" data-toggle="modal" class="openmessage" id="{{ $message->id }}" href="#" data-target="#openmessage">{{ $message->subject }}</a></td>
		<td>{{ ($message->readingpost)?Lang::get('users/users.okread'):Lang::get('users/users.noread') }}</td>
		<td>{{ date(Lang::get('layout/layout.phpdateformat'), strtotime($message->created_at)) }}</td>
		<td><a href="#" id="{{ $message->id }}" class="fa fa-times-circle messageDel" style="margin:0px 10px;color:#000;"></a></td>
	</tr>
	@endif
	@endforeach
</tbody>
</table>
</div>
{{ $messages->links() }}

<div class="modal fade" id="openmessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ Lang::get('users/users.close') }}</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ Lang::get('users/users.modalmessage') }}</h4>
      </div>
      <div class="modal-body">
       {{ Lang::get('users/users.loading') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ Lang::get('users/users.close') }}</button>
      </div>
    </div>
  </div>
</div>

@else
 {{ Lang::get('users/users.emptymessagebox') }}
@endif

	
	
@stop


@section('rightContent')
	@include('frontend.include.profile')
@stop



