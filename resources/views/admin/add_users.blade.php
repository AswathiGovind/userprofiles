@extends('admin.home')<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

<link rel="stylesheet" type="text/css" href="{{ URL::to('admin/plugins/jquery_datepicker/jquery-ui.css') }}">




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
						Users
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Add </a>
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
								<i class="fa fa-pencil"></i> Add
							</div>
							
						</div>
						<div class="portlet-body form">

							<form action="save_new_user" method="post" enctype="multipart/form-data" onsubmit="return validation_check();">
								@csrf
								<div class="form-body">
								 
 									<div class="form-group ">
										<label class="col-md-3 control-label font-lmd">First Name *</label> 
										<div class="col-md-8">
											<div class="input-icon right">
 											   <input type="text" class="form-control input-lg" placeholder='First Name' name="first_name" id="first_name" value="">	
									 		   <span class='help-block spanEr' id="error1" onmouseover="hide(this.id);"></span>	 
 											</div>
										</div>
									</div>			
 	 
 									<div class="form-group">
										<label class="col-md-3 control-label font-lmd">Last Name *</label> 
										<div class="col-md-8">
											<div class="input-icon right">
 											    <input type="text" class="form-control input-lg" placeholder="Last Name" name="last_name" id="last_name" value="">	
									 			<span class='help-block spanEr' id="error12" onmouseover="hide(this.id);"></span>
 											</div>
										</div>
									</div>	
	
									<div class="form-group">
										<label class="col-md-3 control-label font-lmd">Mobile *</label> 
										<div class="col-md-8">
											<div class="input-icon right">
 											   <input type="text" class="form-control input-lg" placeholder="Mobile"  name="mobile" id="mobile" value="">	
									 			<span class='help-block spanEr' id="error3" onmouseover="hide(this.id);"></span>
 											</div>
										</div>
									</div>

 									<div class="form-group">
										<label class="col-md-3 control-label font-lmd">Email *</label> 
										<div class="col-md-8">
											<div class="input-icon right">
 											   <input type="text" class="form-control input-lg" placeholder="Email"  name="email" id="email" value="">
 											   <span class='help-block spanEr' id="error2" onmouseover="hide(this.id);"></span>	
 											</div>
										</div>
									</div>	

									<div class="form-group">
										<label class="col-md-3 control-label font-lmd">Password *</label> 
										<div class="col-md-8">
											<div class="input-icon right">
 											   <input type="password" class="form-control input-lg" placeholder="Password"  name="password" id="password" value="">
 											   <span class='help-block spanEr' id="error4" onmouseover="hide(this.id);"></span>	
 											</div>
										</div>
									</div>	

									<div class="form-group">
										<label class="col-md-3 control-label font-lmd">Confirm Password *</label> 
										<div class="col-md-8">
											<div class="input-icon right">
 											   <input type="password" class="form-control input-lg" placeholder="Confirm Password"  name="conf_password" id="conf_password" value="">
 											   <span class='help-block spanEr' id="error5" onmouseover="hide(this.id);"></span>	
 											</div>
										</div>
									</div>	

									

									

 						
	 	
	 								<div class="form-group">
										<label class="col-md-3 control-label font-lmd"> Image </label> 
										
										<div class="col-md-8">
											<div class="input-icon right">
 											   <input type="file" class="form-control input-lg" placeholder="Image"  name="user_img" id="user_img">	
  											</div>
										</div>
									</div>

	 								

 									
	 								<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-4 col-md-8">
												<a href="{{URL::route('list_users')}}" class="btn red font-lmd btn-lg">Cancel</a> &nbsp&nbsp
												<button type="reset" class="btn default font-lmd btn-lg">Clear</button> &nbsp&nbsp
												<button type="submit" class="btn blue font-lmd btn-lg">Submit</button>
														
											</div>
										</div>
									</div>

						</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
					
					<input type="hidden" id="vendor_id">	
		
				</div>
			
			</div>
		</div>
 <input type="hidden" value="" id="url">


 <script type="text/javascript">

$("#mobile").keypress(function (e) {

		a=this.id;

		//if the letter is not digit then display error and don't type anything
		if (e.which != 8 && (e.which < 48 || e.which > 57) ) 
		{
			$("#mobile").val('');
			var msg = "characters are not allowed";
			goToByScroll("mobile", msg);
		}else{
			//$("#"+a).removeClass("ero");
		}

});



function validation_check(){ 	


	var flag=0;

	if ($("#first_name").val() == ""){
		var msg = "please enter the first name";
		goToByScroll("first_name", msg);
		flag=1;

	}
	if ($("#last_name").val() == ""){
		var msg = "please enter the last name";
		goToByScroll("last_name", msg);
		flag=1;

	}
	

	if ($("#email").val() == ""){
		var msg = "please enter the email";
		goToByScroll("email", msg);
		flag=1;

	}  

	if($("#email").val()){
			var email = $("#email").val();
			var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
			if (pattern.test(email)) {
					
					var url = $("#url").val();
					
					$.ajax({
							type    :'post',
							url     :'check_user_email',
							 async   :false,
							 context :this,
							data    :{email:email},
							success : function (Result) {
								 if(Result==1){
									 var msg = "This email already exist";
									goToByScroll("email", msg);
									$("#email").val('');
									flag = 1;
								}	
							}
						});
			} else {
					var msg = "Please enter a valid email";
					goToByScroll("email", msg);
					$("#email").val('');
					flag=1;
							
			}
	}

	if ($("#password").val() == ""){
		var msg = "please enter password";
		goToByScroll("password", msg);
		flag=1;

	}  

	if ($("#conf_password").val() == ""){
		var msg = "please enter confirm password";
		goToByScroll("conf_password", msg);
		flag=1;

	} 

	if($("#conf_password").val()){
			if ($("#conf_password").val() != $("#password").val()){
					var msg = "Your password Doesn't match";
					goToByScroll("conf_password", msg);
					flag=1;

				} 
	} 

	
	if ($("#mobile").val() == ""){
		
		var msg = "please enter the mobile";
		goToByScroll("mobile", msg);
		flag=1;
	} 


	
	

	
	if(flag==1)    
	{
		return false;
	}
	else 
		return true;
}

	function goToByScroll(id, msg) { 
		  
		  $("#"+id).parent().find('.spanEr').text(msg);				
		  $("#"+id).parent().parent().parent().find('.help-block').removeClass('hide');
		$("#"+id).parent().parent().parent().addClass('has-error');
		//$("#"+id).focus();
	   
		// Remove "link" from the ID
		id = id.replace("link", "");
		// Scroll
		//$('html,body').animate({ scrollTop: $("#" + id).offset().top - 100}, 'slow');
	}

	function hide(id){
		$("#"+id).addClass('hide');
	}
				
</script>




<script type="text/javascript">
  


      </script>

@endsection
