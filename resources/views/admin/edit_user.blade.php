@extends('admin.home')
@section('content')





@foreach($data as $details)
@endforeach







<div class="page-content">
<h3 class="page-title">
			Users

			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{URL::route('dashboard')}}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{URL::route('list_users')}}">Users</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Edit </a>
					</li>
				</ul>
			 <div class="page-toolbar">
					<div class="btn-group pull-right">
					<a href="{{URL::route('list_users')}}">
						<button type="button" class="btn btn-fit-height grey-salt">
						List All <i class="fa fa-list"></i>
						</button>
					</a>
					</div>
				</div>
			</div>
 
				<div class="row">
				<div class="col-md-12 ">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-pencil"></i> Edit
							</div>
							
						</div>
						<div class="portlet-body form">

							
                            <form action="../update_user" method="post" enctype="multipart/form-data">
							@csrf
								<div class="form-body"> 				 
								 	<input type="hidden" id="user_id" name="user_id" value="{{$details->id}}">	

 									<div class="form-group ">
										<label class="col-md-3 control-label font-lmd">First Name *</label> 
										<div class="col-md-8">
											<div class="input-icon right">
 											   <input type="text" class="form-control input-lg" placeholder='First Name' name="first_name" id="first_name" value="{{$details->fname}}">	
									 		   <span class='help-block spanEr' id="error1" onmouseover="hide(this.id);"></span>	 
 											</div>
										</div>
									</div>			
 	 
 									<div class="form-group">
										<label class="col-md-3 control-label font-lmd">Last Name *</label> 
										<div class="col-md-8">
											<div class="input-icon right">
 											    <input type="text" class="form-control input-lg" placeholder="Last Name" name="last_name" id="last_name" value="{{$details->lname}}">	
 											</div>
										</div>
									</div>			
	 
	 								<div class="form-group">
										<label class="col-md-3 control-label font-lmd">Phone *</label> 
										<div class="col-md-8">
											<div class="input-icon right">
 											    <input type="text" class="form-control input-lg" placeholder="mobile" name="mobile" id="mobile" value="{{$details->mobile}}">	
 											</div>
										</div>
									</div>
										
 									<div class="form-group">
										<label class="col-md-3 control-label font-lmd">Email *</label> 
										<div class="col-md-8">
											<div class="input-icon right">
 											   <input type="email" class="form-control input-lg" placeholder="Email"  name="email" id="email" value="{{$details->email}}" disabled>
 											   <span class='help-block spanEr' id="error2" onmouseover="hide(this.id);"></span>	
 											</div>
										</div>
									</div>	

								

		

 									


 						
	 								
 										
	 
	 								<div class="form-group">
										<label class="col-md-3 control-label font-lmd">Photo</label> 
										
										<div class="col-md-8">
										<img src="{{URL::to('admin/user_image')}}/{{$details->image}}">
											<div class="input-icon right">
 											   <input type="file" class="form-control input-lg" placeholder="Logo"  name="user_img" id="user_img">	
  											</div>
										</div>
									</div>

								
									
 								


								

 									
	 								<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-4 col-md-8">
												<a href="{{URL::route('list_users')}}" class="btn red font-lmd btn-lg">Cancel</a> &nbsp&nbsp
												
												<button type="submit" class="btn blue font-lmd btn-lg">Submit</button>
														
											</div>
										</div>
									</div>

						</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
		
		
				</div>
			
			</div>
		</div>
 




<input type="hidden" id="url" value="">












@endsection
