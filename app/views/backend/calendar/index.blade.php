@extends('backend.layout.template')

@section('title')
{{ $title }}
@stop


@section('contentHeader')
      <div class="content-header">
        <h2 class="content-header-title">Kayıtlı Etkinlikler</h2>
        <ol class="breadcrumb">
          <li><a href="{{ URL::route('admin.dashboard') }}">Yönetim Paneli</a></li>
          <li class="active">Etkinlikler</li>
        </ol>
      </div> <!-- /.content-header -->
@stop






@section('contentContainer')


 <div class="row">

        <div class="col-md-12">

          <div class="portlet">

            <div class="portlet-header">

              <h3>
                Kayıtlı Etkinlikler
              </h3>
				<a href="{{ URL::route('admin.calendar.create') }}" class="btn btn-primary btn-sm" style="float:right;margin:5px;">Yeni Ekle</a>
            </div> <!-- /.portlet-header -->

            <div class="portlet-content">           

              <div class="table-responsive">
              <table 
                class="table table-striped table-bordered table-hover" 
                data-provide="datatable" 
                data-display-rows="10"
                data-paginate="true"
                data-info="true">
                  <thead>
                    <tr>
                      <th data-filterable="true">Etkinlik Başlığı</th>
					  <th data-filterable="true">Etkinlik Tarihi</th>
					  <th data-filterable="true">Link</th>
					  <th data-filterable="false" class="hidden-xs hidden-sm">İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($veriler as $veri)
				   <tr >
						<td>{{ $veri->title }}</td>
						<td>{{ $veri->date }}</td>
						<td>{{ $veri->link }}</td>
						<td class="hidden-xs hidden-sm">
							{{ Form::open(array('method'=>'delete','route'=>array('admin.calendar.destroy',$veri->id))); }}
							<a style="margin:5px;" title="Düzenle" href="{{ URL::route('admin.calendar.show',$veri->id) }}"><i class="fa fa-pencil-square-o"></i></a>
							<button title="Sil" type="submit" style="background:none;color:#428BCA;border:0px;"><i class="fa fa-trash-o"></i></button>					
							{{ Form::close(); }}
						</td>
                    </tr>
					@endforeach
                   
                  </tbody>
                </table>
              </div> <!-- /.table-responsive -->
              

            </div> <!-- /.portlet-content -->

          </div> <!-- /.portlet -->

        

        </div> <!-- /.col -->

      </div> <!-- /.row -->




@stop


@section('footer')
	<!-- Plugin JS -->
	{{ HTML::script('assets/backend/js/plugins/datatables/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/backend/js/plugins/datatables/DT_bootstrap.js') }}
	{{ HTML::script('assets/backend/js/plugins/tableCheckable/jquery.tableCheckable.js') }}
	{{ HTML::script('assets/backend/js/plugins/icheck/jquery.icheck.min.js') }}
@stop