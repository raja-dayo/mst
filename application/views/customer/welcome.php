<?php

	
	require_once('header.php');
	$customer= $_SESSION['data']['customer']; 

	/*echo "<pre>";

	print_r($customer);
	echo "</pre>";*/
?>

	<style type="text/css">
		.reviewTable td{
			padding: 10px;
		}
	</style>
	<section>
			<div class="container">
						<div class="heading-text heading-section">
							<h2>My Account</h2>
						</div>
			
				<div class="tabs tabs-vertical">
								<div class="row">
									<div class="col-md-3">
										<ul class="nav flex-column nav-tabs" id="myTab4" role="tablist" aria-orientation="vertical">
											<li class="nav-item">
												<a class="nav-link active" id="home-tab" data-toggle="tab" href="#Profile4" role="tab" aria-controls="Profile" aria-selected="true">My Profile</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="profile-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="orders" aria-selected="false">Reviews</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="addReviews" data-toggle="tab" href="#Add_Reviews" role="tab" aria-controls="orders" aria-selected="false">Add Review</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="profile-tab" data-toggle="tab" href="#orders4" role="tab" aria-controls="orders" aria-selected="false">Orders</a>
											</li>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content" id="myTabContent4">
											<div class="tab-pane fade show active" id="Profile4" role="tabpanel" aria-labelledby="home-tab">
												<div class="card-body">
													<form id="form1" class="form-validate" method="POST" action="<?php echo base_url().'user/updateProfile'?>">
														<div class="form-row">
															<div class="form-group col-md-6">
																<label for="FirstName">First Name</label>
																<input type="text" class="form-control" name="FirstName" value="<?php echo $customer['cus_fname']?>" required>
															</div>
															<div class="form-group col-md-6">
																<label for="LastName">Last Names</label>
																<input type="text" class="form-control" name="LastName" value="<?php echo $customer['cus_lname']?>" required>
															</div>
														</div>
														<!--<div class="form-row">
															<div class="form-group col-md-12">
																<label for="Company">Company Name</label>
																<input type="text" class="form-control" name="Company" value="Infinix">
															</div>
														</div>-->
														<div class="form-row">
															<div class="form-group col-md-6">
																<label for="Address">Address</label>
																<input type="text" class="form-control" name="Address" value="<?php echo $customer['cus_add']?>" required>
															</div>
															<div class="form-group col-md-6">
																<label for="Apartment">Postcode / Zip</label>
																<input type="text" class="form-control" name="p_code" value="<?php echo $customer['cus_zipcode']?>" required>
															</div>
														</div>
														
														<div class="form-row">
															
															<div class="col-lg-6 form-group">
						                                        <label for="State">County</label>
						                                        <select id="b_country" name="country">
						                                           <?php
						                                           		foreach ($country as $key => $cun) {
						                                           			?>
						                                           				
						                                           				<option value="<?php echo $cun['iso'];?>"<?=$customer['cus_country']==$cun['iso'] ?'selected="selected"' : '';?>><?php echo $cun['nicename'];?></option> 
						                                           					
						                                           			<?php
						                                           		}
						                                           ?>
						                                        </select>
						                                        <span id="bCountryErr"></span>
						                                    </div>
															<div class="form-group col-md-6">
																<label for="Postcode">State / County</label>
																<input type="text" class="form-control" name="state" value="<?php echo $customer['cus_state']?>" required>
															</div>

														</div>
														<div class="form-row">
															<div class="form-group col-md-6">
																<label for="telephone">City</label>
																<input class="form-control" type="text" name="city" value="<?php echo $customer['cus_city']?>" required>
															</div>
															<div class="form-group col-md-6">
																<label for="telephone">Phone</label>
																<input class="form-control" type="text" name="number" value="<?php echo $customer['cus_phone']?>" required>
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col-md-6">
																<label for="Enail">Email</label>
																<input class="form-control" type="text" name="Email" value="<?php echo $customer['cus_email']?>" required readonly>
															</div>
															<div class="form-group col-md-6">
							                                    <label for="password">Password</label>
							                                    <div class="input-group show-hide-password">
							                                        <input class="form-control" name="password" placeholder="Enter password" type="password" required="" value="<?=$customer['cus_pass']?>">
							                                        <div class="input-group-append">
							                                            <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
							                                        </div>
							                                    </div>
							                                </div>
														</div>

						                                <input type="hidden" name="cus_id" value="<?=$customer['cus_id']?>">
														<button type="submit" class="btn m-t-30 mt-3">Update Profile</button>
													</form>
												</div>
											</div>
											<div class="tab-pane fade" id="orders4" role="tabpanel" aria-labelledby="profile-tab">
												<div class="container">
													<div class="shop-cart">
														<div class="table table-sm table-striped table-responsive">
															<table class="table">
																<thead class="thead-dark">
																	<tr>
																		<th class="cart-product-thumbnail p-10">Product</th>
																		<th class="cart-product-quantity p-10">Description</th>
																		<th class="cart-product-price p-10">Price</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td class="cart-product-thumbnail">
																			<a href="#">
																				<img src="https://www.mysleepingtabs.com/wp-content/uploads/2020/06/WhatsApp-Image-2020-06-03-at-4.36.01-PM1-400x320.jpeg" alt="_">
																			</a>
																			<div class="cart-product-thumbnail-name">Buy Codeine Phosphate 30mg</div>
																		</td>
																		<td class="cart-product-quantity">
																			<p>1</p>
																		</td>
																		<td class="cart-product-price">
																			<span class="amount">$65.95</span>
																		</td>
																	</tr>
																
																
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="Add_Reviews" role="tabpanel" aria-labelledby="profile-tab">
												<div class="container">
													<div class="shop-cart">
														<div class="table table-sm table-striped table-responsive">
															<div class="Write_Review col-lg-12">
																<div class="col-lg-12">
                                           <div class="alert alert alert-success alert-dismissible fade show msg" role="alert" style="display: none;">
                                                <p id="msg"><?php echo $this->session->flashdata('msg');?></p>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
																		<!-- <form action="<?php echo base_url().'shop/add_review'?>" method="POST"> -->
																		    <div class="col-lg-12 m-b-20">
																			    <h4>Rate your recent experience</h4>
										    									<div class="starSelector">
										    										<input type="radio" id='s-1' name="star-selector" value="1" class="Rating__star" tabindex="-1" v="stars-1.svg">
										    										<input type="radio" id='s-2' name="star-selector" value="2" class="Rating__star" tabindex="-1" v="stars-2.svg">
										    										<input type="radio" id='s-3' name="star-selector" value="3" class="Rating__star" tabindex="-1" v="stars-3.svg">
										    										<input type="radio" id='s-2' name="star-selector" value="4" class="Rating__star" tabindex="-1" v="stars-4.svg">
										    										<input type="radio" id='s-5' name="star-selector" value="5" class="Rating__star"  tabindex="0" v="stars-5.svg">
										    									</div>
																			    <div class="starRating large___3x4yz"><img alt="TrustScore: 0" src="<?php echo base_url().'asset/images/blog/stars-0.svg'?>" id="trt_img" img_val='0'></div>
										                                        <p style="color: red; display: none;" id="rtmsg">Please select rating star</p>
																		    </div>

																		    <div class="col-lg-12">
																			   <h4>Enter Your Nick name</h4>
										                                        <p>Your nick name show on our review page with your review</p>
										                                        <div class="form-group">
										                                            <input type="text" id="r_name" name="nick_name" placeholder="Enter Nick name here." class="form-control notification-message" required="">
										                                        </div>
										                                        <h4>Give your review a title</h4>
										                                        <div class="input-group mb-3">
										                                            <input type="text" id="r_title" name="title" placeholder="Write the title of your review here." class="form-control notification-message">
										                                            <div class="input-group-append">
										                                                <span class="btn btn-light titleUpd"><i class="icon-edit-2"></i></span>
										                                            </div>
										                                        </div>
										                                    
										                                        <h4>Tell us about your experience</h4>
																			    <div class="form-group">
																				  <textarea id="r_review" name="review" class="form-control notification-message" placeholder="This is where you write your review. Explain what happened, and leave out offensive words. Keep your feedback honest, helpful, and constructive." required="" rows="5"></textarea>
																			    </div>
																			
																			    <h4>Enter Order Number (optional)</h4>
																			    <p>Include your Order Number so it’s easier for Beauty Bay to identify you and reply to your review.</p>
																			   <div class="form-group">
										                                            <input type="text" id="r_odId" name="od_id" placeholder="Enter Order Number here." class="form-control notification-message">
										                                        </div>
																			
										    									<div class="form-group">
										                                            <div class="custom-control custom-checkbox">
										                                                <input type="checkbox"  id="terms_conditions" class="custom-control-input" value="1" required=""/>
										                                                <label class="custom-control-label" for="terms_conditions">I confirm this review is about my own genuine experience. I am eligible to leave this review,</a> and have not been offered any incentive or payment to leave a review for this company.</label>
										                                            </div>
										                                        </div>
																			
										                                        <input type="submit" id="clk" class="btn btn-primary" value="submit">
																			</div>
																	    <!-- </form> -->
																	</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="profile-tab">
												<div class="container">
													<div class="shop-cart">
														<div class="table table-sm table-striped table-responsive">
															<table class="table reviewTable"> 
																<thead class="thead-dark">
																	<tr>
																		<th class="cart-product-thumbnail p-10">Title</th>
																		<th class="cart-product-quantity p-10">Review</th>
																		<th class="cart-product-price p-10">Rating</th>
																		<th class="cart-product-price p-10">Date</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																		foreach ($reviews as $key => $value) {
																			?>
																				<tr>
																				<td class="cart-product-price"><?=$value['title']?></td>
																				<td class="cart-product-price" width="50%">
																					<?=$value['review']?>
																				</td>
																				<td class="cart-product-price">
																					<span class="amount"><?=$value['rating']?></span>
																				</td>
																				<td class="cart-product-price">
																					<span class="amount"><?=$value['create_on']?></span>
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
									</div>
								</div>
							</div>
			</div>
		</section>
<?php

	
	require_once('footer.php');
?>
<script type="text/javascript">
    $(document).ready(function(){

      $(document).on('click','.Rating__star',function(){
            
            var abc = $(this).val();

           // var aaa = $(".Rating__star").val($(this).attr("v"));
            //var aaa = $(this).attr("v");
            
           $(this).attr('checked', true);

           

            var url = "<?php echo base_url().'asset/images/blog/'?>";
            
           $("#trt_img").attr("src", url+'stars-'+abc+'.svg');

            $("#trt_img").attr("img_val", abc);
        });

        $('.Rating__star').on("mouseover", function(){

            var abc = $(this).val();

            var url = "<?php echo base_url().'asset/images/blog/'?>";
            
            $("#trt_img").attr("src", url+'stars-'+abc+'.svg');
        });

        $('.Rating__star').on("mouseout", function(){
            
            var img_val = $("#trt_img").attr('img_val');
            
            var url = "<?php echo base_url().'asset/images/blog/'?>";
            
            $("#trt_img").attr("src", url+'stars-'+img_val+'.svg');     
        })

       

        $(document).on("click", "input[name='star-selector']", function (event) {
	        //var avcccc = $(this).("input[class='Rating__star']").val();

	        window.value = $(this).val();
	        
	    });


       $("#clk").click(function(){

       		var nick_name 		= $("#r_name").val();
       		var title 			= $("#r_title").val();
       		var review 			= $("#r_review").val();
       		var od_id 			= $("#r_odId").val();
       		var star_selector  	= window.value;

       		//alert('hi');
       		 $.ajax({
                url:"<?php echo base_url('user/add_review');?>",
                type:"POST",
                data:{nick_name, title, review, od_id, star_selector},
                success:function(responce){
                    
                    //$('.msg').css('display','block')

                    alert(responce);
                    var link ="<?php echo base_url().'asset/images/blog/'?>";

                    $("#r_name").val("");
       				$("#r_title").val("");
       				$("#r_review").val("");
       				$("#r_odId").val("");
       				$("#trt_img").attr('src',link+'stars-0.svg');
                },
            });
       	});
	});

   
</script>