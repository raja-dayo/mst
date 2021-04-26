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
        	<h4 class="card-title">All Customers</h4>
          
          	<div class="row">
            	<div class="col-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
		                            <th>No</th>
		                            <th>Name</th>
		                            <th>Email</th>
		                            <th>Phone</th>
		                           	<th>Register Date</th>
		                            <th>Actions</th>
		                            
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  					foreach ($customers as $key => $customer) {
	                        			?>
	                        				<tr>
	                        					<td><?php echo $key;?></td>
	                        					<td><?php echo $customer['cus_fname']." ".$customer['cus_lname']  //$key+1; ?></td>
	                        					
												<td><?php echo $customer['cus_email']; ?></td>
												<td><?php echo $customer['cus_phone']; ?></td>
												<td><?php echo $customer['cus_create_on']; ?></td>
												
												
											
												<td>
													<a href='<?php echo base_url()."admin/customer_history?cus_id=$customer[cus_id]"?>' class="btn btn-outline-primary">View</a>
													
													<!--<form method="POST" action="<?php echo site_url('admin/customer_history')?>">
														<button class="btn btn-outline-primary" type="submit" name="view_order_id" value="<?php echo $customer['cus_id'];?>" >View</button>
													</form>-->
													
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