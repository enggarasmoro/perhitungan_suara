@php
    if(auth()->user()->hasRole('Admin')){
        $level = "Admin";
    }elseif(auth()->user()->hasRole('Kordinator Dapil V')){
        $level = "Kordinator Dapil V";
    }else{
        $level = "Kordinator Dapil VI";
    }
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('admin_template/images/favicon.ico')}}">

    <title>Aplikasi Perhitungan Suara</title>
    
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{asset('admin_template/assets/vendor_components/bootstrap/dist/css/bootstrap.css')}}">
    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{asset('admin_template/main/css/bootstrap-extend.css')}}">
    
    <!-- theme style -->
    <link rel="stylesheet" href="{{asset('admin_template/main/css/master_style.css')}}">
    
    <!-- Superieur Admin skins -->
    <link rel="stylesheet" href="{{asset('admin_template/main/css/skins/_all-skins.css')}}">
    
    <!-- daterange picker -->	
    <link rel="stylesheet" href="{{asset('admin_template/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    
    <!-- Morris charts -->
    {{-- <link rel="stylesheet" href="{{asset('admin_template/assets/vendor_components/morris.js/morris.css')}}"> --}}
    
    <!-- xeditable css -->
    <link href="{{asset('admin_template/assets/vendor_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet" />

    <!-- Data Table-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_template/assets/vendor_components/datatable/datatables.min.css')}}"/>

    <!-- Data Table-->
	<link rel="stylesheet" type="text/css" href="{{asset('admin_template/assets/vendor_components/datatable/datatables.min.css')}}"/>
    
    <!--alerts CSS -->
    <link href="{{asset('admin_template/assets/vendor_components/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
    
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="{{asset('admin_template/assets/vendor_components/bootstrap-select/dist/css/bootstrap-select.css')}}">
    
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin_template/assets/vendor_components/select2/dist/css/select2.min.css')}}">

    <style>
		.example-modal .modal {
			position: relative;
			top: auto;
			bottom: auto;
			right: auto;
			left: auto;
			display: block;
			z-index: 1;
		}

		.example-modal .modal {
			background: transparent !important;
		}
    </style>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

     
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
          <!-- Logo -->
          <a href="index.html" class="logo">
            <!-- mini logo -->
              <div class="logo-mini">
              <span class="light-logo"><img src="{{asset('admin_template/images/logo-light.png')}}" alt="logo"></span>
              <span class="dark-logo"><img src="{{asset('admin_template/images/logo-dark.png')}}" alt="logo"></span>
              </div>
              <!-- logo-->
              <div class="logo-lg">
              <span class="light-logo"><img src="{{asset('admin_template/images/logo-light-text.png')}}" alt="logo"></span>
                  <span class="dark-logo"><img src="{{asset('admin_template/images/logo-dark-text.png')}}" alt="logo"></span>
              </div>
          </a>
          <!-- Header Navbar -->
          <nav class="navbar navbar-static-top">
              <!-- Sidebar toggle button-->
              <div>
                  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                      <span class="sr-only">Toggle navigation</span>
                  </a>
              </div>
              <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                      <!-- User Account-->
                      <li class="dropdown user user-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <img src="{{asset('admin_template/images/avatar/7.jpg')}}" class="user-image rounded-circle" alt="User Image">
                          </a>
                          <ul class="dropdown-menu animated flipInY">
                              <!-- User image -->
                              <li class="user-header bg-img" style="background-image: url({{asset('admin_template/images/user-info.jpg')}})" data-overlay="3">
                                  <div class="flexbox align-self-center">					  
                                      <img src="{{asset('admin_template/images/avatar/7.jpg')}}" class="float-left rounded-circle" alt="User Image">					  
                                      <h4 class="user-name align-self-center">
                                          <span>{{ Auth::user()->name }}</span>
                                          <small>{{ $level }}</small>
                                      </h4>
                                  </div>
                              </li>
                              <!-- Menu Body -->
                              <li class="user-body">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();"><i class="ion-log-out"></i> {{ __('Logout') }}</a>
                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                  @csrf
                                              </form>
                                  <div class="dropdown-divider"></div>
                              </li>
                          </ul>
                      </li>		
                  </ul>
              </div>
          </nav>
      </header>

      @role('Admin')
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar">
            
            <!-- sidebar menu-->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="user-profile treeview">
                <a href="index.html">
                    <img src="{{asset('admin_template/images/avatar/7.jpg')}}" alt="user">
                    <span>
                    <span class="d-block font-weight-600 font-size-16">{{ Auth::user()->name }}</span>
                    <span class="email-id">{{ $level }}</span>
                    </span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                    <ul class="treeview-menu">
                    <li><a href="javascript:void()"><i class="fa fa-user mr-5"></i>My Profile </a></li>
                    <li><a href="javascript:void()"><i class="fa fa-money mr-5"></i>My Balance</a></li>
                    <li><a href="javascript:void()"><i class="fa fa-envelope-open mr-5"></i>Inbox</a></li>
                    <li><a href="javascript:void()"><i class="fa fa-cog mr-5"></i>Account Setting</a></li>
                    <li><a href="javascript:void()"><i class="fa fa-power-off mr-5"></i>Logout</a></li>
                    </ul>
                </li>                
                <li>
                <a href='{{ route("home") }}'>
                    <i class="mdi mdi-view-dashboard"></i>
                    <span>Dashboard</span>
                </a>
                </li>                
                <li class="treeview">
                <a href="#">
                    <i class="mdi mdi-content-copy"></i>
                    <span>Data Master</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route("kecamatan") }}"><i class="mdi mdi-toggle-switch-off"></i>Data Kecamatan</a></li>
                    <li><a href="{{ route("desa") }}"><i class="mdi mdi-toggle-switch-off"></i>Data Desa</a></li>
                    <li><a href="{{ route("tps") }}"><i class="mdi mdi-toggle-switch-off"></i>Data Tps</a></li>
                    <li><a href="{{ route("user") }}"><i class="mdi mdi-toggle-switch-off"></i>Data User</a></li>
                </ul>
                </li>
                <li class="treeview">
                <a href="#">
                    <i class="mdi mdi-table"></i>
                    <span>Data Perhitungan</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route("perhitunganjember") }}"><i class="mdi mdi-toggle-switch-off"></i>Dapil VI Jember</a></li>
                    <li><a href="{{ route("perhitunganjatim") }}"><i class="mdi mdi-toggle-switch-off"></i>Dapil V Jatim</a></li>
                </ul>
                </li>                

                <li class="treeview">
                    <a href="{{ route("perhitungan") }}">
                        <i class="mdi mdi-receipt"></i>
                        <span>Input Perhitungan</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route("perhitungan") }}"><i class="mdi mdi-toggle-switch-off"></i>Input Perhitungan Jember</a></li>
                        <li><a href="{{ route("rekapjatim") }}"><i class="mdi mdi-toggle-switch-off"></i>Input Perhitungan Jatim</a></li>
                    </ul>
                </li>

            </ul>
            </section>
        </aside>
      @else
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar">
            
            <!-- sidebar menu-->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="user-profile treeview">
                <a href="index.html">
                    <img src="{{asset('admin_template/images/avatar/7.jpg')}}" alt="user">
                    <span>
                    <span class="d-block font-weight-600 font-size-16">{{ Auth::user()->name }}</span>
                    <span class="email-id">{{ $level }}</span>
                    </span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                    <ul class="treeview-menu">
                    <li><a href="javascript:void()"><i class="fa fa-user mr-5"></i>My Profile </a></li>
                    <li><a href="javascript:void()"><i class="fa fa-money mr-5"></i>My Balance</a></li>
                    <li><a href="javascript:void()"><i class="fa fa-envelope-open mr-5"></i>Inbox</a></li>
                    <li><a href="javascript:void()"><i class="fa fa-cog mr-5"></i>Account Setting</a></li>
                    <li><a href="javascript:void()"><i class="fa fa-power-off mr-5"></i>Logout</a></li>
                    </ul>
                </li>                
                <li>
                <a href="{{ route("home") }}">
                    <i class="mdi mdi-view-dashboard"></i>
                    <span>Dashboard</span>
                </a>
                </li>                
                @php
                    if($level == "Kordinator Dapil V"){
                        echo '<li class="treeview">
                            <a href="#">
                                <i class="mdi mdi-receipt"></i>
                                <span>Input Perhitungan</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="rekapjatim"><i class="mdi mdi-toggle-switch-off"></i>Input Perhitungan Jatim</a></li>
                            </ul>
                        </li>';
                    }else{
                        echo '<li class="treeview">
                            <a href="#">
                                <i class="mdi mdi-receipt"></i>
                                <span>Input Perhitungan</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="perhitungan"><i class="mdi mdi-toggle-switch-off"></i>Input Perhitungan Jember</a></li>
                                <li><a href="rekapjatim"><i class="mdi mdi-toggle-switch-off"></i>Input Perhitungan Jatim</a></li>
                            </ul>
                        </li>';
                    }
                @endphp
            </ul>
            </section>
        </aside>
      @endrole

      <div class="content-wrapper">
          @yield('content')
      </div>

      <footer class="main-footer">
          <div class="pull-right d-none d-sm-inline-block">
              <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
            <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">Email</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">enggarasmoro3@gmail.com</a>
            </li>
          </ul>
          </div>
          copyright &copy; 2019 <a href="https://www.multipurposethemes.com/">Enggar Asmoro</a>. 081238185572.
      </footer>

      <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{asset('admin_template/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js')}}"></script>
    
    <!-- jQuery 3 -->
    {{-- <script src="{{asset('admin_template/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.min.js')}}"></script> --}}
    
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('admin_template/assets/vendor_components/jquery-ui/jquery-ui.js')}}"></script>
    
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    
    <!-- popper -->
    <script src="{{asset('admin_template/assets/vendor_components/popper/dist/popper.min.js')}}"></script>
    
    <!-- date-range-picker -->
    <script src="{{asset('admin_template/assets/vendor_components/popper/dist/popper.min.js')}}"></script>
    <script src="{{asset('admin_template/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    
    <!-- Bootstrap 4.0-->
    <script src="{{asset('admin_template/assets/vendor_components/bootstrap/dist/js/bootstrap.js')}}"></script>	
    
    <!-- ChartJS -->
    <script src="{{asset('admin_template/assets/vendor_components/chart.js-master/Chart.min.js')}}"></script>
    
    <!-- Slimscroll -->
    <script src="{{asset('admin_template/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    
    <!-- FastClick -->
    <script src="{{asset('admin_template/assets/vendor_components/fastclick/lib/fastclick.js')}}"></script>
      
    <!-- Morris.js charts -->
    {{-- <script src="{{asset('admin_template/assets/vendor_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin_template/assets/vendor_components/morris.js/morris.min.js')}}"></script> --}}

    <script type="text/javascript" src="{{asset('admin_template/assets/vendor_components/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js')}}"></script>

    <!-- This is data table -->
    <script src="{{asset('admin_template/assets/vendor_components/datatable/datatables.min.js')}}"></script>

    <!-- Sweet-Alert  -->
    <script src="{{asset('admin_template/assets/vendor_components/sweetalert/sweetalert.min.js')}}"></script>    
    
    <!-- Bootstrap Select -->
    <script src="{{asset('admin_template/assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>

    <!-- Select2 -->
	<script src="{{asset('admin_template/assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
    
    <script src="{{asset('admin_template/assets/vendor_components/moment/src/moment2.js')}}"></script>

    <script src="{{asset('admin_template/assets/vendor_components/tiny-editable/mindmup-editabletable.js')}}"></script>
    <script src="{{asset('admin_template/assets/vendor_components/tiny-editable/numeric-input-example.js')}}"></script>

    <script src="{{asset('admin_template/main/js/pages/editable-tables.js')}}"></script>
    
    <!-- Superieur Admin App -->
    <script src="{{asset('admin_template/main/js/template.js')}}"></script>

     <!-- Superieur Admin for demo purposes -->
     <script src="{{asset('admin_template/main/js/demo.js')}}"></script>

    @yield('script')
    
  </body>
</html>
