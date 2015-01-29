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
        <h2 class="content-header-title">Yeni Yazılı Notu Ekle</h2>
        <ol class="breadcrumb">
          <li><a href="{{ URL::route('admin.dashboard') }}">Yönetim Paneli</a></li>	
		  <li><a href="{{ URL::route('admin.notes.index') }}">Notlar</a></li>
          <li class="active">Yeni Yazılı Notu Ekle</li>
        </ol>
      </div> <!-- /.content-header -->
@stop






@section('contentContainer')

 <div class="portlet">
      
        <div class="portlet-header">
      
          <h3>
            Yeni Yazılı Notu Ekle
          </h3>
      
        </div> <!-- /.portlet-header -->
      
        <div class="portlet-content">
      

          {{ Form::open(array('route'=>'admin.notes.store','class'=>'form-horizontal','role'=>'form','method'=>'post')) }}		
		<div class="form-group">
              <label class="col-md-2">Öğrenci</label>
              <div class="col-md-10">
               <select id="s2_basic" name="user_id" class="form-control">                    
                  <option value="0" selected>Öğrenci Seçiniz</option>
				  @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->fullname }}</option>
				  @endforeach
				 </select>
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Yazılı Tipi</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="type" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Yazılı Notu</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="note" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Açıklama</label>
              <div class="col-md-10">
                <textarea class="form-control" name="info"></textarea>
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