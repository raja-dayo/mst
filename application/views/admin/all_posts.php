<?php

	include_once("include/header.php");
?>


<div class="content-wrapper">

	<div class="row">
		<div class="col-sm-3"> 
			
			<a href="<?php echo site_url('admin/add_post_page');?>" class="btn btn-primary btn-lg btn-block">Add New Post</a>               
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
        	<h4 class="card-title">Posts List</h4>
          	<div class="row">
            	<div class="col-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
		                            <th>No </th>
		                            <th>Title</th>
		                            <th>Author</th>
		                           <!-- <th>Category</th>
		                            <th>Tag</th>-->
		                            <th>Published</th>
		                            <th>Status</th>
		                            <th>Actions</th>
		                            
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  					foreach ($posts as $key => $post) {
	                        			?>
	                        				<tr>
	                        					<td><?php echo $key+1; ?></td>
	                        					
												<td><?php echo ucfirst($post['name']); ?></td>
												<td>
													<?php
														if($post['roll_id']==1){
															echo "Admin";
														}
														elseif($post['roll_id']==2){

															echo "Editor";
														}
													?>
												</td>
												<!--<td><?php echo ucfirst($post['post_category']); ?></td>
												<td><?php echo ucfirst($post['post_tag']); ?></td>-->
												<td><?php echo date('d/M/y',$post['create_on']); ?></td>
												<td>
													<?php 
														if($post['status']==1){
															echo "Active";
														}
														else{
															echo "Inactive";
														}
													?>
														
												</td>
												<td>
													
													<!--<form method="POST" action="<?php echo site_url('admin/action_post')?>">-->
														<a href='<?php echo base_url("admin/edit_post?id=$post[id]");?>' class="btn btn-outline-success"> Edit</a>

														<a href='<?php echo base_url("admin/delete_post?id=$post[id]");?>'  onClick="return confirm('Are you sure want to delete this Post!')" class="btn btn-outline-danger">Delete</a>
													<!--	<button class="btn btn-outline-success" type="submit" name="cat_edit_id" value="<?php echo $post['id'];?>" >Edit</button>

														<button class="btn btn-outline-danger" onClick="return confirm('Are you sure want to delete this Category!')" type="submit" name="cat_delete_id" value="<?php echo $post['id'];?>" >Delete</button>
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