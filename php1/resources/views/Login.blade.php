<!DOCTYPE html>
<html lang="en">
<head>
	<title>Công ty TNHH TM-DV Vạn Liên Hoa - Công ty môi trường - Tư vấn môi trường</title>
	<base href="{{asset('')}}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Theme/Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Theme/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Theme/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Theme/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Theme/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Theme/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Theme/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="Theme/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="Theme/Login/logo.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="{{url('login')}}" method="POST" role="form">
					{!! csrf_field() !!}
					<span class="login100-form-title">
						Login System
					</span>
                    @if($errors->has('errorlogin'))
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{$errors->first('errorlogin')}}
						</div>
					@endif
					<div class="wrap-input100 validate-input" data-validate = "Email phải có dạng : ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" value="{{old('email')}}">
						@if($errors->has('email'))
							<p style="color:red">{{$errors->first('email')}}</p>
						@endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password"}}>
						@if($errors->has('password'))
							<p style="color:red">{{$errors->first('password')}}</p>
						@endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						{{--  <span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>  --}}
					</div>

					<div class="text-center p-t-136">
						{{--  <a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>  --}}
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="Theme/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Theme/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="Theme/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Theme/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Theme/Login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="Theme/Login/js/main.js"></script>

</body>
</html>