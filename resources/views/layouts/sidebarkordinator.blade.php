<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <link rel="stylesheet" href="{{asset('admin_template/assets/vendor_components/morris.js/morris.css')}}">
    
    <!-- Data Table-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_template/assets/vendor_components/datatable/datatables.min.css')}}"/>
    

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
                                            <small>{{ auth()->user()->getRoleNames() }}</small>
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
                    <span class="email-id">{{ auth()->user()->getRoleNames() }}</span>
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
        
                <li class="header nav-small-cap"><i class="mdi mdi-drag-horizontal mr-5"></i>Home</li>
                
                <li>
                <a href="pages/email_index.html">
                    <i class="mdi mdi-view-dashboard"></i>
                    <span>Dashboard</span>
                </a>
                </li>
        
                <li class="header nav-small-cap"><i class="mdi mdi-drag-horizontal mr-5"></i>FORMS And TABLES</li>
                
                <li>
                <a href="pages/email_index.html">
                    <i class="mdi mdi-table"></i>
                    <span>Data Perhitungan</span>
                </a>
                </li>
        
                <li>
                <a href="pages/email_index.html">
                    <i class="mdi mdi-receipt"></i>
                    <span>Input Perhitungan</span>
                </a>
                </li>
        
            </ul>
            </section>
        </aside>
    
        <div class="content-wrapper">
            @yield('content')
        </div>
    
        <footer class="main-footer">
            <div class="pull-right d-none d-sm-inline-block">
                <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
            <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">FAQ</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Purchase Now</a>
            </li>
            </ul>
            </div>
            &copy; 2019 <a href="https://www.multipurposethemes.com/">Multi-Purpose Themes</a>. All Rights Reserved.
        </footer>
    
        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
        
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{asset('admin_template/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js')}}"></script>
    
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
    <script src="{{asset('admin_template/assets/vendor_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin_template/assets/vendor_components/morris.js/morris.min.js')}}"></script>

    <!-- This is data table -->
        <script src="{{asset('admin_template/assets/vendor_components/datatable/datatables.min.js')}}"></script>
    
    <!-- Superieur Admin App -->
    <script src="{{asset('admin_template/main/js/template.js')}}"></script>
    
    <!-- Superieur Admin dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin_template/main/js/pages/dashboard.js')}}"></script>
    
    <!-- Superieur Admin for demo purposes -->
    <script src="{{asset('admin_template/main/js/demo.js')}}"></script>	
        
        
  </body>
</html>