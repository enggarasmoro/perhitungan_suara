@extends('layouts.template')

@section('content')
<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Rekapitulasi Suara</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item" aria-current="page">Home</li>
							<li class="breadcrumb-item active" aria-current="page">Rekapitulasi Suara</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	  
    @hasanyrole('Admin|Kordinator Dapil VI')
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <!-- Bar CHART -->
                    <div class="box">
                    <div class="box-header with-border">
                        @role('Admin')
                            <h3 class="box-title">Dapil VI Jember</h3>
                        @else
                            <h3 class="box-title">Dapil VI Jember ( {{ $nm_kecamatan }} )</h3>
                        @endrole
                    </div>
                    <div class="box-body">
                        <div class="chart">
                        <canvas id="jember-chart" height="510"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
        
                </div>
                <!-- /.col -->
                <div class="col-12">
                    <!-- Bar CHART -->
                    <div class="box">
                        <div class="box-header with-border">
                            @role('Admin')
                                <h3 class="box-title">Dapil V Jatim</h3>
                            @else
                                <h3 class="box-title">Dapil V Jatim ( {{ $nm_kecamatan }} )</h3>
                            @endrole
                        </div>
                        <div class="box-body">
                        <div class="chart">
                            <canvas id="jatim-chart" height="510"></canvas>
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
    @else
        <!-- Main content -->
        <section class="content">
                <div class="row">
                    <div class="col-12">
                        <!-- Bar CHART -->
                        <div class="box">
                            <div class="box-header with-border">
                                @role('Admin')
                                    <h3 class="box-title">Dapil V Jatim</h3>
                                @else
                                    <h3 class="box-title">Dapil V Jatim ( {{ $nm_kecamatan }} )</h3>
                                @endrole
                            </div>
                            <div class="box-body">
                            <div class="chart">
                                <canvas id="jatim-chart" height="510"></canvas>
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
    @endhasanyrole
    
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            if( $('#jember-chart').length > 0 ){
                var ctx2 = document.getElementById("jember-chart").getContext("2d");
                var data2 = {
                    labels: ["Dedy", "Aisyah", "Suwarno", "Mufaridah", "Ruly", "Syahrul", "Toha","Joko","Wahyuni"],
                    datasets: [
                        {
                            label: "Perolehan Suara",
                            backgroundColor: "#05b085",
                            borderColor: "#05b085",
                            data: [{{$rekapitulasi[0]->dedy}}, {{$rekapitulasi[0]->aisyah}}, {{$rekapitulasi[0]->suwarno}}, {{$rekapitulasi[0]->mufaridah}}, {{$rekapitulasi[0]->ruly}}, {{$rekapitulasi[0]->syahrul}}, {{$rekapitulasi[0]->toha}},{{$rekapitulasi[0]->joko}},{{$rekapitulasi[0]->wahyuni}}]
                        }
                    ]
                };
                
                var hBar = new Chart(ctx2, {
                    type:"bar",
                    data:data2,
                    
                    options: {
                        tooltips: {
                            mode:"label"
                        },
                        scales: {
                            yAxes: [{
                                stacked: true,
                                gridLines: {
                                    color: "rgba(135,135,135,0)",
                                },
                                ticks: {
                                    fontFamily: "Poppins",
                                    fontColor:"#878787"
                                }
                            }],
                            xAxes: [{
                                stacked: true,
                                gridLines: {
                                    color: "rgba(135,135,135,0)",
                                },
                                ticks: {
                                    fontFamily: "Poppins",
                                    fontColor:"#878787"
                                }
                            }],
                            
                        },
                        elements:{
                            point: {
                                hitRadius:40
                            }
                        },
                        animation: {
                            duration:	3000
                        },
                        responsive: true,
                        maintainAspectRatio:false,
                        legend: {
                            display: false,
                        },
                        
                        tooltip: {
                            backgroundColor:'rgba(33,33,33,1)',
                            cornerRadius:0,
                            footerFontFamily:"'Poppins'"
                        }
                        
                    }
                });
            }

            if( $('#jatim-chart').length > 0 ){
                var ctx2 = document.getElementById("jatim-chart").getContext("2d");
                var data2 = {
                    labels: ["Deni","Eksan","Siti","Hery","Luluk","Enny","Abdul","Ely","Hesan","Yusuf","Nasir"],
                    datasets: [
                        {
                            label: "Perolehan Suara",
                            backgroundColor: "#00FFFF",
                            borderColor: "#05b085",
                            data: [{{$rekapitulasijatim[0]->deni}}, {{$rekapitulasijatim[0]->eksan}}, {{$rekapitulasijatim[0]->siti}}, {{$rekapitulasijatim[0]->hery}}, {{$rekapitulasijatim[0]->luluk}}, {{$rekapitulasijatim[0]->enny}}, {{$rekapitulasijatim[0]->abdul}},{{$rekapitulasijatim[0]->ely}},{{$rekapitulasijatim[0]->hesan}},{{$rekapitulasijatim[0]->yusuf}},{{$rekapitulasijatim[0]->nasir}}]
                        }
                    ]
                };
                
                var hBar = new Chart(ctx2, {
                    type:"bar",
                    data:data2,
                    
                    options: {
                        tooltips: {
                            mode:"label"
                        },
                        scales: {
                            yAxes: [{
                                stacked: true,
                                gridLines: {
                                    color: "rgba(135,135,135,0)",
                                },
                                ticks: {
                                    fontFamily: "Poppins",
                                    fontColor:"#878787"
                                }
                            }],
                            xAxes: [{
                                stacked: true,
                                gridLines: {
                                    color: "rgba(135,135,135,0)",
                                },
                                ticks: {
                                    fontFamily: "Poppins",
                                    fontColor:"#878787"
                                }
                            }],
                            
                        },
                        elements:{
                            point: {
                                hitRadius:40
                            }
                        },
                        animation: {
                            duration:	3000
                        },
                        responsive: true,
                        maintainAspectRatio:false,
                        legend: {
                            display: false,
                        },
                        
                        tooltip: {
                            backgroundColor:'rgba(33,33,33,1)',
                            cornerRadius:0,
                            footerFontFamily:"'Poppins'"
                        }
                        
                    }
                });
            }
        });
    </script>
@endsection