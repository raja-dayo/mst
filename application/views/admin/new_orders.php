<?php

	include_once("include/header.php");
?>

<div class="content-wrapper">

	<div class="row">
		<!--<div class="col-sm-3"> 
			
			<a href="<?php echo site_url('admin/add_category_page');?>" class="btn btn-primary btn-lg btn-block">Add New Category</a>               
		</div>-->
		<div class="col-sm-9"> 
			<?php
	          if($this->session->flashdata('msg'))
	          {
	            ?>
	            	<div class="alert btn-<?php echo $this->session->flashdata('class');?> alert-dismissible fade show" role="alert">
						<p class="text-center"><?php echo $this->session->flashdata('msg');?><p>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
	            <?php
	          }
	        ?>
        </div>
	</div>
	</br>
    <div class="card">
        <div class="card-body">

        	<h4 class="card-title">New Orders</h4>
          	
          	<div class="row" id="tbl">
          		<input type="submit" class="btn btn-success chk-btn" id="o_pro" name="pro" value="Processing">
          		&nbsp;&nbsp;
          		<input type="submit" class="btn btn-primary chk-btn" id="o_com" name="com" value="Compeleted">
            	<div class="col-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
                    				<th><input type="checkbox" id="all_check"> Select </th>
                    				<th>No</th>
		                            <!--<th>Order No </th>-->
		                            <th>Name</th>
		                            <th>Date</th>
		                            <!--<th>Email</th>-->
		                          
		                            <th>Payment Type</th>
		                            <th>Amount</th>
		                            <th>Status</th>
		                            <th>Edit Status</th>
		                            <th>Actions</th>
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  					foreach ($result as $key => $order) {
	                        			?>
	                        				<tr>
	                        				    <td><input type="checkbox" class="chk" name="check[]" value="<?php echo $order['od_id']?>"></td>
	                        				    <td><?php echo $key+1; ?></td>
	                        					<!--<td><?php echo $order['od_id']  //$key+1; ?></td>-->
	                        					
												<td><?php echo '#'.$order['od_id']." ". ucfirst($order['cus_fname'])." ".ucfirst($order['cus_lname']); ?></td>
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
																<span style='color:orange;'>On Hold</span>
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
													<select style="background-color: #da8115; color: #fff;," id="<?php echo $order['od_id']?>" onchange="updateStatus(<?php echo $order['od_id']?>)" class="status">
														<option name="<?php echo $order['od_id']?>" value="1" <?= $order["od_status"]==1 ?'selected="selected"' : '';?>>On Hold</option>
														<option name="<?php echo $order['od_id']?>" value="2" <?= $order["od_status"]==2 ?'selected="selected"' : '';?>>Processing</option>
														<option name="<?php echo $order['od_id']?>" value="3" <?= $order["od_status"]==3 ?'selected="selected"' : '';?>>Compeleted</option>
														<option name="<?php echo $order['od_id']?>" value="4" <?= $order["od_status"]==4 ?'selected="selected"' : '';?>>Canceled</option>
													</select>
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
</div>

<?php
	
	include_once("include/footer.php");
?>
<script type="text/javascript">
    
    
    $('select').on('change',function(){

		var id = $('option:selected', this).attr('name');
		
		var status = $('option:selected', this).val();

		//alert(id+" "+status);

		$.ajax({
        	url: '<?php echo base_url("admin/updateOrderStatus"); ?>',
        	type: 'POST',
        	cache: false,
        	data: {id, status},
        	success: function(responce){
            	alert(responce);

            	window.location.href="<?php echo base_url().'admin/newOrders'?>";
            	//$(".content-wrapper").load(" .content-wrapper");
        	}
    	});
	
	});
	
</script>
<script type="text/javascript">
	$(document).ready(function(){

		$("#all_check").click(function(){

			if($(this).prop("checked")==true){
				
				$(".chk").attr('checked', 'checked');	
			}
			else
			{
				$('.chk').removeAttr('checked');
			}
			
		});

		$(".chk-btn").click(function(){

			var value =($(this).attr('id'));
			var order_id = [];
        	
        	$.each($('input[class="chk"]:checked'), function(){

        		order_id.push($(this).val())
        	});
        	
        	$.ajax({

        		url:"<?=base_url().'admin/updateMulOrderStatus'?>",
        		type:"POST",
        		data:{value, order_id},
        		success:function(result){

    				location.reload();
        		},
        	});
		});
	})
</script>
