@extends('backend.layout.template')

@section('title')
{{ $title }}
@stop


@section('contentHeader')
      <div class="content-header">
        <h2 class="content-header-title">Yönetim Paneli</h2>
        <ol class="breadcrumb">
          <li class="active">Yönetim Paneli</li>
        </ol>
      </div> <!-- /.content-header -->
@stop






@section('contentContainer')

<div class="col-md-12">


          <div class="portlet">

            <div class="portlet-header">

              <h3>
               Hızlı Menü
              </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content">
<style type="text/css">
.btn-new {background:#16A085;color:#fff;width:138px;height:80px;padding:15px;margin:15px;}
.btn-new:hover { opacity:0.8; color:#fff;  }
</style>
              <p>
				<a href="{{ URL::route('admin.categories.index') }}" class="btn btn-new"><i class="fa fa-align-justify" style="font-size:30px;"></i><br />Ders Kategorisi </a>
				<a href="{{ URL::route('admin.contents.index') }}" class="btn btn-new"><i class="fa fa-file-o" style="font-size:30px;"></i><br />&nbsp;&nbsp;Ders İçeriği&nbsp;&nbsp;</a>
				<a href="{{ URL::route('admin.lesson.create') }}" class="btn btn-new"><i class="fa fa-pencil" style="font-size:30px;"></i><br />Yeni Ders Ekle</a>
				<a href="{{ URL::route('admin.classes.index') }}" class="btn btn-new"><i class="fa fa-tags" style="font-size:30px;"></i><br />&nbsp;&nbsp;&nbsp;Sınıflar&nbsp;&nbsp;&nbsp;</a>
				<a href="{{ URL::route('admin.users') }}" class="btn btn-new"><i class="fa fa-users" style="font-size:30px;"></i><br />&nbsp;&nbsp;Öğrenciler&nbsp;&nbsp;</a>
				<a href="{{ URL::route('admin.notes.index') }}" class="btn btn-new"><i class="fa fa-inbox" style="font-size:30px;"></i><br />Sınav Notları</a>
				<a href="{{ URL::route('admin.article.create') }}" class="btn btn-new"><i class="fa fa-paperclip" style="font-size:30px;"></i><br />&nbsp;&nbsp;Yeni Makale&nbsp;&nbsp;</a>
				<a href="{{ URL::route('admin.menu.create') }}" class="btn btn-new"><i class="fa fa-list" style="font-size:30px;"></i><br />&nbsp;&nbsp;Yeni Menü&nbsp;&nbsp;</a>
				<a href="{{ URL::route('admin.worked.index') }}" class="btn btn-new"><i class="fa fa-pencil-square-o" style="font-size:30px;"></i><br />Çalışılan Dersler</a>
				<a href="{{ URL::route('admin.calendar.index') }}" class="btn btn-new"><i class="fa fa-calendar" style="font-size:30px;"></i><br />Etkinlikler</a>
				<a href="{{ URL::route('admin.post.index') }}" class="btn btn-new"><i class="fa fa-comments-o" style="font-size:30px;"></i><br />Mesajlar</a>
				<a target="_blank" href="{{ URL::route('index') }}" class="btn btn-new"><i class="fa fa-globe" style="font-size:30px;"></i><br />Siteye Bak</a>			  
			  </p>

            </div> <!-- /.portlet-content -->

          </div> <!-- /.portlet -->

    
        </div> <!-- /col-md -->

@stop


@section('footer')
	<!-- Plugin JS -->
	{{ HTML::script('assets/backend/js/plugins/datatables/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/backend/js/plugins/datatables/DT_bootstrap.js') }}
	{{ HTML::script('assets/backend/js/plugins/tableCheckable/jquery.tableCheckable.js') }}
	{{ HTML::script('assets/backend/js/plugins/icheck/jquery.icheck.min.js') }}
@stop