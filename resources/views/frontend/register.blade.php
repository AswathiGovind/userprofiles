@include('frontend.includes.header')



<div class="innerTop"></div>

	<div class="wid">
    	

        <h2>Why should you Register here? </h2>
        <ul class="listng">
            <li>You get a free listing in our directory</li>
            <li>You can easily track and manage your quotes</li>
            <li>Make instant quotes</li>
            <li>Get leads sent directly to your inbox</li>
        </ul>    
    </div>
    
    <div class="inRgWrap">
    
    	<div class="wid"> 
        	<div class="inRgOutr">
            	<div class="inRgstNwCap">Register Now</div>
                
                @if(Session::has('message')) 
                    <p class="scsMsg" id="QuoteScs" onmouseover="hide(this.id);"> {{Session::get('message')}} </p> 
                @endif

                <form action="register_user" method="post" enctype="multipart/form-data" onsubmit="return validation_check();">
								@csrf
								<ul>
                        	<li>
                            	<input type="text" placeholder="First Name *" name="first_name" id="first_name">
                                <span class="error hide" id="error21" onmouseover="hide(this.id);"></span>
                            </li>
                            <li>
                                <input type="text" placeholder="Last Name" name="last_name" id="last_name">
                                <span class="error hide" id="error1" onmouseover="hide(this.id);"></span>
                            </li>
                          
                            <li>
                            	<input type="text" placeholder="Phone *" name="mobile" id="mobile">
                                <span class="error hide" id="error22" onmouseover="hide(this.id);"></span>
                            </li>
                            
                            
                            <li>
                            	<input type="text" placeholder="Email *" name="email" id='email'>
                                <span class="error hide" id="error23" onmouseover="hide(this.id);"></span>
                            </li>
                            

                           
                            
                            <li>
                            	<input type="Password" placeholder="Password *" id='password' name='password'>
                                <span class="error hide" id="error24" onmouseover="hide(this.id);"></span>
                            </li>
                            
                            <li>
                            	<input type="Password" placeholder="Confirm Password *" id="conf_pwd">
                                <span class="error hide" id="error25" onmouseover="hide(this.id);"></span>
                            </li>
                            
                           <li>
										<label class="col-md-3 control-label font-lmd"> Image </label> 
										
										
 											   <input type="file" class="form-control input-lg" placeholder="Image"  name="user_img" id="user_img">	
  											</li>
                         



                                    
                            <li id="frm_action" class="fulWidth">
                              	<ul>
                                    <li><input type="submit" value="Register Now > " title="Register Now "></li>
                                    <li> <button class="btn default btn-info btReset gtAqt" id="" title="Reset" type="reset">Reset > </button>  </li>
                                </ul>
                            </li>
                            {{-- <li> 
                                   
                            </li>
                                 --}}
                        </ul>

						</form>
            </div>
        </div>
    </div>

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
					var id = $("#vendor_id").val();
					var url = $("#url").val();
					$.ajax({
							type    :'post',
							url     :url+'/admin/check_user_email',
							 async   :false,
							 context :this,
							data    :{email:email,id:id},
							success : function (Result) {
								 if(Result){
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

	if ($("#conf_pwd").val() == ""){
		var msg = "please enter confirm password";
		goToByScroll("conf_pwd", msg);
		flag=1;

	} 

	if($("#conf_pwd").val()){
			if ($("#conf_pwd").val() != $("#password").val()){
					var msg = "Your password Doesn't match";
					goToByScroll("conf_pwd", msg);
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


<!-- Google Cpatcha -->

  @include('frontend.includes.footer')