


$("#get_quote").click(function(){

	if(!($('#quote_form').length))
	 	$( "#form_ul" ).wrap( "<form id='quote_form' method='POST' onsubmit='return false;'></form>" ); 
	   
       
       var valid = quote_validation_check();

	 	if(valid==1)    
			{
				return false;
			}
		else{
				 data = $('#quote_form').serialize();   
				 var imgArr=[]; var i=0;
				
                 $(".brsUtr").each(function(index) { 
                        imgArr.push($(".brsUtr:nth-child("+(index+1)+")").attr('fl_nm'));
                 }) 

				$.ajax({
			            type    :'post',
						url     :'quote_submit',
						dataType : 'json',
			 			async   :false,
			 			context :this,
						data    :{data:data,imgArr:imgArr,rt:1},
			            success : function (Result) {
			  						$("#refresh_status").val(1);
			  						$("#refresh_sub").trigger('click');
                                    window.location.href = 'thank-you'; 
			         	  	}
			    });
		} 
				
});


function quote_validation_check(){

	var flag=0;

			if ($("#name").val() == ""){
				var msg = "please enter the name";
				goToByScroll("name", msg);
				flag=1;

			}

			if ($("#phone").val() == ""){
				
				var msg = "please enter the phone";
				goToByScroll("phone", msg);
				flag=1;
			} 

            if ($("#phone").val()){
                var ph = $("#phone").val();  
                if(/^\d+$/.test(ph)==false)
                {
                     var msg = "please enter valid format";
                     goToByScroll("phone", msg); 
                     flag=1;
                }  
            }	

			if ($("#email").val() == ""){
				var msg = "please enter the email";
				goToByScroll("email", msg);
				flag=1;

			}  

			if($("#email").val()){
					var email=$("#email").val();
                    var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
                    if (pattern.test(email)) {
							
                    } else {
                            var msg = "Please enter a valid email";
							goToByScroll("email", msg);
							$("#email").val('');
							flag=1;
                                    
                    }
			}

			if ($("#make").val() == ""){
				var msg = "please enter make";
				goToByScroll("make", msg);
				flag=1;

			}  

			if ($("#model").val() == ""){
				var msg = "please enter model";
				goToByScroll("model", msg);
				flag=1;

			}  

			if ($("#year").val() == ""){
				var msg = "please enter year";
				goToByScroll("year", msg);
				flag=1;

			}
            if ($("#year").val()){
                var ph = $("#year").val();  
                if(/^\d+$/.test(ph)==false)
                {
                     var msg = "please enter valid format";
                     goToByScroll("year", msg); 
                     flag=1;
                }  
            }   

            if ($("#postal_code").val() == ""){
                var msg = "please enter postal code";
                goToByScroll("postal_code", msg);
                flag=1;

            } 
            if ($("#postal_code").val()){
                var ph = $("#postal_code").val();  
                if(/^\d+$/.test(ph)==false)
                {
                     var msg = "please enter valid format";
                     goToByScroll("postal_code", msg); 
                     flag=1;
                }  
            }  

            if ($("#location").val() == ""){
                var msg = "please select location";
                goToByScroll("location", msg);
                flag=1;

            }  

            var v = grecaptcha.getResponse();
            if(v.length == 0)
                {
                        var msg = "You can't leave Captcha Code empty";
                        goToByScroll("captcha", msg);
                        flag=1;
                       
                }


			return flag;

}
 
$("#btNreset").click(function() { 
    $(this).closest('#form_ul').find("input[type=text], textarea,select").val(""); 
    $( ".files" ).empty(); 
});

$("#btnVenReset").click(function() { 
    $(this).closest('#savenewvendor').find("input[type=text], textarea,select").val(""); 
});

