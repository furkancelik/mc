@extends('backend.layout.template')

@section('pulginCss')
  <!-- Plugin CSS -->
  {{ HTML::style('assets/backend/js/plugins/icheck/skins/minimal/blue.css') }}
  {{ HTML::style('assets/backend/js/plugins/select2/select2.css') }}
  {{ HTML::style('assets/backend/js/plugins/datepicker/datepicker.css') }}
  {{ HTML::style('assets/backend/js/plugins/simplecolorpicker/jquery.simplecolorpicker.css') }}
  {{ HTML::style('assets/backend/js/plugins/timepicker/bootstrap-timepicker.css') }}
  {{ HTML::style('assets/backend/js/plugins/fileupload/bootstrap-fileupload.css') }}
@stop


@section('title')
{{ $title }}
@stop


@section('contentHeader')
      <div class="content-header">
        <h2 class="content-header-title">Mesaj Oku</h2>
        <ol class="breadcrumb">
          <li><a href="{{ URL::route('admin.dashboard') }}">Yönetim Paneli</a></li>	
		  <li><a href="{{ URL::route('admin.post.index') }}">Mesajlar</a></li>
          <li class="active">Mesaj Oku</li>
        </ol>
      </div> <!-- /.content-header -->
@stop






@section('contentContainer')

 <div class="portlet">
      
        <div class="portlet-header">
      
          <h3>
            Mesaj Oku
          </h3>
      
        </div> <!-- /.portlet-header -->
      
        <div class="portlet-content">
		@if($user_id==$veriler->user_id)
			 {{ Form::open(array('class'=>'form-horizontal','role'=>'form')) }}
		   <div class="form-group">
              <label class="col-md-2">Gönderilen Kişi</label>
              <div class="col-md-10">
                @if (isset($veriler->send))
					{{ $veriler->send->fullname }}
				@elseif(isset($veriler->classes))
					{{ $veriler->classes->name }} Sınıfına Üyelere
				@else
					Tüm Üyelere
				@endif	
              </div>
            </div>

					
			<div class="form-group">
              <label class="col-md-2">Konu</label>
              <div class="col-md-10">
                {{ $veriler->subject }}
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Mesaj</label>
              <div class="col-md-10">
                {{ $veriler->message }}
              </div>
            </div>
			<div class="form-group" style="float:right; margin-right:0px;">
			   <a href="javascript:history.go(-1)" class="btn btn-primary">Geri Dön</a>
             </div>
			{{ Form::close() }}
		@else
			{{ Form::open(array('class'=>'form-horizontal','role'=>'form','method'=>'put','route'=>array('admin.post.update',$veriler->id))) }}
		   <div class="form-group">
              <label class="col-md-2">Kimden Geldi</label>
              <div class="col-md-10">
                {{ $veriler->users->fullname }}
              </div>
            </div>
								
			<div class="form-group">
              <label class="col-md-2">Konu</label>
              <div class="col-md-10">
                {{ $veriler->subject }}
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Mesaj</label>
              <div class="col-md-10">
                {{ $veriler->message }}
              </div>
            </div>
			
			<div class="form-group" style="float:right; margin-right:0px;">
			   <a href="javascript:history.go(-1)" class="btn btn-primary">Geri Dön</a>
				@if ($veriler->reading==0)
				<input type="hidden" value="1" name="reading" />
				<input type="submit" class="btn btn-primary" value="Okundu Olarak İşaretle" />
				@else
				<input type="hidden" value="0" name="reading" />
				<input type="submit" class="btn btn-primary" value="Okunmadı Olarak İşaretle" />
				@endif
             </div>
			
			{{ Form::close() }} 
		@endif

         
      
        </div> <!-- /.portlet-content -->
      
      </div> <!-- /.portlet -->


@stop


@section('footer')
	<!-- Plugin JS -->
	
	{{ HTML::script('assets/backend/js/plugins/icheck/jquery.icheck.js') }}
	{{ HTML::script('assets/backend/js/plugins/select2/select2.js') }}
	{{ HTML::script('assets/backend/js/plugins/datepicker/bootstrap-datepicker.js') }}
	{{ HTML::script('assets/backend/js/plugins/timepicker/bootstrap-timepicker.js') }}
	{{ HTML::script('assets/backend/js/plugins/simplecolorpicker/jquery.simplecolorpicker.js') }}
	{{ HTML::script('assets/backend/js/plugins/autosize/jquery.autosize.min.js') }}
	{{ HTML::script('assets/backend/js/plugins/textarea-counter/jquery.textarea-counter.js') }}
	{{ HTML::script('assets/backend/js/plugins/fileupload/bootstrap-fileupload.js') }}
	{{ HTML::script('assets/backend/js/plugins/datatables/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/backend/js/plugins/datatables/DT_bootstrap.js') }}
	{{ HTML::script('assets/backend/js/plugins/tableCheckable/jquery.tableCheckable.js') }}
	
	
	{{ HTML::script('ckeditor/ckeditor.js') }}
	

	{{ HTML::script('assets/backend/js/demos/form-extended.js') }}
	
	
@stop