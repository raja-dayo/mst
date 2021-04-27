<?php

	include_once("include/header.php");
		
		$poor=0;
		$bad=0;
		$average=0;
		$greate=0;
		$excellent=0;
	foreach ($reviews as $key => $value) {
		
		if($value['rating']==1){

			$bad +=1;
		}
		elseif ($value['rating']==2) {
			$poor +=1;
		}
		elseif ($value['rating']==3) {
			
			$average +=1;
		}
		elseif ($value['rating']==4) {
			
			$greate +=1;
		}
		else{
			$excellent +=1;
		}
	}
?>

<div class="content-wrapper">
    <div class="row">
		<div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
					<h4 class="card-title">Data table</h4>
                	<div class="template-demo">
                    	<button type="button" class="btn btn-outline-primary btn-icon-text">
                      		<i class="ti-file btn-icon-prepend"></i>
                      		Block
                    	</button>
                    	

                        <button type="button" class="btn btn-danger btn-icon-text" id="ban" value="<?=$orders[0]['cus_status']?>">
                          <i class="ti-alert btn-icon-prepend"></i>                                                    
                          <?php
                          	echo ($orders[0]['cus_status']==1 ? 'Unban':'Ban');
                          ?>
                        </button>
                        <button type="button" class="btn btn-outline-success btn-icon-text" data-toggle="modal" data-target="#updateCus" data-whatever="@mdo"><i class="ti-upload btn-icon-prepend"></i>                                                    
                          Update</button>
                     
                    	
                    	<button type="button" class="btn btn-outline-warning btn-icon-text" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="ti-reload btn-icon-prepend"></i>Reset Password</button>
                  	</div>
                </div>
                  
            </div>
        </div>
	</div>
	<div class="row">
		<div class="col-lg-4 grid-margin">
            <div class="card">
            	<div class="card-body">
					<div class="py-4">
                        <p class="clearfix">
                          <span class="float-left">
                            Status
                          </span>
                          <span class="float-right text-muted">
                            Active
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            First Name
                          </span>
                          <span class="float-right text-muted">
                            <?=$orders[0]['cus_fname']?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Last Name
                          </span>
                          <span class="float-right text-muted">
                            <?=$orders[0]['cus_lname']?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Email
                          </span>
                          <span class="float-right text-muted">
                             <?=$orders[0]['cus_email']?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Phone
                          </span>
                          <span class="float-right text-muted">
                             <?=$orders[0]['cus_phone']?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Address
                          </span>
                          <span class="float-right text-muted">
                             <?=$orders[0]['cus_add']?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            City
                          </span>
                          <span class="float-right text-muted">
                             <?=$orders[0]['cus_city']?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            State
                          </span>
                          <span class="float-right text-muted">
                             <?=$orders[0]['cus_state']?>
                          </span>
                        </p>
                         <p class="clearfix">
                          <span class="float-left">
                            Zipcode
                          </span>
                          <span class="float-right text-muted">
                             <?=$orders[0]['cus_zipcode']?>
                          </span>
                        </p>
                         <p class="clearfix">
                          <span class="float-left">
                            Country
                          </span>
                          <span class="float-right text-muted">
                             <?=$orders[0]['cus_country']?>
                          </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-lg-8 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="order-listing" class="table">
							<thead>
								<tr>
									<th>Order #</th>
									<th>Customer</th>
									<th>Date</th>
									<th>Payment Tpye</th>
									<th>Amount</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
						    </thead>
						    <tbody>
							<?php
								foreach ($orders as $key => $order) 
								{
	                        		?>
                        				<tr>
                        				    <td><?php echo  '#'.$order['od_id']?></td>
                        					<!--<td><?php echo $order['od_id']  //$key+1; ?></td>-->
                        					
											<td><?php echo ucfirst($order['cus_fname'])." ".ucfirst($order['cus_lname']); ?></td>
											<td><?php echo $order['od_create_on'] ?></td>
											<!--<td><?php echo ucfirst($order['cus_email']); ?></td>-->
											<td>
												<?php
													if($order['od_payment_type']==2){
														?>
															<span class="">Bank Transfer</span>
														<?php
													}else if($order["od_payment_type"]==3){
														?>
															<span class="">Bitcoin</span>
														<?php
													}
													else if($order["od_payment_type"]==1){
														?>
															<span class="">Master Card</span>
														<?php
													}
												?>
											</td>
											
											<!--<td><?php echo '£'.$order['od_total']  ?></td>-->
											<td><?php echo   ($order['od_s_country']=='UK')? "£ $order[od_total]+$order[od_d_charge]":"$ $order[od_total]+$order[od_d_charge]"?></td>
										    <td>
												<?php
													if($order["od_status"]==1){
														?>
															<label class="badge badge-gradient-info">On hold</label>
														<?php
													}else if($order["od_status"]==2){
														?>
															<span style='color:#18879d'>Processing</span>
														<?php
													}else if($order["od_status"]==3){
														?>
															<span style='color:#389466'>Compeleted</span>
														<?php
													}else if($order["od_status"]==4){
														?>
															<span style='color:#f16857'>Canceled</span>
														<?php
													}
												?>
											</td>
										  
										    <td>
												<!--<form method="POST" action="<?php echo site_url('admin/view_order')?>">
													<button class="btn btn-outline-primary" type="submit" name="view_order_id" value="<?php echo $order['od_id'];?>" >View</button>
                                                </form>-->
                                                
                                                	<a href='<?php echo base_url()."admin/view_order?od_id=$order[od_id]"?>' class="btn btn-outline-primary">View</a>
											</td>
                        				</tr>
	                        			<?php
	                        		}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
    	<div class="col-lg-12 grid-margin stretch-card">
      		<div class="card">
        		<div class="card-body">
          			<h4 class="card-title">BAN History</h4>
          			<p class="card-description">Use class <code>.accordion</code> for basic accordion</p>
          			<div class="mt-4">
            			<div class="accordion" id="accordion" role="tablist">
			              <div class="card">
			                <div class="card-header" role="tab" id="heading-1">
			                  <h6 class="mb-0">
			                    <a data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
			                      How can I pay for an order I placed?
			                    </a>
			                  </h6>
			                </div>
			                <div id="collapse-1" class="collapse" role="tabpanel" aria-labelledby="heading-1" data-parent="#accordion">
			                  <div class="card-body">
			                    <div class="row">
			                      <div class="col-3">
			                        <img src="../../../../images/samples/300x300/10.jpg" class="mw-100" alt="image"/>                              
			                      </div>
			                      <div class="col-9">
			                        <p class="mb-0">You can pay for the product you have purchased using credit cards, debit cards, or via online banking. 
			                        We also on-delivery services.</p>                             
			                      </div>
			                    </div>
			                  </div>
			                </div>
			              </div>
			              <div class="card">
			                <div class="card-header" role="tab" id="heading-2">
			                  <h6 class="mb-0">
			                    <a class="collapsed" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
			                      I can’t sign in to my account
			                    </a>
			                  </h6>
			                </div>
			                <div id="collapse-2" class="collapse show" role="tabpanel" aria-labelledby="heading-2" data-parent="#accordion">
			                  <div class="card-body">
			                      <p>If while signing in to your account you see an error message, you can do the following</p>
			                    <ol class="pl-3 mt-4">
			                      <li>Check your network connection and try again</li>
			                      <li>Make sure your account credentials are correct while signing in</li>
			                      <li>Check whether your account is accessible in your region</li>
			                    </ol>
			                    <br>
			                    <p class="text-success">
			                      <i class="ti-alert mr-2"></i>If the problem persists, you can contact our support.
			                    </p>
			                  </div>
			                </div>
			              </div>
			              <div class="card">
			                <div class="card-header" role="tab" id="heading-3">
			                  <h6 class="mb-0">
			                    <a class="collapsed" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
			                      Can I add money to the wallet?
			                    </a>
			                  </h6>
			                </div>
			                <div id="collapse-3" class="collapse" role="tabpanel" aria-labelledby="heading-3" data-parent="#accordion">
			                  <div class="card-body">
			                    <p class="mb-0">You can add money to the wallet for any future transaction from your bank account using net-banking, or credit/debit card transaction. The money in the wallet can be used for an easier and faster transaction.</p>
			                  </div>
			                </div>
			              </div>
            			</div>
          			</div>
       			</div>
      		</div>
    	</div>
  	</div>
		  
  	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
      		<div class="card">
        		<div class="card-body">
          			<h4 class="card-title">Reviews</h4>
		          <div class="table-responsive">
		            <table class="table table-bordered text-center">
		              <thead>
		                <tr>
		                  <th>Total</th>
		                  <th>Poor</th>
		                  <th>BAD</th>
		                  <th>Average</th>
		                  <th>Greate</th>	
		                  <th>Excellent</th>
		                </tr>
		              </thead>
		              <tbody>
		                <tr>
		                  <td><?=count($reviews)?></td>
		                  <td><?=$poor;?></td>
		                  <td><?=$bad;?></td>
		                  <td><?=$average;?></td>
		                  <td><?=$greate;?></td>
		                  <td><?=$excellent;?></td>
		                </tr>
		              </tbody>
		            </table>
		          </div>
        		</div>
      		</div>
    	</div>
  	</div>
		  
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"            aria-hidden="true">
		<div class="modal-dialog" role="document">
	  		<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Password Reset</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
	      		</div>
		        <div class="modal-body">
		        	<form>
		          		<div class="form-group">
		            		<label for="recipient-name" class="col-form-label">New Password</label>
		            		<input type="password" class="form-control"  name="password" id="password">
		          		</div>
		          		<div class="form-group">
		            		<label for="recipient-name" class="col-form-label">Confirm Password</label>
		            		<input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
		            		<div id="msg"></div>
		          		</div>
		        	</form>
		        </div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        		<button type="button" class="btn btn-primary" id="ex" data-dismiss="modal">Save</button>
	      		</div>
	    	</div>
	   </div>
	</div>


	<div class="modal fade" id="updateCus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"            aria-hidden="true">
		<div class="modal-dialog" role="document">
	  		<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
	      		</div>
		        <div class="modal-body">
		        	<form>
					  <div class="form-row">
					    <div class="form-group col-lg-6">
					      <label for="inputEmail4">First Name</label>
					      <input type="text" class="form-control" id="fname" placeholder="First Name" value="<?=$orders[0]['cus_fname']?>">
					    </div>
					    <div class="form-group col-lg-6">
					      <label for="inputPassword4">Last Name</label>
					      <input type="text" class="form-control" id="lname" placeholder="Last Name" value="<?=$orders[0]['cus_lname']?>">
					    </div>
					  </div>
					  <div class="form-row">
					    <div class="form-group col-lg-6">
					      <label for="inputEmail4">Email</label>
					      <input type="email" class="form-control" id="email" placeholder="Email"  value="<?=$orders[0]['cus_email']?>">
					    </div>
					    <div class="form-group col-lg-6">
					      <label for="inputPassword4">Phone</label>
					      <input type="text" class="form-control" id="phone" placeholder="Phone" value="<?=$orders[0]['cus_phone']?>">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputAddress">Address</label>
					    <input type="text" class="form-control" id="add" placeholder="1234 Main St" value="<?=$orders[0]['cus_add']?>">
					  </div>
					 
					  <div class="form-row">
					    <div class="form-group col-lg-6">
					      <label for="inputCity">City</label>
					      <input type="text" class="form-control" id="city" value="<?=$orders[0]['cus_city']?>">
					    </div>
					   
					    <div class="form-group col-lg-6">
					      <label for="inputZip">Zip</label>
					      <input type="text" class="form-control" id="zipcode" value="<?=$orders[0]['cus_zipcode']?>">
					    </div>
					  </div>

					   <div class="form-row">
					    <div class="form-group col-lg-6">
					      <label for="inputState">State</label>
					        <input type="text" class="form-control" id="state" value="<?=$orders[0]['cus_state']?>">
					    </div>

					    <div class="form-group col-lg-6">
					      <label for="inputCity">Country</label>
					      <input type="text" class="form-control" id="country" value="<?=$orders[0]['cus_country']?>">
					    </div>
					  </div>
					  
					
					</form>
		        </div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        		<button type="button" id="update" class="btn btn-primary" data-dismiss="modal" >Save</button>
	      		</div>
	    	</div>
	   </div>
	</div>

	<div class="card">
				<div class="card-body">
					<h4 class="card-title">Ban History</h4>
					<div class="table-responsive">
						<table id="order-listing" class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Ban On</th>
									<th>Ban Off</th>
									
								</tr>
						    </thead>
						    <tbody>
						    	<?php
						    		foreach ($banHistory as $key => $value) {
						    			?>
						    				<tr>
						    					<td><?=$key?></td>
						    					<td><?=$value['ban_on']?></td>
						    					<td><?=$value['ban_update']?></td>
						    				</tr>
						    			<?php
						    		}
						    	?>
							</tbody>
						</table>
					</div>
				</div>
			</div>


