
	@extends('admin.home')<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

      

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
				</ul>

				<div class="page-toolbar">
					<div class="btn-group pull-right">
					<a class="btn btn-lg green" href="{{URL::route('add_users')}}"> Add New
                             <i class="fa fa-plus"></i>
                    </a>
					</div>
				</div>

			</div>

			<?php
					$msg = ''; $msgcls = 'display-hide';

					if(Session::has('message')){

						switch(Session::get('message')){
							
							case 'Add-SUCCESS'	: $msg = 'New User added successfully !';  $msgcls = 'note-success';break;
							case 'Edit-SUCCESS'	: $msg = 'User Edited Successfully !';$msgcls = 'note-success';break;
							case 'ERROR'		: $msg = 'Failed to Update. Please try again later !'; $msgcls = 'note-warning';
							                      break;
							default             : $msg = 'No Changes Done.'; $msgcls = 'note-info'; break;
						} 
					}
						?> 
			<div class="note <?php echo $msgcls;?>">
				<p>
					<?php echo $msg;?>	
				</p>
			</div>


	<div class="note note-warning">
       <div id="divSearchArea">	

        		<form id="user_search" method="post" onsubmit="return false;">
               @csrf
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group">
                                            <input type="text" class="form-control input-lg"  id="name" name="name" placeholder="Name" value="">
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">
                                            <input type="text" class="form-control input-lg"  id="email" name="email" placeholder="Enter Email ID" value="">
                                    </div>
                                </div>
                                
                               

                            </div>
                            <div class="row">

                              
                               
                               
                                <div class="col-md-4"> <span style="visibility:hidden;"> search </span>
                                    <label class="control-label col-md-4"></label>
                                    <button type="submit" class="btn green btn-lg"  id="btnSearch" name="btnSearch" style="padding-left: 14px; margin-left: 17px; width: 197px;">Search</button>

                                </div>

                                <div class="col-md-4"> <span style="visibility:hidden;"> search </span>
                                    <label class="control-label col-md-4"></label>
                                    <button class="btn btn-lg green"  id="btnReset" name="btnReset" style="padding-left: 14px; margin-left: 17px; width: 197px;">Reset</button> <!-- type="reset" --> 
                                </div>

                                
 
                            </div>
            	</form>
        </div>
	</div>

			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">

					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Users
							</div>
							
						</div>
						<div class="portlet-body flip-scroll cusCs">
							<table class="table table-bordered table-striped table-condensed flip-content">
								
								<thead class="flip-content">
								
								<tr>
									<th class="numewric">
										 No.
									</th>
									<th>
										Name
									</th>
									<th>
										Phone  
									</th>
									<th>
                                        Email  
									</th>

									
									<th >
									    Admin Approval Status
									</th>

									
									<th width="200px !important">
									    Action
									</th>

								</tr>

								</thead>
								
							<tbody id="user_body">
							
                            <?php $i =($data->currentPage()-1)*$data->perPage();?>
							
			                @foreach($data as $details) <?php $i++;?>
								<tr>
									<td>
										 {{$i}}
										 <input type="hidden" name="vemdor_id" class="vemdor_id" value="{{Crypt::encrypt($details->id)}}" idStatus='{{$details->admin_approval_status}}'/>
									</td>
									<td>
										 	<a href="">{{$details->fname}} {{$details->lname}} </a>
									</td>
									<td>
										  	{{$details->mobile}}
									</td>
									<td>
										  	{{$details->email}}
									</td>

								

									
									<td>
									<?php 
										switch($details->admin_approval_status){

		 									case '0'  : echo '<button class="btn blue-hoki stat-btn"> Pending </span>'; break;
											case '1'  : echo '<button class="btn green stat-btn"> Approved </span>'; break;
								        } 
									?>
										 
									</td>

								
								

									<td>
										<a href="{{URL::route('edit_user',Crypt::encrypt($details->id))}}" class="btn-lg viWe">
										 Edit
										</a>
										<a href="javascript:void(0)" data-id ="{{Crypt::encrypt($details->id)}}" id="delete_user" class="btn-lg viWe">
										<!--	<i class="fa fa-trash" title="Delete"></i> --> Delete
										</a>

										

									</td>

								</tr>
							@endforeach
								<tr>
									<td colspan="7">
									{!! str_replace('/?', '?', $data->render()) !!}
			                    	</td>
			                	</tr>
							</tbody>
							</table>
	
							
               
						</div>
					</div>
 				

				
				</div>
			</div>
 		</div>
 		

	<script type="text/javascript">

$(document).ready(function(){ 
        	$('.stat-btn').click(function(){ 	
	           	var user_id = $(this).parent().parent().find('.vemdor_id').val();
	           	var that = this;
	           	if($(this).hasClass('blue-hoki'))
	           		status = 0;
	           	else
	           		status =1;
					   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
	                $.ajax({
	                        type    :'post',
						    url     :'change_user_approval',
	 					    async   :false,
	 					    context :this,
						    data    :{user_id:user_id,status:status},
	                        success : function (Result) {
	 							
	 							
					                $(that).html().trim()== 'Pending' ? $(that).html('Approved') : $(that).html('Pending');  
					                $(that).toggleClass('btn blue-hoki');  
					                $(that).toggleClass('btn green stat-btn'); 
	    						
	                 	    }
	                });
	        });

});

	$('#btnSearch').click(function(){
				data = $('#user_search').serialize(); 
				page = 1;
				getTransaction(page,data);
		});

	

	$(window).on('hashchange',function(){
        page = window.location.hash.replace('#','');
    });


	$('body').on('click', '.pagination a', function(e) {

        e.preventDefault();
        //to get what page, when you click paging
        var page = $(this).attr('href').split('page=')[1]; 
        data = $('#user_search').serialize();        
        getTransaction(page,data);
        location.hash = page;

    }); 
	

	
	$('#btnReset').click(function(){  
    	 $('#user_search').trigger("reset");
    	 $( "#btnSearch" ).trigger( "click" );   
    });
	
	$('#btnSearch').click(function(){
	         data = $('#user_search').serialize(); 
	         page = 1;
	        getTransaction(page,data);
	});

	function getTransaction(page,data) {
        
		$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
		$.ajax({
		type: 'POST',
		dataType : 'json',
		data: {filterOpts: data},
		url: 'user_search?page='+page
			}).done(function(data) {
				$('#user_body').html('');
				$('#user_body').html(data.view);
		 });   
	  
	 
}



   

    $('body').on('click', '#delete_user', function() {
    		var cnfm = confirm("Are you sure you want to delete this?");
            if(cnfm){
            	var that = this;
           	      var id = $(this).attr('data-id');
					 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
           	      $.ajax({
                        type: "POST",
                        url: 'delete_user',
						dataType : 'html',
                        cache: false,
                        async:false,
                        data: {id:id},
                        success: function(Result){
                               if(Result==1){ 
                                  	$(that).closest("tr").remove();
                                  	$(".note").removeClass('display-hide').addClass('note-warning').find("p").text("User Deleted Successfully!");
                                 }
                        }
                  });
           	}
    });

	</script>

<script type="text/javascript" src="{{ asset('admin/plugins/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/plugins/date-range-picker/daterangepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/plugins/date-range-picker/datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/plugins/date-range-picker/app.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/plugins/date-range-picker/components-date-time-picker.min.js') }}"></script>



@endsection

        