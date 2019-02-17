@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Input Perhitungan</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item" aria-current="page">Input Perhitungan</li>
							<li class="breadcrumb-item active" aria-current="page">Input Perhitungan Dapil VI</li>
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
              <h3 class="box-title">Input Perhitungan Dapil VI Jember</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <br/>
                <div class="row">
                    <div class="table-responsive">
                        <table id="perhitungan" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Kabupaten</th>
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
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="4" style="text-align:right">Total:</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            {{-- <tbody><tr role="row" class="odd"><td class="sorting_1">asuuuu</td><td>emuut susune yasinta</td><td>mantaaab</td><td><a href="#" id="username" data-type="text" data-pk="1" data-title="Enter username" data-name="dedy" data-value="0">0</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr></tbody> --}}
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var tabel = $('#perhitungan').DataTable( {
                "ajax": "{{ route('getperhitungan') }}",
                "fnDrawCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('.dedy').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'dedy',
                        url: '{{ route("updateSuara") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.aisyah').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'aisyah',
                        url: '{{ route("updateSuara") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.suwarno').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'suwarno',
                        url: '{{ route("updateSuara") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.mufaridah').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'mufaridah',
                        url: '{{ route("updateSuara") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.ruly').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'ruly',
                        url: '{{ route("updateSuara") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.syahrul').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'syahrul',
                        url: '{{ route("updateSuara") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.toha').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'toha',
                        url: '{{ route("updateSuara") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.joko').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'joko',
                        url: '{{ route("updateSuara") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.wahyuni').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'wahyuni',
                        url: '{{ route("updateSuara") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                },
                "columns": [
                    { "data": "nm_kabupaten" },
                    { "data": "nm_kecamatan" },
                    { "data": "nm_desa" },
                    { "data": "nm_tps" },
                    {
                        "data" : "dedy",
                        "mRender": function(data, type, row){
                            return '<a href="#" class="dedy" data-pk="'+row['id']+'" data-value="'+row['dedy']+'">'+row['dedy']+'</a>';
                        }
                    },
                    {
                        "data" : "aisyah",
                        "mRender": function(data, type, row){
                            return '<a href="#" class="aisyah" data-pk="'+row['id']+'" data-value="'+row['aisyah']+'">'+row['aisyah']+'</a>';
                        }
                    },
                    {
                        "data" : "suwarno",
                        "mRender": function(data, type, row){
                            return '<a href="#" class="suwarno" data-pk="'+row['id']+'" data-value="'+row['suwarno']+'">'+row['suwarno']+'</a>';
                        }
                    },
                    {
                        "data" : "mufaridah",
                        "mRender": function(data, type, row){
                            return '<a href="#" class="mufaridah" data-pk="'+row['id']+'" data-value="'+row['mufaridah']+'">'+row['mufaridah']+'</a>';
                        }
                    },
                    {
                        "data" : "ruly",
                        "mRender": function(data, type, row){
                                return '<a href="#" class="ruly" data-pk="'+row['id']+'" data-value="'+row['ruly']+'">'+row['ruly']+'</a>';
                            }
                    },
                    {
                        "data" : "syahrul",
                        "mRender": function(data, type, row){
                                return '<a href="#" class="syahrul" data-pk="'+row['id']+'" data-value="'+row['syahrul']+'">'+row['syahrul']+'</a>';
                            }
                    },
                    {
                        "data" : "toha",
                        "mRender": function(data, type, row){
                                return '<a href="#" class="toha" data-pk="'+row['id']+'" data-value="'+row['toha']+'">'+row['toha']+'</a>';
                            }
                    },
                    {
                        "data" : "joko",
                        "mRender": function(data, type, row){
                                return '<a href="#" class="joko" data-pk="'+row['id']+'" data-value="'+row['joko']+'">'+row['joko']+'</a>';
                            }
                    },
                    {
                        "data" : "wahyuni",
                        "mRender": function(data, type, row){
                                return '<a href="#" class="wahyuni" data-pk="'+row['id']+'" data-value="'+row['wahyuni']+'">'+row['wahyuni']+'</a>';
                            }
                    },
                ],
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;
        
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
        
                    // Total over all pages
                    dedi = api
                        .column(4)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    
                    totdedi = api
                        .column(4,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    aisyah = api
                        .column(5)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    
                    totaisyah = api
                        .column(5,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    suwarno = api
                        .column(6)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    totsuwarno = api
                        .column(6,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    mufaridah = api
                        .column(7)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    totmufaridah = api
                        .column(7,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    rully = api
                        .column(8)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    totrully = api
                        .column(8,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    syahrul = api
                        .column(9)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    totsyahrul = api
                        .column(9,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    toha = api
                        .column(10)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    tottoha = api
                        .column(10,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    joko = api
                        .column(11)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    totjoko = api
                        .column(11,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    wahyuni = api
                        .column(12)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    totwahyuni = api
                        .column(12,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    



        
                    // Update footer
                    $( api.column(4).footer() ).html(totdedi+'('+dedi+')');
                    $( api.column(5).footer() ).html(totaisyah+'('+aisyah+')');
                    $( api.column(6).footer() ).html(totsuwarno+'('+suwarno+')');
                    $( api.column(7).footer() ).html(totmufaridah+'('+mufaridah+')');
                    $( api.column(8).footer() ).html(totrully+'('+rully+')');
                    $( api.column(9).footer() ).html(totsyahrul+'('+syahrul+')');
                    $( api.column(10).footer() ).html(tottoha+'('+toha+')');
                    $( api.column(11).footer() ).html(totjoko+'('+joko+')');
                    $( api.column(12).footer() ).html(totwahyuni+'('+wahyuni+')');

                }
            } );

        } );

    </script>
@endsection



