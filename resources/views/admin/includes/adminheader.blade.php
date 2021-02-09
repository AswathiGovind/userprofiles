<head>
<meta charset="utf-8"/>

<title>User Manual|Admin-Login</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<link rel="icon" href="{{URL::asset('assets/frontend/images/favicon.ico')}}" type="image/x-icon" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->


<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/fonts.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/plugins/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/plugins/simple-line-icons/simple-line-icons.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/plugins/uniform/css/uniform.default.css') }}">




<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/css/common.css') }}">

<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/css/tasks.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/css/components.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/css/plugins.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/layout/css/layout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/custom.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/layout/css/themes/darkblue.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/layout/css/custom.css') }}">


<script src="{{ URL::to('admin/plugins/jquery.min.js') }}"></script>

</head>

 
<?php $user_type = Session::get('user_type');   ?>

<body class="page-header-fixed page-quick-sidebar-over-content page-style-square"> 
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">

			<h4>
				
						<a href="{{URL::route('dashboard')}}" id="dashboard">
					
					

			
			User Manual

			</a> </h4>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

				<li class="dropdown dropdown-extended dropdown-notification hide" id="header_notification_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-bell"></i>
					<span class="badge badge-default">
					7 </span>
					</a>

					 <ul class="dropdown-menu">
						<li class="external">
							<h3><span class="bold">7 pending</span> notifications</h3>
							<a href="extra_profile.html">view all</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
								{{-- <li>
									<a href="javascript:;">
									<span class="time">just now</span>
									<span class="details">
									<span class="label label-sm label-icon label-success">
									<i class="fa fa-plus"></i>
									</span>
									New user registered. </span>
									</a>
								</li> --}}


								
							</ul>
						</li>
					</ul> 
				</li> 
		
			
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
					
					<span class="username username-hide-on-mobile">
						<!-- @if(Session::has('username'))
	                         {{ Session::get('username')}}
	                    @endif -->
					</span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<!-- <li>
							<a href="#">
							<i class="icon-user"></i> Change Password </a>
						</li> -->

						<li class="divider"></li>

						<li>
							
							
							<a href="{{URL::route('logout')}}">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>

			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->



	