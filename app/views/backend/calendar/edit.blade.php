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
        <h2 class="content-header-title">Etkinlik Düzenle</h2>
        <ol class="breadcrumb">
          <li><a href="{{ URL::route('admin.dashboard') }}">Yönetim Paneli</a></li>
		  <li><a href="{{ URL::route('admin.calendar.index') }}">Etkinlikler</a></li>
          <li class="active">Etkinlik Düzenle</li>
        </ol>
      </div> <!-- /.content-header -->
@stop






@section('contentContainer')

 <div class="portlet">
      
        <div class="portlet-header">
      
          <h3>
            Etkinlik Düzenle
          </h3>
      
        </div> <!-- /.portlet-header -->
		
		<ul id="myTab1" class="nav nav-tabs">
        @foreach($langs as $k=>$lang)  
		  <li class="{{ ($k==0)?'active':'' }}">
              <a href="#{{ $lang->prefix }}" data-toggle="tab">{{ $lang->name }}</a>
            </li>
		@endforeach
          </ul>
		  {{ Form::open(array('class'=>'form-horizontal','role'=>'form','method'=>'put','route'=>array('admin.calendar.update',$veriler['en']->id))) }}

		  <div id="myTab1Content" class="tab-content">
		@foreach($langs as $k=>$lang)  
            <div class="tab-pane fade{{ ($k==0)?' in active':'' }}" id="{{ $lang->prefix }}">
      
        <div class="portlet-content">
      

		    <div class="form-group">
              <label class="col-md-2">Etkinlik Başlığı</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="title[{{ $lang->prefix }}]" value="{{ $veriler[$lang->prefix]->title }}" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Etkinlik Zamanı</label>
              <div class="col-md-10">
               <div class="input-group date dp-ex-1" data-date-format="yyyy-mm-dd 23:59:00.000000" data-date-autoclose="true">
                    <input class="form-control" type="text" name="date[{{ $lang->prefix }}]" value="{{ $veriler[$lang->prefix]->date }}" />
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Etkinlik Adresi (Link)</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="link[{{ $lang->prefix }}]" value="{{ $veriler[$lang->prefix]->link }}" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Etkinlik Açıklaması</label>
              <div class="col-md-10">
                <textarea class="ckeditor" name="description[{{ $lang->prefix }}]">{{ $veriler[$lang->prefix]->description }}</textarea>
              </div>
            </div>

             <div class="form-group" style="float:right; margin-right:0px;">
			   <a href="javascript:history.go(-1)" class="btn btn-primary">İptal Et</a>
			   <input type="submit" class="btn btn-primary" value="Düzenle" />
             </div>
			
      
        </div> <!-- /.portlet-content -->
       </div>
		@endforeach
          </div>
					{{ Form::close() }}
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