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
        <h2 class="content-header-title">Yeni Mesaj Gönder</h2>
        <ol class="breadcrumb">
          <li><a href="{{ URL::route('admin.dashboard') }}">Yönetim Paneli</a></li>	
		  <li><a href="{{ URL::route('admin.post.index') }}">Mesajlar</a></li>
          <li class="active">Yeni Mesaj Gönder</li>
        </ol>
      </div> <!-- /.content-header -->
@stop






@section('contentContainer')

 <div class="portlet">
      
        <div class="portlet-header">
      
          <h3>
            Yeni Mesaj Gönder
          </h3>
      
        </div> <!-- /.portlet-header -->
      
        <div class="portlet-content">
      

          {{ Form::open(array('route'=>'admin.post.store','class'=>'form-horizontal','role'=>'form','method'=>'post')) }}
			<div class="form-group">
              <label class="col-md-2">Gideceği Kişi</label>
              <div class="col-md-10">
                <select id="s2_basic" name="send_id" class="form-control">
                  <option value="0" selected>Hepsine Gönder</option>
				  @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->fullname }}</option>
				  @endforeach
				 </select>
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Sınıftaki Kişilere Gönder</label>
              <div class="col-md-10">
                <select id="s2_basic" name="send_id" class="form-control">
                  <option value="0" selected>Sınıf Seçiniz</option>
				  @foreach($classes as $class)
                  <option value="{{ $class->id }}">{{ $class->name }}</option>
				  @endforeach
				 </select>
              </div>
            </div>
					
			<div class="form-group">
              <label class="col-md-2">Konu</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="subject" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Mesaj</label>
              <div class="col-md-10">
                <textarea class="ckeditor" name="message"></textarea>
              </div>
            </div>
			
			
			<div class="form-group" style="float:right; margin-right:0px;">
			   <a href="javascript:history.go(-1)" class="btn btn-primary">İptal Et</a>
			   <input type="submit" class="btn btn-primary" value="Kaydet" />
             </div>
			
			{{ Form::close() }}
      
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
	
	{{ HTML::script('ckeditor/ckeditor.js') }}
	

	{{ HTML::script('assets/backend/js/demos/form-extended.js') }}
	
	
@stop