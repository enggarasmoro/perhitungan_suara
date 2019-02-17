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
							<li class="breadcrumb-item active" aria-current="page">Input Perhitungan Dapil V Jatim</li>
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
              <h3 class="box-title">Input Perhitungan Dapil V Jatim</h3>
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
                                    <th>Deni</th>
                                    <th>Eksan</th>
                                    <th>Siti Aminah</th>
                                    <th>Hery</th>
                                    <th>Hj.Luluk</th>
                                    <th>Enny</th>
                                    <th>Abdul</th>
                                    <th>Ely</th>
                                    <th>M Hesan</th>
                                    <th>Yusuf</th>
                                    <th>Nasir</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="3" style="text-align:right">Total:</th>
                                    <th></th>
                                    <th></th>
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
                "ajax": "{{ route('getrekapjatim') }}",
                "fnDrawCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('.deni').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'deni',
                        url: '{{ route("updateSuarajatim") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.eksan').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'eksan',
                        url: '{{ route("updateSuarajatim") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.siti').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'siti',
                        url: '{{ route("updateSuarajatim") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.hery').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'hery',
                        url: '{{ route("updateSuarajatim") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.luluk').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'luluk',
                        url: '{{ route("updateSuarajatim") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.enny').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'enny',
                        url: '{{ route("updateSuarajatim") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.abdul').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'abdul',
                        url: '{{ route("updateSuarajatim") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.ely').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'ely',
                        url: '{{ route("updateSuarajatim") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.hesan').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'hesan',
                        url: '{{ route("updateSuarajatim") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.yusuf').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'yusuf',
                        url: '{{ route("updateSuarajatim") }}',
                        success: function(response, newValue) {
                            if(response.status == 'success') tabel.ajax.reload();
                            if(response.status == 'error') return response.msg; //msg will be shown in editable form
                        }
                        
                    });
                    $('.nasir').editable({
                        type: 'number',
                        mode: 'inline',
                        name: 'nasir',
                        url: '{{ route("updateSuarajatim") }}',
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
                        "data" : "deni",
                        "mRender": function(data, type, row){
                            return '<a href="#" class="deni" data-pk="'+row['id']+'" data-value="'+row['deni']+'">'+row['deni']+'</a>';
                        }
                    },
                    {
                        "data" : "eksan",
                        "mRender": function(data, type, row){
                            return '<a href="#" class="eksan" data-pk="'+row['id']+'" data-value="'+row['eksan']+'">'+row['eksan']+'</a>';
                        }
                    },
                    {
                        "data" : "siti",
                        "mRender": function(data, type, row){
                            return '<a href="#" class="siti" data-pk="'+row['id']+'" data-value="'+row['siti']+'">'+row['siti']+'</a>';
                        }
                    },
                    {
                        "data" : "hery",
                        "mRender": function(data, type, row){
                            return '<a href="#" class="hery" data-pk="'+row['id']+'" data-value="'+row['hery']+'">'+row['hery']+'</a>';
                        }
                    },
                    {
                        "data" : "luluk",
                        "mRender": function(data, type, row){
                                return '<a href="#" class="luluk" data-pk="'+row['id']+'" data-value="'+row['luluk']+'">'+row['luluk']+'</a>';
                            }
                    },
                    {
                        "data" : "enny",
                        "mRender": function(data, type, row){
                                return '<a href="#" class="enny" data-pk="'+row['id']+'" data-value="'+row['enny']+'">'+row['enny']+'</a>';
                            }
                    },
                    {
                        "data" : "abdul",
                        "mRender": function(data, type, row){
                                return '<a href="#" class="abdul" data-pk="'+row['id']+'" data-value="'+row['abdul']+'">'+row['abdul']+'</a>';
                            }
                    },
                    {
                        "data" : "ely",
                        "mRender": function(data, type, row){
                                return '<a href="#" class="ely" data-pk="'+row['id']+'" data-value="'+row['ely']+'">'+row['ely']+'</a>';
                            }
                    },
                    {
                        "data" : "hesan",
                        "mRender": function(data, type, row){
                                return '<a href="#" class="hesan" data-pk="'+row['id']+'" data-value="'+row['hesan']+'">'+row['hesan']+'</a>';
                            }
                    },
                    
                    {
                        "data" : "yusuf",
                        "mRender": function(data, type, row){
                                return '<a href="#" class="yusuf" data-pk="'+row['id']+'" data-value="'+row['yusuf']+'">'+row['yusuf']+'</a>';
                            }
                    },
                    {
                        "data" : "nasir",
                        "mRender": function(data, type, row){
                                return '<a href="#" class="nasir" data-pk="'+row['id']+'" data-value="'+row['nasir']+'">'+row['nasir']+'</a>';
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
                    deni = api
                        .column(4)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    totdeni = api
                        .column(4,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    eksan = api
                        .column(5)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    toteksan = api
                        .column(5,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    siti = api
                        .column(6)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    totsiti = api
                        .column(6,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    hery = api
                        .column(7)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    tothery = api
                        .column(7,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    luluk = api
                        .column(8)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    totluluk = api
                        .column(8,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    enny = api
                        .column(9)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    totenny = api
                        .column(9,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    abdul = api
                        .column(10)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    totabdul = api
                        .column(10,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    ely = api
                        .column(11)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    totely = api
                        .column(11,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    hesan = api
                        .column(12)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    tothesan = api
                        .column(12,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    yusuf = api
                        .column(13)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    totyusuf = api
                        .column(13,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    nasir = api
                        .column(14)
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    totnasir = api
                        .column(14,{ page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    



        
                    // Update footer
                    $( api.column(4).footer() ).html(totdeni+'('+deni+')');
                    $( api.column(5).footer() ).html(toteksan+'('+eksan+')');
                    $( api.column(6).footer() ).html(totsiti+'('+siti+')');
                    $( api.column(7).footer() ).html(tothery+'('+hery+')');
                    $( api.column(8).footer() ).html(totluluk+'('+luluk+')');
                    $( api.column(9).footer() ).html(totenny+'('+enny+')');
                    $( api.column(10).footer() ).html(totabdul+'('+abdul+')');
                    $( api.column(11).footer() ).html(totely+'('+ely+')');
                    $( api.column(12).footer() ).html(tothesan+'('+hesan+')');
                    $( api.column(13).footer() ).html(totyusuf+'('+yusuf+')');
                    $( api.column(14).footer() ).html(totnasir+'('+nasir+')');

                }
            } );

        } );

    </script>
@endsection