function vendor_validation_check(){    

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

            if ($("#company_name").val() == ""){
                var msg = "please enter the company name";
                goToByScroll("company_name", msg);
                flag=1;

            }

            if ($("#email").val() == ""){
                var msg = "please enter the email";
                goToByScroll("email", msg);
                flag=1;

            }  

            if($("#email").val()){
                    var email=$("#email").val();
                    var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
                    if (pattern.test(email)) {
                            var id = $("#vendor_id").val();
                            var url = $("#url").val();
                            $.ajax({
                                    type    :'post',
                                    url     :url+'/check_email',
                                    async   :false,
                                    context :this,
                                    data    :{email:email,id:id},
                                    success : function (Result) {
                                        if(Result){
                                            var msg = "This email already exist";
                                            goToByScroll("email", msg);
                                            $("#email").val('');
                                            flag=1;
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

            if ($("#conf_pwd").val()){
                if($("#password").val()!=$("#conf_pwd").val()){
                    var msg = "Your password doesn't match";
                    goToByScroll("conf_pwd", msg);
                    flag=1;
                }
            }   

            if ($("#mobile").val() == ""){
                
                var msg = "please enter the mobile";
                goToByScroll("mobile", msg);
                flag=1;
            }   

            if ($("#mobile").val()){
                var ph = $("#mobile").val();  
                if(/^\d+$/.test(ph)==false)
                {
                     var msg = "please enter valid format";
                     goToByScroll("mobile", msg); 
                     flag=1;
                }  
            }   

            if ($("#location").val() == ""){
                var msg = "please select location";
                goToByScroll("location", msg);
                flag=1;

            }  
            
            var v = grecaptcha.getResponse();
            if(v.length == 0)
                {
                        var msg = "You can't leave Captcha Code empty";
                        goToByScroll("captcha", msg);
                        flag=1;
                       
                }

            if(flag==1)    
            {
                return false;
            }
            else 
                return true;
        }

function login_validation(){

            var flag=0;

		    if ($("#email").val() == ""){
                var msg = "please enter the email";
                goToByScroll("email", msg);
                flag=1;

            }  

            if($("#email").val()){
                    var email=$("#email").val();
                    var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
                    if (pattern.test(email)) {
                       //
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
            if(flag==1)    
            {
                return false;
            }
            else 
                return true;
}

function password_validation(){

            var flag=0;

            if ($("#user_email").val() == ""){
                var msg = "please enter email";
                goToByScroll("user_email", msg);
                flag=1;

            }  
            if($("#user_email").val()){
                    var email=$("#user_email").val();
                    var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
                    if (pattern.test(email)) {
                            var id = $("#vendor_id").val();
                            var url = $("#url").val();
                            $.ajax({
                                    type    :'post',
                                    url     :url+'/check_email',
                                    async   :false,
                                    context :this,
                                    data    :{email:email,id:id},
                                    success : function (Result) {
                                        if(Result){
                                            //
                                        }   else{
                                            var msg = "This email doesn't exist";
                                            goToByScroll("user_email", msg);
                                            $("#email").val('');
                                            flag=1;
                                        }
                                    }
                                });
                    } else {
                            var msg = "Please enter a valid email";
                            goToByScroll("user_email", msg);
                            $("#user_email").val('');
                            flag=1;
                                    
                    }
            }
            if(flag==1)    
            {
                return false;
            }
            else 
                return true;
}


function save_pwd_valid(){

            var flag = 0;

            if ($("#new_password").val() == ""){
                var msg = "please enter password";
                goToByScroll("new_password", msg);
                flag=1;

            }  

            if ($("#conf_pwd").val() == ""){
                var msg = "please enter confirm password";
                goToByScroll("conf_pwd", msg);
                flag=1;

            }  

            if ($("#conf_pwd").val()){
                if($("#new_password").val()!=$("#conf_pwd").val()){
                    var msg = "Your password doesn't match";
                    goToByScroll("conf_pwd", msg);
                    flag=1;
                }
            }   

            if(flag==1)    
            {
                return false;
            }
            else 
                return true;
}
function goToByScroll(id, msg) { 
		  		
  		$("#"+id).parent().find('span').text(msg);
		$("#"+id).parent().find('span').show();
		$("#"+id).focus();
			   
		// Remove "link" from the ID
		id = id.replace("link", "");
		// Scroll
		//$('html,body').animate({ scrollTop: $("#" + id).offset().top - 100}, 'slow');
}

function hide(id){
		$("#"+id).hide();
}

$("#forgot_pwd").click(function(){
    $(".lognHdng").text('Change Password');
    $( "#loginDv" ).addClass("hidecal" );
    $("#pwdDv").fadeIn();

});




