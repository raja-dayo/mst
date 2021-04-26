<style type="text/css">
@media only screen and (max-device-width:640px),
only screen and (max-width:640px) {
	table[class="mobile-shell"] {
		width:100%!important;
		min-width:100%!important
	}
}
</style>
<table width="640" align="center" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" style="color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:16px;">
	<tbody>
		<tr>
			<td id="emailcontent" class="text-top" style="line-height:16px; text-align:left;">
			<div style="margin-bottom:20px; padding:20px 0px; border-bottom:1px solid #eeeeee"><a href="index.html">
                            <img alt="" src="https://www.mysleepingtabs.com/asset/images/mstlogo.png">
                        </a></div>
			
				
				<p style="font-size:16px; line-height:20pt;">You've recived the following order from <?php echo $orderInfo[0]['od_s_fname']." ".$orderInfo[0]['od_s_lname']?></p>
				
				

			    <?php

					

					$cus_date=explode("-", $orderInfo[0]['cus_create_on']);
					
					
					if(count($banks)>0  && strtolower($orderInfo[0]['od_s_country'])!='us')
					{
					    if($cus_date[0]<=2018 && $orderInfo[0]['od_payment_type']=='2')
					    {
					    	if($orderInfo[0]['pro_id']==16 && count($orderInfo)==1)
					    	{
					    		foreach ($banks as $key => $bank){
					    			if($bank['pro_id']==16)
					    			{
					    				$bname 		= $bank['bank_name'];
					    				$ac 		= $bank['acount_title']; 
					    				$ac_no      = $bank['acount_no'];
					    				$s_code      = $bank['short_code'];
					    				$amount      = $bank['amount'];
					    				$pro_id      = $bank['pro_id'];
					    				
					    				?>
								            <table cellspacing="0" cellpadding="6" style="color:#666666; width:100%; margin-top:20px; text-align:center; vertical-align:middle; border:1px solid #e6e8eb;">
		    								    <thead>
		    									    <tr>
		    										    <td colspan="4" style="padding:10px; background:#f3f9fb; text-align:left; border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Bank Details Available Here For you....!</td>
		    									    </tr>
		    									    <tr>
		    										    <th style="padding:10px; border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Account Title</th>
		    										    <th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Sort Code</th>
		    										    <th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Account No.</th>
		    										    <th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Bank</th>
		    									    </tr>
		    								    </thead>
		    								    <tbody>
		    									    <tr>
		    										    <td style=" padding:10px 0; border-right:solid 1px #e6e8eb;"><?php echo $ac;?></td>
		    										    <td style="border-right:solid 1px #e6e8eb;"><?php echo $s_code; ?></td>
		    										    <td style="border-right:solid 1px #e6e8eb;"><?php echo $ac_no; ?></td>
		    										    <td style=""><?php echo $bname; ?></td>
		    									    </tr>
		    								    </tbody>
		    							    </table>
		    							    <p style="font-size:16px; line-height:16pt; border:solid 1px #ffbab9; padding:10px; background:#fdebea;">PLEASE NOTE: BANK DETAILS ARE VALID ONLY FOR TODAY. IF YOU PAY TOMORROW OR WITHOUT OUR CONSENT WE WILL NOT BE RESPONSIBLE FOR LOSS OF FUNDS.
		    							    </b>
		    							    </p>
		    							    <p style="font-size:16px;  margin-bottom:20px;">In reference write: <b>Order # <?php echo $orderInfo[0]['od_id'];?></b></p>
		    						    <?php 
					    			}
					    		}
					    	}
					    	else if($orderInfo[0]['pro_id']==26 && count($orderInfo)==1)
					    	{
					    		foreach ($banks as $key => $bank){
					    			if($bank['pro_id']==26)
					    			{
					    				$bname 		= $bank['bank_name'];
					    				$ac 		= $bank['acount_title']; 
					    				$ac_no      = $bank['acount_no'];
					    				$s_code      = $bank['short_code'];
					    				$amount      = $bank['amount'];
					    				$pro_id      = $bank['pro_id'];
					    				
					    				?>
					    					<table cellspacing="0" cellpadding="6" style="color:#666666; width:100%; margin-top:20px; text-align:center; vertical-align:middle; border:1px solid #e6e8eb;">
		    								    <thead>
		    									    <tr>
		    										    <td colspan="4" style="padding:10px; background:#f3f9fb; text-align:left; border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Bank Details Available Here For you....!</td>
		    									    </tr>
		    									    <tr>
		    										    <th style="padding:10px; border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Account Title</th>
		    										    <th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Sort Code</th>
		    										    <th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Account No.</th>
		    										    <th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Bank</th>
		    									    </tr>
		    								    </thead>
		    								    <tbody>
		    									    <tr>
		    										    <td style=" padding:10px 0; border-right:solid 1px #e6e8eb;"><?php echo $ac;?></td>
		    										    <td style="border-right:solid 1px #e6e8eb;"><?php echo $s_code; ?></td>
		    										    <td style="border-right:solid 1px #e6e8eb;"><?php echo $ac_no; ?></td>
		    										    <td style=""><?php echo $bname; ?></td>
		    									    </tr>
		    								    </tbody>
		    							    </table>
		    							    <p style="font-size:16px; line-height:16pt; border:solid 1px #ffbab9; padding:10px; background:#fdebea;">PLEASE NOTE: BANK DETAILS ARE VALID ONLY FOR TODAY. IF YOU PAY TOMORROW OR WITHOUT OUR CONSENT WE WILL NOT BE RESPONSIBLE FOR LOSS OF FUNDS.
		    							    </b>
		    							    </p>
		    							    <p style="font-size:16px;  margin-bottom:20px;">In reference write: <b>Order # <?php echo $orderInfo[0]['od_id'];?></b></p>
		    						    <?php 
					    				
					    			}
					    		}	
					    	}
					    	else if($orderInfo[0]['od_total']<=200)
					    	{
					    		foreach ($banks as $key => $bank){
					    			if($bank['amount']=='200')
					    			{
					    				$bname 		= $bank['bank_name'];
					    				$ac 		= $bank['acount_title']; 
					    				$ac_no      = $bank['acount_no'];
					    				$s_code      = $bank['short_code'];
					    				$amount      = $bank['amount'];
					    				$pro_id      = $bank['pro_id'];
					    				
					    				?>
					    					<table cellspacing="0" cellpadding="6" style="color:#666666; width:100%; margin-top:20px; text-align:center; vertical-align:middle; border:1px solid #e6e8eb;">
		    								    <thead>
		    									    <tr>
		    										    <td colspan="4" style="padding:10px; background:#f3f9fb; text-align:left; border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Bank Details Available Here For you....!</td>
		    									    </tr>
		    									    <tr>
		    										    <th style="padding:10px; border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Account Title</th>
		    										    <th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Sort Code</th>
		    										    <th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Account No.</th>
		    										    <th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Bank</th>
		    									    </tr>
		    								    </thead>
		    								    <tbody>
		    									    <tr>
		    										    <td style=" padding:10px 0; border-right:solid 1px #e6e8eb;"><?php echo $ac;?></td>
		    										    <td style="border-right:solid 1px #e6e8eb;"><?php echo $s_code; ?></td>
		    										    <td style="border-right:solid 1px #e6e8eb;"><?php echo $ac_no; ?></td>
		    										    <td style=""><?php echo $bname; ?></td>
		    									    </tr>
		    								    </tbody>
		    							    </table>
		    							    <p style="font-size:16px; line-height:16pt; border:solid 1px #ffbab9; padding:10px; background:#fdebea;">PLEASE NOTE: BANK DETAILS ARE VALID ONLY FOR TODAY. IF YOU PAY TOMORROW OR WITHOUT OUR CONSENT WE WILL NOT BE RESPONSIBLE FOR LOSS OF FUNDS.
		    							    </b>
		    							    </p>
		    							    <p style="font-size:16px;  margin-bottom:20px;">In reference write: <b>Order # <?php echo $orderInfo[0]['od_id'];?></b></p>
		    						    <?php 
					    			}
					    		}	
							}
					    	else if($orderInfo[0]['od_total']>200)
					    	{
					    		foreach ($banks as $key => $bank){
					    			if($bank['amount']=='201')
					    			{
					    				$bname 		= $bank['bank_name'];
					    				$ac 		= $bank['acount_title']; 
					    				$ac_no      = $bank['acount_no'];
					    				$s_code      = $bank['short_code'];
					    				$amount      = $bank['amount'];
					    				$pro_id      = $bank['pro_id'];
					    				
					    				?>
					    					<table cellspacing="0" cellpadding="6" style="color:#666666; width:100%; margin-top:20px; text-align:center; vertical-align:middle; border:1px solid #e6e8eb;">
		    								    <thead>
		    									    <tr>
		    										    <td colspan="4" style="padding:10px; background:#f3f9fb; text-align:left; border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Bank Details Available Here For you....!</td>
		    									    </tr>
		    									    <tr>
		    										    <th style="padding:10px; border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Account Title</th>
		    										    <th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Sort Code</th>
		    										    <th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Account No.</th>
		    										    <th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Bank</th>
		    									    </tr>
		    								    </thead>
		    								    <tbody>
		    									    <tr>
		    										    <td style=" padding:10px 0; border-right:solid 1px #e6e8eb;"><?php echo $ac;?></td>
		    										    <td style="border-right:solid 1px #e6e8eb;"><?php echo $s_code; ?></td>
		    										    <td style="border-right:solid 1px #e6e8eb;"><?php echo $ac_no; ?></td>
		    										    <td style=""><?php echo $bname; ?></td>
		    									    </tr>
		    								    </tbody>
		    							    </table>
		    							    <p style="font-size:14px; line-height:16pt; border:solid 1px #ffbab9; padding:10px; background:#fdebea;">PLEASE NOTE: BANK DETAILS ARE VALID ONLY FOR TODAY. IF YOU PAY TOMORROW OR WITHOUT OUR CONSENT WE WILL NOT BE RESPONSIBLE FOR LOSS OF FUNDS.
		    							    </b>
		    							    </p>
		    							    <p style="font-size:16px;  margin-bottom:20px;">In reference write: <b>Order # <?php echo $orderInfo[0]['od_id'];?></b></p>
		    						    <?php 
					    			}
					    		}
					    		
					    	}
					    }
					}
				    /*else
					{
						foreach ($orderInfo as $key => $od) 
						{
							if($od['pro_id']=='26')
							{
								?>
									<table cellspacing="0" cellpadding="6" style="color:#666666; width:100%; margin-top:20px; text-align:center; vertical-align:middle; border:1px solid #e6e8eb;">
											<thead>
												<tr>
													<td colspan="4" style="padding:10px; background:#f3f9fb; text-align:left; border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Bank Details Available Here For you....!</td>
												</tr>
												<tr>
													<th style="padding:10px; border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Account Title</th>
													<th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Sort Code</th>
													<th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Account No.</th>
													<th style="border-bottom:solid 1px #e6e8eb; border-right:solid 1px #e6e8eb;">Bank</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td style=" padding:10px 0; border-right:solid 1px #e6e8eb;"><?php echo 'Beauty Saloon'?></td>
													<td style="border-right:solid 1px #e6e8eb;"><?php echo '08-71-99'?></td>
													<td style="border-right:solid 1px #e6e8eb;"><?php echo '01524097' ?></td>
													<td style=""><?php echo 'Cashplus/Wirecard'?></td>
												</tr>
											</tbody>
										</table>
										<p style="font-size:14px; line-height:16pt; border:solid 1px #ffbab9; padding:10px; background:#fdebea;">PLEASE NOTE: BANK DETAILS ARE VALID ONLY FOR TODAY. IF YOU PAY TOMORROW OR WITHOUT OUR CONSENT WE WILL NOT BE RESPONSIBLE FOR LOSS OF FUNDS.
										</b>
										</p>
										<p style="font-size:16px;  margin-bottom:20px;">In reference write: <b><?php echo $orderInfo[0]['od_id']; ?></b></p>
								<?php	
							}
						}
					}*/
				?>
				<?php

					if($orderInfo[0]['od_payment_type']=='3')
					{
						?>
							
				
							<p style="font-size:16px;  margin-bottom:20px;"><b>Bitcoin Wallet:</b>
								<span style="display: block;margin-top: 10px;">Address : 1E8dSfjL3gH1GMTQT6VUiu2P9yRLYVnNbB;</span>
							</p>
						<?php
					}
				?>

				<h2 style="display:block; font-size:20px; margin:30px 0 10px 0; text-align:left; color:#067dd6;">
				   Order # <?php echo $orderInfo[0]['od_id'];?> <span style="font-size:16px; color:#666; font-weight:normal;">(<?php echo $orderInfo[0]['od_create_on'] ?>)</span>
				</h2>
				<table cellspacing="0" cellpadding="6" style="color:#666666; width:100%; vertical-align:middle;  border:solid 1px #ccc;">
					<thead>
						<tr>
							<th colspan="2" style="padding:10px; background:#067dd6; color:#fff; text-align:left;">Product</th>
							<th style="background:#067dd6;color:#fff;">Quantity</th>
							<th style="background:#067dd6;color:#fff;">Price</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($orderInfo as $key => $od) 
							{
								?>
									
									<tr>
										<td colspan="2" style=" border-bottom:1px solid #ebebeb;text-align:left; padding:20px 10px; line-height:26px;"><?php echo $od['pro_full_name']." x ".$od['p_qun']?><br>
											<?php
												if(isset($od['b_name'])){
														
													?>
														<b>Brands: </b><?php echo ucwords($od['b_name']);?><br>
														<b>Loose Or Strips: </b><?php echo ucwords($od['pack_name']);?><br>
														
													<?php
												}
											?>
										</td>
										<td style=" border-bottom:1px solid #ebebeb;text-align:center;"><?php echo $od['qty']?></td>
										<td style=" border-bottom:1px solid #ebebeb;text-align:right;padding:10px;"><?php echo ((strtolower($orderInfo[0]['od_s_country'])=='us') ? '$':"£").$od['qty']*$od['pro_price']?></td>
									</tr>
								<?php
							}
						?>
						
						
					</tbody>
					<tbody style="background: #f3f3f3;">
						<tr>
							<th scope="row" colspan="3" style="text-align:left;border-bottom:1px solid #dedede; border-top-width:0px; vertical-align:middle; padding-top:8px; padding-bottom:8px;">Subtotal:</th>
							<td style="text-align:left; border-top-width:0px; vertical-align:middle;text-align:right;border-bottom:1px solid #dedede;"><?php echo ((strtolower($orderInfo[0]['od_s_country'])=='us') ? '$':"£").$orderInfo[0]['od_total'];?></td>
						</tr>
						<tr>
							<th scope="row" colspan="3" style="text-align:left;border-bottom:1px solid #dedede; vertical-align:middle; padding-top:8px; padding-bottom:8px;">Shipping:</th>
							<td style="text-align:right;border-bottom:1px solid #dedede;">
							    <?php 
									if($orderInfo[0]['od_d_charge']==0)
									{
										echo "1st class signed for with tracking";
									}
									else if($orderInfo[0]['od_d_charge']==15)
									{
										echo "Next Day Delivery (£15)";
									}
									else if($orderInfo[0]['od_d_charge']==50)
									{
										echo "USPS Shipping Delivery ($50)";
									}
								?>
							</td>
						</tr>
						<tr>
							<th scope="row" colspan="3" style="text-align:left;border-bottom:1px solid #dedede; vertical-align:middle; padding-top:8px; padding-bottom:8px;">Payment method:</th>
							<td style="text-align:right;border-bottom:1px solid #dedede;">
								<?php

									if($orderInfo[0]['od_payment_type']=='3')
									{
										echo 'Bitcoin';
									}elseif($orderInfo[0]['od_payment_type']=='2') {
										echo 'Bank Tranfer';
									}
								?>
							</td>
						</tr>
						<tr>
							<th scope="row" colspan="3" style="text-align:left; border-bottom:1px solid #dedede; vertical-align:middle; padding-top:8px; padding-bottom:8px;">Total:</th>
							<td style="text-align:right;border-bottom:1px solid #dedede;"><?php echo ((strtolower($orderInfo[0]['od_s_country'])=='us') ? '$': '£').($orderInfo[0]['od_total']+$orderInfo[0]['od_d_charge']);?></td>
						</tr>
					</tbody>
					<tbody style=" color:#666666; width:100%; text-align:center;">
						<tr>
							<td colspan="4">	
								<h3 style="font-size:18px; margin:20px 0 0 0;">CUSTOMER DETAILS</h3>
								<p style="margin:10px 0">Email address: <span style="color:#067dd8;"><?php echo $_SESSION['cus']['info']['cus_email']?></span></p>
								<p style="margin:0 0 20px 0">Phone: <span style="color:#067dd8;"><?php echo $_SESSION['cus']['info']['cus_phone']?></span></p>
							</td>
						</tr>
					</tbody>
					<tbody style=" color:#666666; width:100%; vertical-align:top; margin-bottom:20px; padding:10px 0 20px 20px; background:#f3f3f3;">
						<tr>
							<td colspan="2" style="text-align:left;  border:0; padding:10px;" valign="top" width="50%">
								<h2 style="display:block;  font-size:18px; margin:10px 0 10px 0; text-align:left;">Billing address</h2> 
								<address><?php echo $_SESSION['cus']['info']['cus_fname']." ".$_SESSION['cus']['info']['cus_lname']?><br><?php echo $_SESSION['cus']['info']['cus_add']?><br><?php echo $_SESSION['cus']['info']['cus_city']." ".$_SESSION['cus']['info']['cus_zipcode']." ,".$_SESSION['cus']['info']['cus_country']?></p>
								</address>
							</td>
							<td colspan="2" style="text-align:left; padding:10px;" valign="top" width="50%">
								<h2 style="color:#666666; display:block; font-size:18px;   margin:10px 0 10px 0; text-align:left;">Shipping address</h2>
								<address><?php echo $orderInfo[0]['od_s_fname']." ".$orderInfo[0]['od_s_lname']?><br><?php echo $orderInfo[0]['od_s_add']?><br><?php echo $orderInfo[0]['od_s_city']." ".$orderInfo[0]['od_s_state']?>, <?php echo $orderInfo[0]['od_s_zipcode']." ".$orderInfo[0]['od_s_country'];?>
								</address>
							</td>
						</tr>
					</tbody>
				</table>
				
				<p style="text-align:center;">© <?php echo date('Y',time())?> MysleepingTabs.com All Rights Reserved.</p>
			</td>
		</tr>
	</tbody>
</table>