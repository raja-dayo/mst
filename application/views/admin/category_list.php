<?php
	
	include_once("include/header.php");

?>

<div class="content-wrapper">

	<div class="row">
		<div class="col-sm-3"> 
			
			<a href="<?php echo site_url('admin/add_category_page');?>" class="btn btn-primary btn-lg btn-block">Add New Category</a>               
		</div>
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
        	<h4 class="card-title">All Category</h4>
          	<div class="row">
            	<div class="col-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
		                            <th>No </th>
		                            <th>Title</th>
		                            <th>Create By</th>
		                            <th>Create On</th>
		                            <th>Status</th>
		                            <th>Actions</th>
		                            
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  					foreach ($categories as $key => $category) {
	                        			?>
	                        				<tr>
	                        					<td><?php echo $key+1; ?></td>
	                        					
												<td><?php echo ucfirst($category['cat_name']); ?></td>
												<td>Admin</td>
												<td><?php echo date('d/M/y',$category['create_on']); ?></td>
												<td><?php echo "Active"; ?></td>
												<td>
													
													<form method="POST" action="<?php echo site_url('admin/category_action')?>">
														<button class="btn btn-outline-success" type="submit" name="cat_edit_id" value="<?php echo $category['cat_id'];?>" >Edit</button>
														<button class="btn btn-outline-danger" onClick="return confirm('Are you sure want to delete this Category!')" type="submit" name="cat_delete_id" value="<?php echo $category['cat_id'];?>" >Delete</button>
													</form>
													
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