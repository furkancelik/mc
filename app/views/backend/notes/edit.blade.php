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
        <h2 class="content-header-title">Yazılı Notu Düzenle</h2>
        <ol class="breadcrumb">
		  <li><a href="{{ URL::route('admin.dashboard') }}">Yönetim Paneli</a></li>	
		  <li><a href="{{ URL::route('admin.notes.index') }}">Notlar</a></li>
          <li class="active">Yazılı Notu Düzenle</li>
        </ol>
      </div> <!-- /.content-header -->
@stop






@section('contentContainer')

 <div class="portlet">
      
        <div class="portlet-header">
      
          <h3>
            Yazılı Notu Düzenle
          </h3>
      
        </div> <!-- /.portlet-header -->
      
        <div class="portlet-content">
      

          {{ Form::open(array('class'=>'form-horizontal','role'=>'form','method'=>'put','route'=>array('admin.notes.update',$veriler->id))) }}
		   <div class="form-group">
              <label class="col-md-2">Öğrenci</label>
              <div class="col-md-10">
               <select id="s2_basic" name="user_id" class="form-control">
					@if ($veriler->user_id==0)
						<option value="0" selected>Öğrenci Seçiniz</option>
					@else
						<option value="0">Öğrenci Seçiniz</option>
					@endif
				  @foreach($users as $user)
						@if ($user->id == $veriler->user_id)
							<option value="{{ $user->id }}" selected>{{ $user->fullname }}</option>
						@else
							<option value="{{ $user->id }}">{{ $user->fullname }}</option>
						@endif
				  @endforeach
				 </select>
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Yazılı Tipi</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="type" value="{{ $veriler->type }}" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Yazılı Notu</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="note" value="{{ $veriler->note }}" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Açıklama</label>
              <div class="col-md-10">
                <textarea class="form-control" name="info">{{ $veriler->info }}</textarea>
              </div>
            </div>

             <div class="form-group" style="float:right; margin-right:0px;">
			   <a href="javascript:history.go(-1)" class="btn btn-primary">İptal Et</a>
			   <input type="submit" class="btn btn-primary" value="Düzenle" />
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
	{{ HTML::script('assets/backend/js/plugins/datatables/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/backend/js/plugins/datatables/DT_bootstrap.js') }}
	{{ HTML::script('assets/backend/js/plugins/tableCheckable/jquery.tableCheckable.js') }}
	
	
	{{ HTML::script('ckeditor/ckeditor.js') }}
	

	{{ HTML::script('assets/backend/js/demos/form-extended.js') }}
	
	
@stop