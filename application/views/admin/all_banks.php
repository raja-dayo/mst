<?php
	
	include_once("include/header.php");

?>

<div class="content-wrapper">

	<div class="row">
		<div class="col-sm-3"> 
			
			<a href="<?php echo site_url('admin/add_bank');?>" class="btn btn-primary btn-lg btn-block">Add New Bank</a>               
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
        	<h4 class="card-title">Banks List Only for 200 or below Amount</h4>
          	<div class="row">
            	<div class="col-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
		                            <th>No </th>
		                            <th>Name</th>
		                            <th>Acount Title</th>
		                            <th>Acount No</th>
		                            <th>Short Code</th>
		                            <th>Status</th>
		                            <th>Actions</th>
		                            
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  				    	
	                        	    foreach ($banks as $key => $bank) 
	                        		{
                        			    if($bank['amount']=='200')
                    			        {
                    			             ?>
    	                        				    <tr>
    	                        					    <td><?php echo $key+1; ?></td>
    	                        					
    												    <td><?php echo ucfirst($bank['bank_name']); ?></td>
    												    <td><?php echo $bank['acount_title']; ?></td>
    												    <td><?php echo $bank['acount_no']; ?></td>
    												    <td><?php echo $bank['short_code']; ?></td>
    												
    													<td>
    													
    							                        <label class="toggle-switch toggle-switch-success">
    							                            <input type="checkbox"  name="<?php echo $bank['status'] ?>" id="<?php echo $bank['bank_id']?>" value="<?php echo $bank['bank_id']?>" <?=$bank['status']==1 ? 'checked="checked"' : '';?>>
    							                        		
    							                            <span class="toggle-slider round"></span>
    							                        </label> 
    												
    												    </td>
    												    <td>
    													    <a href='<?php echo base_url()."admin/delete_bank?id=$bank[bank_id]"?>' class="btn btn-outline-danger">Delete</a>
    												    </td>
    											    </tr>
    	                        			    <?php
                    			        }
    	                        			    
    	                        			   
    	                            }   
	                        	?>
	                    	</tbody>
                		</table>
              		</div>
           		</div>
          	</div>
        </div>
    </div>
    <br>
     <br>
    <div class="card">
        <div class="card-body">
        	<h4 class="card-title">Banks List Only for 200+ Amount</h4>
          	<div class="row">
            	<div class="col-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
		                            <th>No </th>
		                            <th>Name</th>
		                            <th>Acount Title</th>
		                            <th>Acount No</th>
		                            <th>Short Code</th>
		                            <th>Status</th>
		                            <th>Actions</th>
		                            
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  					foreach ($banks as $key => $bank) {
	                        			if($bank['amount']=='201')
	                        			{
	                        				?>

			                        				<tr>
			                        					<td><?php echo $key+1; ?></td>
			                        					
														<td><?php echo ucfirst($bank['bank_name']); ?></td>
														<td><?php echo $bank['acount_title']; ?></td>
														<td><?php echo $bank['acount_no']; ?></td>
														<td><?php echo $bank['short_code']; ?></td>
														
															<td>
															
									                      <label class="toggle-switch toggle-switch-success">
									                        <input type="checkbox"  name="<?php echo $bank['status'] ?>" id="<?php echo $bank['bank_id']?>" value="<?php echo $bank['bank_id']?>" <?=$bank['status']==1 ? 'checked="checked"' : '';?>>
									                        		
									                        <span class="toggle-slider round"></span>
									                      </label> 
														
														</td>
														<td>
															
															

															<a href='<?php echo base_url()."admin/delete_bank?id=$bank[bank_id]"?>' class="btn btn-outline-danger">Delete</a>
														</td>
													</tr>
			                        			
	                        				<?php
	                        			}
	                        			
	                        		}

	                        	?>
	                    	</tbody>
                		</table>
              		</div>
           		</div>
          	</div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
        	<h4 class="card-title">Banks List Only for this product Buy Codeine Phosphate 30mg </h4>
          	<div class="row">
            	<div class="col-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
		                            <th>No </th>
		                            <th>Name</th>
		                            <th>Acount Title</th>
		                            <th>Acount No</th>
		                            <th>Short Code</th>
		                            <th>Status</th>
		                            <th>Actions</th>
		                            
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  					foreach ($banks as $key => $bank) {
	                        			if($bank['pro_id']==16)
	                        			{
	                        				?>

			                        				<tr>
			                        					<td><?php echo $key+1; ?></td>
			                        					
														<td><?php echo ucfirst($bank['bank_name']); ?></td>
														<td><?php echo $bank['acount_title']; ?></td>
														<td><?php echo $bank['acount_no']; ?></td>
														<td><?php echo $bank['short_code']; ?></td>
														
															<td>
															
									                      <label class="toggle-switch toggle-switch-success">
									                        <input type="checkbox"  name="<?php echo $bank['status'] ?>" id="<?php echo $bank['bank_id']?>" value="<?php echo $bank['bank_id']?>" <?=$bank['status']==1 ? 'checked="checked"' : '';?>>
									                        		
									                        <span class="toggle-slider round"></span>
									                      </label> 
														
														</td>
														<td>
															
															

															<a href='<?php echo base_url()."admin/delete_bank?id=$bank[bank_id]"?>' class="btn btn-outline-danger">Delete</a>
														</td>
													</tr>
			                        			
	                        				<?php
	                        			}
	                        			
	                        		}

	                        	?>
	                    	</tbody>
                		</table>
              		</div>
           		</div>
          	</div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
        	<h4 class="card-title">Banks List Only for this product Zomorph Morphine Sulfate </h4>
          	<div class="row">
            	<div class="col-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
		                            <th>No </th>
		                            <th>Name</th>
		                            <th>Acount Title</th>
		                            <th>Acount No</th>
		                            <th>Short Code</th>
		                            <th>Status</th>
		                            <th>Actions</th>
		                            
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  					foreach ($banks as $key => $bank) {
	                        			if($bank['pro_id']==26)
	                        			{
	                        				?>

			                        				<tr>
			                        					<td><?php echo $key+1; ?></td>
			                        					
														<td><?php echo ucfirst($bank['bank_name']); ?></td>
														<td><?php echo $bank['acount_title']; ?></td>
														<td><?php echo $bank['acount_no']; ?></td>
														<td><?php echo $bank['short_code']; ?></td>
														
															<td>
															
									                      <label class="toggle-switch toggle-switch-success">
									                        <input type="checkbox"  name="<?php echo $bank['status'] ?>" id="<?php echo $bank['bank_id']?>" value="<?php echo $bank['bank_id']?>" <?=$bank['status']==1 ? 'checked="checked"' : '';?>>
									                        		
									                        <span class="toggle-slider round"></span>
									                      </label> 
														
														</td>
														<td>
															
															

															<a href='<?php echo base_url()."admin/delete_bank?id=$bank[bank_id]"?>' class="btn btn-outline-danger">Delete</a>
														</td>
													</tr>
			                        			
	                        				<?php
	                        			}
	                        			
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
        $('input[type="checkbox"]').click(function(){
          	
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
		        url: "<?php echo site_url("admin/updateBankStatus"); ?>",
		        type: "POST",
		        data: {id, status},
		        success:function(responce){
		        	//alert(responce);
		        }
		     });          
        });
    });

    
</script>