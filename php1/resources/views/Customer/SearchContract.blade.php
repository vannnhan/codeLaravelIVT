<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kiểm tra tiến độ hợp đồng - Công ty Môi trường Vạn Liên Hoa</title>
    <base href="{{asset('')}}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Theme/Customer/Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Theme/Customer/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Theme/Customer/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Theme/Customer/Login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Theme/Customer/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Theme/Customer/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Theme/Customer/Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Theme/Customer/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Theme/Customer/Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Theme/Customer/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="Theme/Customer/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('Theme/Customer/Login/images/bg-01.jpg');">
		
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" role="form" method="POST" action="{{route('ContractGetSearch')}}">
                    {!! csrf_field() !!}
				<span class="login100-form-title p-b-37">
					<img src="Theme/Customer/Login/images/logo.png" width="100%">
				</span>
                @if(Session::has('message'))
                <div class="alert alert-danger">
                  <li>{{Session::get('message')}}</li>
                </div>
              @endif
				<div class="wrap-input100 validate-input m-b-20">
					<input class="input100" type="text" name="code" placeholder="Nhập mã hợp đồng">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Sign In
					</button>
				</div>
			</form>
			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="Theme/Customer/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Theme/Customer/Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Theme/Customer/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="Theme/Customer/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Theme/Customer/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Theme/Customer/Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="Theme/Customer/Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Theme/Customer/Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Theme/Customer/Login/js/main.js"></script>

</body>
</html>