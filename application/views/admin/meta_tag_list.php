<?php
	
	include_once("include/header.php");

?>

<div class="content-wrapper">

	<div class="row">
		<div class="col-sm-3"> 
			
			<a href="<?php echo site_url('admin/add_meta_tag');?>" class="btn btn-primary btn-lg btn-block">Add New Meta Tag</a>               
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
        	<h4 class="card-title">All Meta Tag</h4>
          	<div class="row">
            	<div class="col-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
		                            <th>No </th>
		                            <th>URL</th>
		                            <th>Title</th>
		                           <!-- <th>Keywords</th>-->
		                            <!--<th>Description</th>-->
		                            <th>Actions</th>
		                            
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  					foreach ($tags as $key => $tag) {
	                        			?>
	                        				<tr>
	                        					<td><?php echo $key+1; ?></td>
	                        					
												<td><?php echo $tag['url'] ?></td>
												<td><?php echo $tag['title'] ?></td>
												 <!--<td>
												    
												   <?php echo $tag['keywords'] ?></td>-->
												<!--<td><?php echo $tag['description'] ?></td>-->
												<td>
													
													<a href="<?php echo base_url().'admin/editMeta/?id='.$tag['m_tag_id']?>" class="btn btn-outline-success">Edit</a>
													<a href="<?php echo base_url().'admin/deleteMeta/?id='.$tag['m_tag_id']?>" class="btn btn-outline-warning" onClick="return confirm('Are you sure want to delete this meta tag!')">Delete</a>
													
													
														<!--<button class="btn btn-outline-success" type="submit" name="cat_edit_id" value="<?php echo $tag['m_tag_id'];?>" >Edit</button>
														<button class="btn btn-outline-danger" onClick="return confirm('Are you sure want to delete this Category!')" type="submit" name="cat_delete_id" value="<?php echo $tag['m_tag_id'];?>" >Delete</button>-->
													
													
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