</div>

<?php
	
	include_once("include/footer.php");
?>

<script>
    $(document).ready(function(){
        
        $("#ex").click(function(){

            var cus_id = "<?=$orders[0]['cus_id']?>"
            
            var pass   = $("#password").val();

            if (pass!= $("#confirmPassword").val()) {
                
                $("#msg").html("Password do not match").css("color","red");
				
				return false;
            }else{
                
                $.ajax({

                	url:"<?=base_url().'admin/resetCusPass'?>",
                	type:"POST",
                	data:{cus_id, pass},
                	success:function(responce){

                		alert('Password reset successfully');
                	},
                });
            }
        });

        $("#update").click(function(){

            var fname 		=$("#fname").val();
            var lname 		=$("#lname").val();
            var email 		=$("#email").val();
            var phone 		=$("#phone").val();
            var add   		=$("#add").val();
            var city  		=$("#city").val();
            var state 		=$("#state").val();
            var country 	=$("#country").val();
            var zipcode 	=$("#zipcode").val();
            var cus_id 		=<?=$orders[0]['cus_id']?>;

            $.ajax({

            	url:"<?=base_url().'admin/updateCustomer'?>",
            	type:"POST",
            	data:{cus_id, fname, lname, email, phone, add, city, state, country, zipcode},
            	success:function(responce){

            		//alert(responce);
            		location.reload(true);
            	},
            });
        });

        $("#ban").click(function(){

        	var cus_id = "<?=$orders[0]['cus_id']?>";
        	var status = $(this).val();
        	
        	$.ajax({

        		url:"<?=base_url().'admin/banAction'?>",
        		type:"POST",
        		data:{cus_id, status},
        		success:function(responce){

        			location.reload(true);
        			console.log(responce);
        		},
        	});
        });
	});
</script> 