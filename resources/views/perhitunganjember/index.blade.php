@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Data Master Perhitungan Dapil VI(Jember)</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item" aria-current="page">Data Perhitungan</li>
							<li class="breadcrumb-item active" aria-current="page">Dapil VI(Jember)</li>
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
              <h3 class="box-title">Data Dapil VI(Jember)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        Tambah Dapil VI(Jember)
                    </button> 
                </div>
                <br/>
                <div class="row">
                    <div class="table-responsive">
                        <table id="jember" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Kecamatan</th>
                                    <th>Nama Desa</th>
                                    <th>Nama Tps</th>
                                    <th>Dedy</th>
                                    <th>Aisyah</th>
                                    <th>Suwarno</th>
                                    <th>Mufaridah</th>
                                    <th>Ruly</th>
                                    <th>Syahrul</th>
                                    <th>Toha</th>
                                    <th>Joko</th>
                                    <th>Wahyuni</th>
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
            <h4 class="modal-title">Form Dapil VI(Jember)</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Nama Kecamatan</label>
                            <select class="form-control select2" id="id_kecamatan" name="id_kecamatan" style="width: 100%;">
                                @foreach ($kecamatan as $value)
                                    <option value="{{ $value->id }}">{{ $value->nm_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-12 col-12 id-desa" hidden="true">
                        <div class="form-group">
                            <label>Nama Tps</label>
                            <select class="form-control select2" id="id_desa" name="id_desa" style="width: 100%;">
                                {{-- @foreach ($desa as $value)
                                    <option value="{{ $value->id }}">{{ $value->nm_tps }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <!-- /.form-group -->
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
            <h4 class="modal-title">Form Dapil VI(Jember)</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="id" name="id" value="{{ old('id') }}" class="form-control" >
                    <div class="col-md-12 col-12">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label>Nama Kecamatan</label>
                                <select class="form-control select2" id="idkecamatan" name="idkecamatan" style="width: 100%;">
                                    @foreach ($kecamatan as $value)
                                        <option value="{{ $value->id }}">{{ $value->nm_kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-12 col-12 iddesa" hidden="true">
                            <div class="form-group">
                                <label>Nama Tps</label>
                                <select class="form-control select2" id="iddesa" name="iddesa" style="width: 100%;">
                                    {{-- @foreach ($desa as $value)
                                        <option value="{{ $value->id }}">{{ $value->nm_tps }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
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

            var tabel = $('#jember').DataTable( {
                "ajax": "{{ route('getperhitunganjember') }}",
                "columns": [
                    { "data": "nm_kecamatan" },
                    { "data": "nm_desa" },
                    { "data": "nm_tps" },
                    { "data": "dedy" },
                    { "data": "aisyah" },
                    { "data": "suwarno" },
                    { "data": "mufaridah" },
                    { "data": "ruly" },
                    { "data": "syahrul" },
                    { "data": "toha" },
                    { "data": "joko" },
                    { "data": "wahyuni" },
                    {
                        "mRender": function(data, type, row){
                            var tampil = "";
                            tampil += '<button class="edit-modal btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>';
                            tampil += '&nbsp;<button class="delete-modal btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>';
                            return tampil;
                        }
                    }
                ],
            } );
        } );

        // add function
        $("#ajaxSubmit").click(function() {
            var jemberForm = $("#form");
            var formData = jemberForm.serialize();

            $.ajax({
                type: "post",
                url: "{{ route('createPerhitunganjember') }}",
                data: formData,
                success: function(data) {
                    if(data.success) {
                        $('#jember').DataTable().ajax.reload();
                        $('#myModal').modal('hide');
                        swal("Sukses", "Berhasil Menambahkan Data Dapil VI(Jember)", "success");
                    }else if(data.errors) {
                        swal("Gagal", data.msg, "error");
                    }
                },
            });
        });

        // edit function
        $("#editSubmit").click(function() {
            var jemberForm = $("#formEdit");
            var formData = jemberForm.serialize();

            $.ajax({
                type: "post",
                url: "{{ route('editPerhitunganjember') }}",
                data: formData,
                success: function(data) {
                    if(data.success) {
                        $('#jember').DataTable().ajax.reload();
                        $('#myModalEdit').modal('hide');
                        swal("Sukses", "Berhasil Melakukan Perubahan Data Dapil VI(Jember)", "success");
                    }else if(data.errors) {
                        swal("Gagal", "Gagal Melakukan Edit Data Dapil VI(Jember)", "error");
                    }
                },
            });
        });

        $(document).on('click', '.edit-modal', function() {
            var data = $('#jember').DataTable().row( $(this).parents('tr') ).data();
            $('#id').val(data['id']);
            // $("#idkec option[value=15]").prop("selected",true);
            // $('#iddesa').val(data['id_tps']).trigger('change');  
            $('#idkecamatan').val(data['id_kec']).trigger('change');  
            $('#myModalEdit').modal('show');
        });

        $(document).on('click', '.delete-modal', function() {
            var data = $('#jember').DataTable().row( $(this).parents('tr') ).data();
            swal({   
                title: "Hapus Data Dapil VI(Jember)?",   
                text: "Apakah Anda Yakin Menghapus Data Dapil VI(Jember) Ini!",   
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
                        url: "{{ route('deletePerhitunganjember') }}",
                        data: {'id':data['id']},
                        success: function(data) {
                            if(data.errors) {
                                swal("Gagal!", "Data Dapil VI(Jember) Gagal Di Hapus.", "error");   
                            }else if(data.success) {
                                $('#jember').DataTable().ajax.reload();
                                swal("Deleted!", "Data Dapil VI(Jember) Berhasil Di Hapus.", "success");   
                            }
                        },
                    });     
                } 
            });
        });

        $("#id_kecamatan").change(function() {
            var id_kec = $('#id_kecamatan').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('getdesajember') }}",
                data: {id_kec:id_kec},
                dataType: "json",
                success: function(data) {
                    $('select[name="id_desa"]').empty();
                    $(".id-desa").removeAttr("hidden");
                    $.each(data, function(key, value){
                        console.log(key);
                        $('select[name="id_desa"]').append('<option value="'+ key +'">' + value + '</option>');
                    });
                    // if(data.success) {
                    //     $('#jember').DataTable().ajax.reload();
                    //     $('#myModal').modal('hide');
                    //     swal("Sukses", "Berhasil Menambahkan Data Dapil VI(Jember)", "success");
                    // }else if(data.errors) {
                    //     swal("Gagal", data.msg, "error");
                    // }
                },
            });
        });

        $("#idkecamatan").change(function() {
            var id_kec = $('#idkecamatan').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('getdesajember') }}",
                data: {id_kec:id_kec},
                dataType: "json",
                success: function(data) {
                    $('select[name="iddesa"]').empty();
                    $(".iddesa").removeAttr("hidden");
                    $.each(data, function(key, value){
                        console.log(key);
                        $('select[name="iddesa"]').append('<option value="'+ key +'">' + value + '</option>');
                    });
                    // if(data.success) {
                    //     $('#jember').DataTable().ajax.reload();
                    //     $('#myModal').modal('hide');
                    //     swal("Sukses", "Berhasil Menambahkan Data Dapil VI(Jember)", "success");
                    // }else if(data.errors) {
                    //     swal("Gagal", data.msg, "error");
                    // }
                },
            });
        });
    </script>
@endsection



