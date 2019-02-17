{{-- @extends('layouts.sidebar') --}}

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('admin_template/images/favicon.ico')}}">

    <title>Aplikasi Perhitungan Suara - Log in </title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{ asset('admin_template/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css')}}">
	
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="{{asset('admin_template/main/css/bootstrap-extend.css')}}">
	
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('admin_template/main/css/master_style.css')}}">

	<!-- Superieur Admin skins -->
	<link rel="stylesheet" href="{{asset('admin_template/main/css/skins/_all-skins.css')}}">	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body class="hold-transition bg-img" style="background-image: url({{asset('admin_template/images/gallery/full/6.jpg')}})" data-overlay="4">
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">			
			<div class="col-12">
				<div class="row no-gutters justify-content-md-center">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="content-top-agile h-p100">
							<h2>Aplikasi Perhitungan <br> Suara</h2>
							<p class="text-white">Silahkan Login Untuk Memulai</p>
						</div>				
					</div>
					<div class="col-lg-5 col-md-5 col-12">
						<div class="p-40 bg-white content-bottom h-p100">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-info border-info"><i class="ti-user"></i></span>
										</div>
                                        <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="{{ __('Username') }}" value="{{old('username') }}" id="username" name="username" required autofocus>
                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-info border-info"><i class="ti-lock"></i></span>
										</div>
                                    <input type="password" class="form-control pl-15" placeholder="{{__('password')}}" id="password" name="password" value="{{old('password')}}" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
									</div>
								</div>
								  <div class="row">
									<div class="col-6">
									  <div class="checkbox">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-info btn-block margin-top-10">{{ __('Login') }}</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- jQuery 3 -->
	<script src="{{asset('admin_template/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js')}}"></script>
	
	<!-- popper -->
	<script src="{{asset('admin_template/assets/vendor_components//popper/dist/popper.min.js')}}"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="{{asset('admin_template/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

</body>
</html>
