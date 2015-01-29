@extends('backend.layout.template')

@section('title')
{{ $title }}
@stop


@section('contentHeader')
      <div class="content-header">
        <h2 class="content-header-title">Kayıtlı Kullanıcılar</h2>
        <ol class="breadcrumb">
          <li><a href="{{ URL::route('admin.dashboard') }}">Yönetim Paneli</a></li>	
          <li class="active">Kullanıcılar</li>
        </ol>
      </div> <!-- /.content-header -->
@stop






@section('contentContainer')


 <div class="row">

        <div class="col-md-12">

          <div class="portlet">

            <div class="portlet-header">

              <h3>
                Kayıtlı Kullanıcılar
              </h3>

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
                      <th data-filterable="true">Ad Soyad</th>
                      <th data-direction="asc" data-filterable="true">Kullanıcı Adı</th>
                      <th data-filterable="true">Sınıfı</th>
					  <th data-filterable="true">Numarası</th>
					  <th data-filterable="true">Telefon Numarası</th>
                      <th data-filterable="true" class="hidden-xs hidden-sm">E-Posta Adresi</th>
					  <th data-filterable="false" class="hidden-xs hidden-sm">İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($veriler as $veri)
				   <tr >
						<td>{{ $veri->fullname }}</td>
						<td>{{ $veri->username }}</td>
						<td>{{ (@$veri->classes->name)?:'Sınıf Yok' }}</td>
						<td>{{ $veri->number }}</td>
						<td>{{ $veri->phone }}</td>
						<td class="hidden-xs hidden-sm">{{ $veri->email }}</td>
						<td class="hidden-xs hidden-sm">
							<a style="margin:5px;" title="Düzenle" href="{{ URL::route('admin.users.show',$veri->id) }}"><i class="fa fa-pencil-square-o"></i></a>
							<a style="margin:5px;" title="Sil" href="{{ URL::route('admin.users.delete',$veri->id) }}"><i class="fa fa-trash-o"></i></a>
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