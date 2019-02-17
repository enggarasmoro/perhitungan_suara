@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Data Master Kecamatan</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item" aria-current="page">Data master</li>
							<li class="breadcrumb-item active" aria-current="page">Kecamatan</li>
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
              <h3 class="box-title">Data Kecamatan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        Tambah Kecamatan
                    </button> 
                </div>
                <br/>
                <div class="row">
                    <div class="table-responsive">
                        <table id="kecamatan" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Kabupaten</th>
                                    <th>Nama Kecamatan</th>
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
            <h4 class="modal-title">Form Kecamatan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Nama Kabupaten</label>
                            <select class="form-control select2" id="id_kab" name="id_kab" style="width: 100%;">
                                @foreach ($kabupaten as $value)
                                    <option value="{{ $value->id }}">{{ $value->nm_kabupaten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Club">Nama Kecamatan:</label>
                        <input type="text" id="nm_kecamatan" name="nm_kecamatan" class="form-control" >
                        <span class="text-danger">
                            <strong id="nm_kecamatan-error"></strong>
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
            <h4 class="modal-title">Form Kecamatan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Nama Kabupaten</label>
                            <select class="form-control select2" id="idkab" name="idkab" style="width: 100%;">
                                @foreach ($kabupaten as $value)
                                    <option value="{{ $value->id }}">{{ $value->nm_kabupaten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" id="id" name="id" value="{{ old('id') }}" class="form-control" >
                    <div class="form-group col-md-12">
                        <label for="Club">Nama Kecamatan:</label>
                        <input type="text" id="namakecamatan" name="namakecamatan" class="form-control" >
                        <span class="text-danger">
                            <strong id="kecamatan-error"></strong>
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
            var tabel = $('#kecamatan').DataTable( {
                "ajax": "{{ route('getkecamatan') }}",
                "columns": [
                    { "data": "get_kabupaten.nm_kabupaten" },
                    { "data": "nm_kecamatan" },
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
            var kecamatanForm = $("#form");
            var formData = kecamatanForm.serialize();
            $( '#nm_kecamatan-error' ).html( "" );

            $.ajax({
                type: "post",
                url: "{{ route('createKecamatan') }}",
                data: formData,
                success: function(data) {
                    if(data.errorsvalidation) {
                        if(data.errorsvalidation.nm_kecamatan){
                            $( '#nm_kecamatan-error' ).html( data.errorsvalidation.nm_kecamatan[0] );
                        }
                    }else if(data.success) {
                        $('#kecamatan').DataTable().ajax.reload();
                        $('#nm_kecamatan').val('');
                        $('#myModal').modal('hide');
                        swal("Sukses", "Berhasil Menambahkan Data Kecamatan", "success");
                    }else if(data.errors) {
                        $('#nm_kecamatan').val('');
                        swal("Gagal", "Gagal Menambahkan Data Kecamatan", "error");
                    }
                },
            });
        });

        // edit function
        $("#editSubmit").click(function() {
            var kecamatanForm = $("#formEdit");
            var formData = kecamatanForm.serialize();
            $( '#kecamatan-error' ).html( "" );

            $.ajax({
                type: "post",
                url: "{{ route('editKecamatan') }}",
                data: formData,
                success: function(data) {
                    if(data.errorsvalidation) {
                        if(data.errorsvalidation.namakecamatan){
                            $( '#kecamatan-error' ).html( data.errorsvalidation.namakecamatan[0] );
                        }
                    }else if(data.success) {
                        $('#kecamatan').DataTable().ajax.reload();
                        $('#namakecamatan').val('');
                        $('#myModalEdit').modal('hide');
                        swal("Sukses", "Berhasil Melakukan Perubahan Data Kecamatan", "success");
                    }else if(data.errors) {
                        $('#namakecamatan').val('');
                        swal("Gagal", "Gagal Melakukan Edit Data Kecamatan", "error");
                    }
                },
            });
        });

        $(document).on('click', '.edit-modal', function() {
            var data = $('#kecamatan').DataTable().row( $(this).parents('tr') ).data();
            $('#id').val(data['id']);
            $('#namakecamatan').val(data['nm_kecamatan']);
            $('#iddesa').val(data['id_desa']).trigger('change');  
            $('#myModalEdit').modal('show');
        });

        $(document).on('click', '.delete-modal', function() {
            var data = $('#kecamatan').DataTable().row( $(this).parents('tr') ).data();
            swal({   
                title: "Hapus Data Kecamatan?",   
                text: "Apakah Anda Yakin Menghapus Data Kecamatan Ini!",   
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
                        url: "{{ route('deleteKecamatan') }}",
                        data: {'id':data['id']},
                        success: function(data) {
                            if(data.errors) {
                                swal("Gagal!", "Data Kecamatan Gagal Di Hapus.", "error");   
                            }else if(data.success) {
                                $('#kecamatan').DataTable().ajax.reload();
                                swal("Deleted!", "Data Kecamatan Berhasil Di Hapus.", "success");   
                            }
                        },
                    });     
                } 
            });
        });
    </script>
@endsection



