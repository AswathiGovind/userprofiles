
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">

			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				
				<li class="mainli">
					
						<a href="{{URL::route('dashboard')}}" id="dashboard">
							
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					{{-- <span class="arrow"></span> --}}
					</a>
					
				</li>

				

				<li class="mainli">
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">Manage Users</span>

					<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>
						<a href="{{URL::route('list_users')}}">

							Manage Users
							</a> 
						</li>
						<li>
							<a href="{{URL::route('add_users')}}" id="addpage">
							Add Users </a>
						</li>												
					</ul>

				</li> 
			
				 
			
				


			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>

	
	<script type="text/javascript">
	
	$(document).ready(function(){

		var strActiveMenu = '<?php echo $strActiveMenu;?>';

		$("#"+strActiveMenu).parent().addClass('active');  // inner li active
		$("#"+strActiveMenu).closest('li.mainli').addClass('active open');// parent li 
		$("#"+strActiveMenu).closest('li.mainli').find('.arrow').addClass('open').before('<span class="selected"></span>');  //span arrow
		});

    </script>
