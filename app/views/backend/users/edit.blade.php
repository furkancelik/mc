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
        <h2 class="content-header-title">Kullanıcı Düzenle</h2>
        <ol class="breadcrumb">
          <li><a href="{{ URL::route('admin.dashboard') }}">Yönetim Paneli</a></li>	
		  <li><a href="{{ URL::route('admin.users') }}">Kullanıcılar</a></li>
          <li class="active">Kullanıcı Düzenle</li>
        </ol>
      </div> <!-- /.content-header -->
@stop






@section('contentContainer')

 <div class="portlet">
      
        <div class="portlet-header">
      
          <h3>
            Kullanıcı Düzenle
          </h3>
      
        </div> <!-- /.portlet-header -->
      
        <div class="portlet-content">
      

          {{ Form::open(array('class'=>'form-horizontal','role'=>'form','method'=>'post','route'=>array('admin.users.edit',$veriler->id))) }}
		    <div class="form-group">
              <label class="col-md-2">Kullanıcı Adı</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="username" value="{{ $veriler->username }}" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Ad Soyad</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="fullname" value="{{ $veriler->fullname }}" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">E-Mail Adresi</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="email" value="{{ $veriler->email }}" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Telefon Numarası</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="phone" value="{{ $veriler->phone }}" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Numarası</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="number" value="{{ $veriler->number }}" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Sınıfı</label>
              <div class="col-md-10">
               <select id="s2_basic" name="class_id" class="form-control">                    
                  @if ($veriler->class_id==0)
					<option value="0" selected>Sınıf Yok</option>
				  @else
					<option value="0">Sınıf Yok</option>
				  @endif				  
				  @foreach($classes as $class)
				  @if ($veriler->class_id==$class->id)
					<option value="{{ $class->id }}" selected>{{ $class->name }}</option>
				  @else
					<option value="{{ $class->id }}">{{ $class->name }}</option>
				  @endif
				  @endforeach
				 </select>
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Şifresi</label>
              <div class="col-md-10">
                <input type="password" class="form-control" name="password" value="" />
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