@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Data Master Desa</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item" aria-current="page">Data Master</li>
							<li class="breadcrumb-item active" aria-current="page">Desa</li>
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
              <h3 class="box-title">Data Desa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        Tambah Desa
                    </button> 
                </div>
                <br/>
                <div class="row">
                    <div class="table-responsive">
                        <table id="desa" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Kabupaten</th>
                                    <th>Nama Kecamatan</th>
                                    <th>Nama Desa</th>
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
            <h4 class="modal-title">Form Desa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Nama Kecamatan</label>
                            <select class="form-control select2" id="id_kec" name="id_kec" style="width: 100%;">
                                @foreach ($kecamatan as $value)
                                    <option value="{{ $value->id }}">{{ $value->nm_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Club">Nama Desa:</label>
                        <input type="text" id="nm_desa" name="nm_desa" class="form-control" >
                        <span class="text-danger">
                            <strong id="nm_desa-error"></strong>
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
            <h4 class="modal-title">Form Desa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Nama Kecamatan</label>
                            <select class="form-control select2" id="idkec" name="idkec" style="width: 100%;">
                                @foreach ($kecamatan as $value)
                                    <option value="{{ $value->id }}">{{ $value->nm_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" id="id" name="id" value="{{ old('id') }}" class="form-control" >
                    <div class="form-group col-md-12">
                        <label for="Club">Nama Desa:</label>
                        <input type="text" id="namadesa" name="namadesa" class="form-control" >
                        <span class="text-danger">
                            <strong id="desa-error"></strong>
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

            var tabel = $('#desa').DataTable( {
                "ajax": "{{ route('getdesa') }}",
                "columns": [
                    { "data": "nm_kabupaten" },
                    { "data": "nm_kecamatan" },
                    { "data": "nm_desa" },
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
            var desaForm = $("#form");
            var formData = desaForm.serialize();
            $( '#nm_desa-error' ).html( "" );

            $.ajax({
                type: "post",
                url: "{{ route('createDesa') }}",
                data: formData,
                success: function(data) {
                    if(data.errorsvalidation) {
                        if(data.errorsvalidation.nm_desa){
                            $( '#nm_desa-error' ).html( data.errorsvalidation.nm_desa[0] );
                        }
                    }else if(data.success) {
                        $('#desa').DataTable().ajax.reload();
                        $('#nm_desa').val('');
                        $('#myModal').modal('hide');
                        swal("Sukses", "Berhasil Menambahkan Data Desa", "success");
                    }else if(data.errors) {
                        $('#nm_desa').val('');
                        swal("Gagal", "Gagal Menambahkan Data Desa", "error");
                    }
                },
            });
        });

        // edit function
        $("#editSubmit").click(function() {
            var desaForm = $("#formEdit");
            var formData = desaForm.serialize();
            $( '#desa-error' ).html( "" );

            $.ajax({
                type: "post",
                url: "{{ route('editDesa') }}",
                data: formData,
                success: function(data) {
                    if(data.errorsvalidation) {
                        if(data.errorsvalidation.namadesa){
                            $( '#desa-error' ).html( data.errorsvalidation.namadesa[0] );
                        }
                    }else if(data.success) {
                        $('#desa').DataTable().ajax.reload();
                        $('#namadesa').val('');
                        $('#myModalEdit').modal('hide');
                        swal("Sukses", "Berhasil Melakukan Perubahan Data Desa", "success");
                    }else if(data.errors) {
                        $('#namadesa').val('');
                        swal("Gagal", "Gagal Melakukan Edit Data Desa", "error");
                    }
                },
            });
        });

        $(document).on('click', '.edit-modal', function() {
            var data = $('#desa').DataTable().row( $(this).parents('tr') ).data();
            $('#id').val(data['id']);
            $('#namadesa').val(data['nm_desa']);
            // $("#idkec option[value=15]").prop("selected",true);
            $('#idkec').val(data['id_kec']).trigger('change');  
            $('#myModalEdit').modal('show');
        });

        $(document).on('click', '.delete-modal', function() {
            var data = $('#desa').DataTable().row( $(this).parents('tr') ).data();
            swal({   
                title: "Hapus Data Desa?",   
                text: "Apakah Anda Yakin Menghapus Data Desa Ini!",   
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
                        url: "{{ route('deleteDesa') }}",
                        data: {'id':data['id']},
                        success: function(data) {
                            if(data.errors) {
                                swal("Gagal!", "Data Desa Gagal Di Hapus.", "error");   
                            }else if(data.success) {
                                $('#desa').DataTable().ajax.reload();
                                swal("Deleted!", "Data Desa Berhasil Di Hapus.", "success");   
                            }
                        },
                    });     
                } 
            });
        });
    </script>
@endsection



