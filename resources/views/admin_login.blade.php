<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="{{asset('public/admin_login/images/icons/favicon.ico')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/admin_login/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/admin_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/admin_login/vendor/animate/animate.css')}}">	
	<link rel="stylesheet" type="text/css" href="{{asset('public/admin_login/vendor/css-hamburgers/hamburgers.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('public/admin_login/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/admin_login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/admin_login/css/main.css')}}">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('public/admin_login/images/img-01.png')}}" alt="IMG">
				</div>
				
				<form action="{{URL::to('/admin-dashboard')}}" method="post" >
					{{ csrf_field() }}
					<span class="login100-form-title">
						 Admin
					</span>
					<?php
						$message_admin = Session::get('message_admin');
						if($message_admin){
							echo '<span class="text-alert">'.$message_admin.'</span>';
							Session::put('message_admin',null);
							}
						?>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						
						<input class="input100" type="text" name="admin_email" placeholder="Điền email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="admin_password" placeholder="Điền Mật Khẩu">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Đăng Nhập
						</button>

					</div>
					<div class="text-center p-t-12">
						<span class="txt1">
							
						</span>
						<a class="txt2" href="#">
							
						</a>
					</div>

					<div class="text-center p-t-136">
						<a >
							
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	
	

	
	<script src="{{asset('public/admin_login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('public/admin_login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('public/admin_login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/admin_login/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('public/admin_login/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="{{asset('public/admin_login/js/main.js')}}"></script>

</body>
</html>



