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
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>