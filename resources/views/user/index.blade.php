@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Data Master Users</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item" aria-current="page">Data Master</li>
							<li class="breadcrumb-item active" aria-current="page">Users</li>
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
              <h3 class="box-title">Data Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        Tambah Users
                    </button> 
                </div>
                <br/>
                <div class="row">
                    <div class="table-responsive">
                        <table id="user" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama User</th>
                                    <th>Username</th>
                                    <th>Level</th>
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
            <h4 class="modal-title">Form Users</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Club">Nama Users:</label>
                        <input type="text" id="nm_user" name="nm_user" class="form-control" >
                        <span class="text-danger">
                            <strong id="nm_user-error"></strong>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Club">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" >
                        <span class="text-danger">
                            <strong id="username-error"></strong>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Club">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" >
                        <span class="text-danger">
                            <strong id="password-error"></strong>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Club">Confirm Password:</label>
                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control" >
                        <span class="text-danger">
                            <strong id="confirmpass-error"></strong>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control select2" id="role" name="role" style="width: 100%;">
                                @foreach ($role as $value)
                                    <option value="{{ $value->id }}">{{ $value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <div class="row" id="desa">
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
            <h4 class="modal-title">Form Users</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="id" name="id" class="form-control" >
                    <div class="form-group col-md-12">
                        <label for="Club">Nama Users:</label>
                        <input type="text" id="nama_user" name="nama_user" class="form-control" >
                        <span class="text-danger">
                            <strong id="nama_user-error"></strong>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Club">Password:</label>
                        <input type="password" id="passwords" name="password" class="form-control" >
                        <span class="text-danger">
                            <strong id="passwords-error"></strong>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Club">Confirm Password:</label>
                        <input type="password" id="password-confirms" name="password_confirmation" class="form-control" >
                        <span class="text-danger">
                            <strong id="passconfirm-error"></strong>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control select2" id="roles" name="roles" style="width: 100%;">
                                @foreach ($role as $value)
                                    <option value="{{ $value->id }}">{{ $value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <div class="row" id="desa">
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

            var tabel = $('#user').DataTable( {
                "ajax": "{{ route('getuser') }}",
                "columns": [
                    { "data": "name" },
                    { "data": "username" },
                    { "data": "nm_level" },
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

            if($('#role').val() == 1){
                $("#desa").hide();
            }else{
                $("#desa").show();
            }
        } );

        // add function
        $("#ajaxSubmit").click(function() {
            var userForm = $("#form");
            var formData = userForm.serialize();
            $( '#nm_user-error' ).html( "" );
            $( '#username-error' ).html( "" );
            $( '#password-error' ).html( "" );

            $.ajax({
                type: "post",
                url: "{{ route('createUser') }}",
                data: formData,
                success: function(data) {
                    if(data.errorsvalidation) {
                        if(data.errorsvalidation.nm_user){
                            $( '#nm_user-error' ).html( data.errorsvalidation.nm_user[0] );
                        }
                        if(data.errorsvalidation.username){
                            $( '#username-error' ).html( data.errorsvalidation.username[0] );
                        }
                        if(data.errorsvalidation.password){
                            $( '#password-error' ).html( data.errorsvalidation.password[0] );
                        }
                    }else if(data.success) {
                        $('#user').DataTable().ajax.reload();
                        $('#nm_user').val('');
                        $('#username').val('');
                        $('#password').val('');
                        $('#password-confirm').val('');
                        $('#myModal').modal('hide');
                        swal("Sukses", "Berhasil Menambahkan Data User", "success");
                    }else if(data.errors) {
                        swal("Gagal", "Gagal Menambahkan Data User", "error");
                    }
                },
            });
        });

        // edit function
        $("#editSubmit").click(function() {
            var userForm = $("#formEdit");
            var formData = userForm.serialize();
            $( '#nama_user-error' ).html( "" );
            $( '#passwords-error' ).html( "" );

            $.ajax({
                type: "post",
                url: "{{ route('editUser') }}",
                data: formData,
                success: function(data) {
                    if(data.errorsvalidation) {
                        if(data.errorsvalidation.nama_user){
                            $( '#nama_user-error' ).html( data.errorsvalidation.nama_user[0] );
                        }
                        if(data.errorsvalidation.password){
                            $( '#passwords-error' ).html( data.errorsvalidation.password[0] );
                        }
                    }else if(data.success) {
                        $('#user').DataTable().ajax.reload();
                        $('#nama_user').val('');
                        $('#usernames').val('');
                        $('#passwords').val('');
                        $('#password-confirms').val('');
                        $('#myModalEdit').modal('hide');
                        swal("Sukses", "Berhasil Melakukan Perubahan Data User", "success");
                    }else if(data.errors) {
                        swal("Gagal", "Gagal Melakukan Edit Data User", "error");
                    }
                },
            });
        });

        $(document).on('click', '.edit-modal', function() {
            var data = $('#user').DataTable().row( $(this).parents('tr') ).data();
            $('#id').val(data['id']);
            $('#usernames').val(data['username']);
            $('#passwords').val('');
            $('#password-confirms').val('');
            $('#nama_user').val(data['name']);
            // $("#idkec option[value=15]").prop("selected",true);
            $('#roles').val(data['id_role']).trigger('change');
            $('#iddesa').val(data['id_desa']).trigger('change');    
            $('#myModalEdit').modal('show');
        });

        $(document).on('click', '.delete-modal', function() {
            var data = $('#user').DataTable().row( $(this).parents('tr') ).data();
            swal({   
                title: "Hapus Data User?",   
                text: "Apakah Anda Yakin Menghapus Data User Ini!",   
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
                        url: "{{ route('deleteUser') }}",
                        data: {'id':data['id']},
                        success: function(data) {
                            if(data.errors) {
                                swal("Gagal!", "Data User Gagal Di Hapus.", "error");   
                            }else if(data.success) {
                                $('#user').DataTable().ajax.reload();
                                swal("Deleted!", "Data User Berhasil Di Hapus.", "success");   
                            }
                        },
                    });     
                } 
            });
        });

        $( "#role" ).change(function() {
            if($('#role').val() == 1){
                $("#desa").hide();
            }else{
                $("#desa").show();
            }
        });
    </script>
@endsection



