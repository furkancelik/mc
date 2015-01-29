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
        <h2 class="content-header-title">Menü Düzenle</h2>
        <ol class="breadcrumb">
          <li><a href="{{ URL::route('admin.dashboard') }}">Yönetim Paneli</a></li>	
		  <li><a href="{{ URL::route('admin.menu.index') }}">Menüler</a></li>
          <li class="active">Menü Düzenle</li>
        </ol>
      </div> <!-- /.content-header -->
@stop






@section('contentContainer')

 <div class="portlet">
      
        <div class="portlet-header">
      
          <h3>
            Menü Düzenle
          </h3>
      
        </div> <!-- /.portlet-header -->
        <ul id="myTab1" class="nav nav-tabs">
        @foreach($langs as $k=>$lang)  
		  <li class="{{ ($k==0)?'active':'' }}">
              <a href="#{{ $lang->prefix }}" data-toggle="tab">{{ $lang->name }}</a>
            </li>
		@endforeach
          </ul>
          {{ Form::open(array('class'=>'form-horizontal','role'=>'form','method'=>'put','route'=>array('admin.menu.update',$veriler['en']->id))) }}
		  
		  <div id="myTab1Content" class="tab-content">
		@foreach($langs as $k=>$lang)  
            <div class="tab-pane fade{{ ($k==0)?' in active':'' }}" id="{{ $lang->prefix }}">
        <div class="portlet-content">
      
		     <div class="form-group">
              <label class="col-md-2">Üst Menü</label>
              <div class="col-md-10">
                <select id="s2_basic" class="form-control" name="top_menu[{{ $lang->prefix }}]">
				@if ($veriler[$lang->prefix]->top_menu==null)	
					<option value="" selected>Ana Menü</option>
				@else
					<option value="">Ana Menü</option>
				@endif
				@foreach($topMenus as $topMenu)
				@if ($lang->prefix==$topMenu->lang)
					@if ($veriler[$lang->prefix]->top_menu==$topMenu->id)	
						<option value="{{ $topMenu->id }}" selected>{{ $topMenu->name }}</option>
					@else
						<option value="{{ $topMenu->id }}">{{ $topMenu->name }}</option>
					@endif
				@endif
				@endforeach
              </select>
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Menü Adı</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name[{{ $lang->prefix }}]" value="{{ $veriler[$lang->prefix]->name }}" />
              </div>
            </div>
						
			<div class="form-group">
              <label class="col-md-2">Makale</label>
              <div class="col-md-10">
                <select id="s2_basic" class="form-control s2_basic" name="article_id[{{ $lang->prefix }}]">                    
					@if ($veriler[$lang->prefix]->article_id=="0")
						<option value="" selected>Menü İçeriği</option>
					@else
						<option value="">Menü İçeriği</option>
					@endif
				@foreach($articles as $article)
				@if ($lang->prefix==$article->lang)
					@if ($veriler[$lang->prefix]->article_id==$article->id)
						<option value="{{ $article->id }}" selected>{{ $article->title }}</option>
					@else
						<option value="{{ $article->id }}">{{ $article->title }}</option>
					@endif
				@endif
				@endforeach
              </select>
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-2">Menü Adresi (Link)</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="link[{{ $lang->prefix }}]" value="{{ $veriler[$lang->prefix]->link }}" />
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

	{{ HTML::script('assets/backend/js/demos/form-extended.js') }}


	
@stop