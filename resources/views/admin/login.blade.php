<!DOCTYPE html>

<html lang="en">

<head>
<meta charset="utf-8"/>

<title>User Manual|Admin-Login</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- < meta name="csrf-token" content="{{ csrf_token() }}" /> -->
<!-- BEGIN GLOBAL MANDATORY STYLES -->

<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/fonts.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/plugins/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/plugins/simple-line-icons/simple-line-icons.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/plugins/uniform/css/uniform.default.css') }}">




<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/pages/css/login.css') }}">

<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/css/components.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/css/plugins.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/layout/css/layout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/layout/css/themes/darkblue.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/layout/css/custom.css') }}">
<script src="{{ URL::to('admin/plugins/jquery.min.js') }}"></script>

<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>

<body class="login">

<div class="menu-toggler sidebar-toggler">
</div>

<div class="logo">
	{{-- <a href="index.html">
	<img src="{{URL::asset('assets/images/used-cars-directory-logo.png')}}" alt=""/>
	</a> --}}
</div>

<div class="content">


		<form method='post' action='dologin' id='adminlogin' name='adminlogin' >
		@csrf
 		<h3 class="form-title">Sign In </h3>
		
		 <?php 
			$shwmsg = '';
			if(isset($_REQUEST['message'])){
				$shwmsg = $_REQUEST['message'];
			}
			else if(isset($message)){
				$shwmsg = $message;
			}
			?>
 
		<div class="alert alert-danger <?php if($shwmsg =='') echo 'display-hide';?>">
			<button class="close" data-close="alert"></button>
			<span>
			<?php echo $shwmsg;?>
			</span>
		</div>
		
		
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" id="username"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"  id="password"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Login</button>

		</div>
		</form>
	


</div>
@include('admin/includes/adminfooter');

</html>