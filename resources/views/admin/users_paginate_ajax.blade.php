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



