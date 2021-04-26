<?php
	
	include_once("include/header.php");

?>

<div class="content-wrapper">

	<div class="row">
		<div class="col-sm-3"> 
			
			<a href="<?php echo site_url('admin/add_product_page');?>" class="btn btn-primary btn-lg btn-block">Add New Product</a>               
		</div>
		<div class="col-sm-9"> 
			
		
			<?php
	          if($this->session->flashdata('msg'))
	          {
	            ?>
	            	
	       
	            		<div class="alert btn-<?php echo $this->session->flashdata('class');?> alert-dismissible fade show" role="alert" id="alert_msg">
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
        	<h4 class="card-title">All Products</h4>
          	<div class="row">
            	<div class="col-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
		                            <th>No </th>
		                            <th>Title</th>
		                            <!--<th>Image</th>-->
		                            <th>Category</th>
		                            <!--<th>Create By</th>
		                            <th>Create On</th>-->
		                            <th>Status</th>
		                            <th>Direct Link</th>
		                            <th>Actions</th>
		                            
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  					foreach ($products as $key => $product) {
	                        			?>
	                        				<tr>
	                        					<td><?php echo $key+1; ?></td>
												<td><?php echo ucfirst($product['pro_full_name']); ?></td>
												<!--<td><img style="width: 100px; height: 100px;" src="<?php echo base_url().'asset/images/'.$product['pro_image'];?>"></td>-->
												<td><?php echo ucfirst($product['cat_name']); ?></td>
												
												<!--<td>Admin</td>
												<td><?php echo date('d/M/y',$product['pro_create_on']); ?></td>-->
												<td>
													
							                      <label class="toggle-switch toggle-switch-success">
							                        <input type="checkbox" id="<?php echo $product['pro_id']?>" onclick="my(<?php echo $product['pro_id']?>)" name="<?php echo $product['pro_status']?>" tag="stockList" value="<?php echo $product['pro_id']?>" <?=$product['pro_status']==1 ? 'checked="checked"' : '';?>>
							                        		
							                        <span class="toggle-slider round"></span>
							                      </label> 
												</td>
												<td>
													
							                      <label class="toggle-switch toggle-switch-success">
							                        <input type="checkbox" value="<?php echo $product['pro_main']?>" <?=$product['pro_main']==1 ? 'checked="checked"' : '';?>>
							                        		
							                        <span class="toggle-slider round"></span>
							                      </label> 
												</td>
												<td>
													
													<!--<form method="POST" action="<?php echo site_url('admin/product_action')?>">-->
														<!--<button class="btn btn-outline-success" type="submit" name="pro_edit_id" value="<?php echo $product['pro_id'];?>" >Edit</button>-->
														<a href='<?php echo base_url()."admin/edit?id=$product[pro_id]"?>' class="btn btn-outline-success">Edit</a>
														<a href='<?php echo base_url()."admin/delete?id=$product[pro_id]"?>' class="btn btn-outline-danger">Delete</a>
														<!--<button class="btn btn-outline-danger" onClick="return confirm('Are you sure want to delete this Product!')" type="submit" name="pro_delete_id" value="<?php echo $product['pro_id'];?>" >Delete</button>-->
													<!--</form>-->
													
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
    $(document).ready(function(){
        /*$('input[tag="stockList"]').click(function(){
          	
          	var id 		=$(this).val();
          	var status  = $("#"+id).attr("name");
        	
        	
        	if(status==1){
        		status=0;

        		$('#'+id).attr( 'name','0');
        	}else{
        		status=1
        		$('#'+id).attr( 'name','1');
        	}

        	$.ajax({
		        url: "<?php echo site_url("admin/updateProductStatus"); ?>",
		        type: "POST",
		        data: {id, status},
		        success:function(responce){
		        	
		        	alert(responce);
		        }
		     });          
        });*/
    });
    
     function my(abc){
    	
    	var id = abc
    	
    	var status = document.getElementById(abc).getAttribute("name");
    	
    	if(status==1){
        	
        	status=0;
        	document.getElementById(abc).setAttribute("name", status);
        }
        else
        {
        	status=1;
        	document.getElementById(abc).setAttribute("name", status);
        }
    	
    	$.ajax({
        	url: '<?php echo base_url("admin/updateProductStatus"); ?>',
        	type: 'POST',
        	cache: false,
        	data: {id, status},
        	success: function(responce){
            	alert(responce);
        	}
    	});
    }

</script>


