@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Data Master Tps</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item" aria-current="page">Data Master</li>
							<li class="breadcrumb-item active" aria-current="page">Tps</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	  

    <!-- Main content -->
    <section class="content">
      <div class="row">
		  
		<div class="col-12">
         
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Tps</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        Tambah Tps
                    </button> 
                </div>
                <br/>
                <div class="row">
                    <div class="table-responsive">
                        <table id="tps" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Kabupaten</th>
                                    <th>Nama Kecamatan</th>
                                    <th>Nama Desa</th>
                                    <th>Nama Tps</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->      
        </div>  
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

<form method="post" id="form">
    @csrf
    <!-- modal Area -->              
    <div class="modal fade" id="myModal">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Form Tps</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Nama Desa</label>
                            <select class="form-control select2" id="id_desa" name="id_desa" style="width: 100%;">
                                @foreach ($desa as $value)
                                    <option value="{{ $value->id }}">{{ $value->nm_desa }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Club">Nama Tps:</label>
                        <input type="text" id="nm_tps" name="nm_tps" class="form-control" >
                        <span class="text-danger">
                            <strong id="nm_tps-error"></strong>
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary float-right actionBtn" id="ajaxSubmit">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>
<!-- /.modal -->

<form method="post" id="formEdit">
    @csrf
    <!-- modal Area -->              
    <div class="modal fade" id="myModalEdit">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Form Tps</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Nama Desa</label>
                            <select class="form-control select2" id="iddesa" name="iddesa" style="width: 100%;">
                                @foreach ($desa as $value)
                                    <option value="{{ $value->id }}">{{ $value->nm_desa }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" id="id" name="id" value="{{ old('id') }}" class="form-control" >
                    <div class="form-group col-md-12">
                        <label for="Club">Nama Tps:</label>
                        <input type="text" id="namatps" name="namatps" class="form-control" >
                        <span class="text-danger">
                            <strong id="tps-error"></strong>
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary float-right actionBtn" id="editSubmit">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>
<!-- /.modal -->

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();

            var tabel = $('#tps').DataTable( {
                "ajax": "{{ route('gettps') }}",
                "columns": [
                    { "data": "nm_kabupaten" },
                    { "data": "nm_kecamatan" },
                    { "data": "nm_desa" },
                    { "data": "nm_tps" },
                    {
                        "mRender": function(data, type, row){
                            var tampil = "";
                            tampil += '<button class="edit-modal btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>';
                            tampil += '&nbsp;<button class="delete-modal btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>';
                            return tampil;
                        }
                    }
                ]
            } );
        } );

        // add function
        $("#ajaxSubmit").click(function() {
            var tpsForm = $("#form");
            var formData = tpsForm.serialize();
            $( '#nm_tps-error' ).html( "" );

            $.ajax({
                type: "post",
                url: "{{ route('createTps') }}",
                data: formData,
                success: function(data) {
                    if(data.errorsvalidation) {
                        if(data.errorsvalidation.nm_tps){
                            $( '#nm_tps-error' ).html( data.errorsvalidation.nm_tps[0] );
                        }
                    }else if(data.success) {
                        $('#tps').DataTable().ajax.reload();
                        $('#nm_tps').val('');
                        $('#myModal').modal('hide');
                        swal("Sukses", "Berhasil Menambahkan Data Tps", "success");
                    }else if(data.errors) {
                        swal("Gagal", "Gagal Menambahkan Data Tps", "error");
                    }
                },
            });
        });

        // edit function
        $("#editSubmit").click(function() {
            var tpsForm = $("#formEdit");
            var formData = tpsForm.serialize();
            $( '#tps-error' ).html( "" );

            $.ajax({
                type: "post",
                url: "{{ route('editTps') }}",
                data: formData,
                success: function(data) {
                    if(data.errorsvalidation) {
                        if(data.errorsvalidation.namatps){
                            $( '#tps-error' ).html( data.errorsvalidation.namatps[0] );
                        }
                    }else if(data.success) {
                        $('#tps').DataTable().ajax.reload();
                        $('#myModalEdit').modal('hide');
                        swal("Sukses", "Berhasil Melakukan Perubahan Data Tps", "success");
                    }else if(data.errors) {
                        swal("Gagal", "Gagal Melakukan Edit Data Tps", "error");
                    }
                },
            });
        });

        $(document).on('click', '.edit-modal', function() {
            var data = $('#tps').DataTable().row( $(this).parents('tr') ).data();
            $('#id').val(data['id']);
            $('#namatps').val(data['nm_tps']);
            // $("#idkec option[value=15]").prop("selected",true);
            $('#iddesa').val(data['id_desa']).trigger('change');  
            $('#myModalEdit').modal('show');
        });

        $(document).on('click', '.delete-modal', function() {
            var data = $('#tps').DataTable().row( $(this).parents('tr') ).data();
            swal({   
                title: "Hapus Data Tps?",   
                text: "Apakah Anda Yakin Menghapus Data Tps Ini!",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes",   
                cancelButtonText: "No",   
                closeOnConfirm: false,   
                closeOnCancel: true 
            }, function(isConfirm){   
                if (isConfirm) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "{{ route('deleteTps') }}",
                        data: {'id':data['id']},
                        success: function(data) {
                            if(data.errors) {
                                swal("Gagal!", "Data Tps Gagal Di Hapus.", "error");   
                            }else if(data.success) {
                                $('#tps').DataTable().ajax.reload();
                                swal("Deleted!", "Data Tps Berhasil Di Hapus.", "success");   
                            }
                        },
                    });     
                } 
            });
        });
    </script>
@endsection



