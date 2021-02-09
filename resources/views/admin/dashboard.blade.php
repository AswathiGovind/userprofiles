@extends('admin.home')
@section('content')




<div class="page-content" style="height:700px;">
		

			<h3 class="page-title"> Dashboard </h3>

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Dashboard</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->

			<!-- BEGIN DASHBOARD STATS -->
			<div class="row dashCust">

				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="more" href=" {{URL::route('list_users')}}">
							<div class="dashboard-stat blue">
								<div class="visual">
									<i class="icon-diamond"></i>
								</div>
								<div class="details">
									<div class="number">
										Users
									</div>
									<div class="desc">
										
									</div>
								</div>
								<span class="more" >
									View more <i class="m-icon-swapright m-icon-white"></i>
								</span>
							</div>
					</a>	
				</div>

				
			
				
			

				

			</div>
			@if(Session::has('mail_message'))
				<div class="note note-success">
					<p>
						{{Session::get('mail_message')}}
					</p>
				</div>	
			@endif

				

			
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			
			<div class="clearfix">
			</div>

			<div class="clearfix">
			</div>
			
		
			<div class="clearfix">
			</div>
		
		
</div>

<link rel="stylesheet" href="{{ asset('admin/plugins/reveal/reveal.css') }}">
<script src="{{ asset('admin/plugins/reveal/jquery.reveal.js') }}"></script>

@endsection