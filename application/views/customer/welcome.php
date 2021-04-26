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
												<a class="nav-link" id="profile-tab" data-toggle="tab" href="#Add_Reviews" role="tab" aria-controls="orders" aria-selected="false">Add Review</a>
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
																	<tr>
																		<td class="cart-product-price">
																			
																			Ahmed
																		</td>
																		<td class="cart-product-price" width="50%">
																			dfjs hfkjg lkdjf ghd id sdh dg d dfh dfjh df gj  sdfh fghdk fgjdhfk fdghdk kfgh fjkg
																		</td>
																		<td class="cart-product-price">
																			<span class="amount">2 star</span>
																		</td>
																		<td class="cart-product-price">
																			<span class="amount">23-Feb-2021</span>
																		</td>
																	</tr>
																	<tr>
																		<td class="cart-product-price">
																			
																			Hyder
																		</td>
																		<td class="cart-product-price">
																			dfjs hfkjg lkdjf ghd id sdh dg d dfh dfjh df gj  sdfh fghdk fgjdhfk fdghdk kfgh fjkg
																		</td>
																		<td class="cart-product-price">
																			<span class="amount">4 star</span>
																		</td>
																		<td class="cart-product-price">
																			<span class="amount">23-Feb-2021</span>
																		</td>
																	</tr>
																
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