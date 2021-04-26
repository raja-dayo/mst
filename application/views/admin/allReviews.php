<?php
	
	include_once("include/header.php");

?>

<div class="content-wrapper">

	
	</br>
    <div class="card">
        <div class="card-body">
        	<h4 class="card-title">Customer Reviews</h4>
          	<div class="row">
            	<div class="col-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
		                            <th>No </th>
		                            <th>Name</th>
		                            <th>Title</th>
		                            <th>Review</th>
		                            <th>Rating</th>
		                            <th>status</th>
		                            <th>date</th>
		                          	<th>Action<th>
		                            
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  					foreach ($reviews as $key => $review) {
	                        			
                        				?>

	                        				<tr>
	                        					<td><?php echo $key+1; ?></td>
	                        					
												<td><?php echo ucfirst($review->nick_name); ?></td>
												<td><?php echo $review->title; ?></td>
												<td>
													<textarea rows="5" style="width: 100%">
														<?php echo $review->review; ?>	
													</textarea>
													</td>
												<td><?php echo $review->rating; ?></td>
												<td>
													
							                      <label class="toggle-switch toggle-switch-success">
							                        <input type="checkbox"  id="<?php echo $review->rev_id?>" name="<?php echo $review->status ?>" onclick="my(<?php echo $review->rev_id?>)" value="<?php echo $review->rev_id?>" <?=$review->status==1 ? 'checked="checked"' : '';?>>
							                        		
							                        <span class="toggle-slider round"></span>
							                      </label> 
												
												</td>
												<td>
													
													<?php echo $review->create_on; ?>

													
												</td>
												<td>
													<a href='<?php echo base_url()."admin/review_reply?id=$review->rev_id"?>' class="btn btn-outline-danger">Reply</a>
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
   
   
   
    <br>
    
</div>


	
	
<?php
	

	include_once("include/footer.php");

?>
<script type="text/javascript">

	function my(rev_id){

		var id = rev_id
    	
    	var status = document.getElementById(id).getAttribute("name");
    	
    	if(status==1){
        	
        	status=0;
        	document.getElementById(id).setAttribute("name", status);
        }
        else
        {
        	status=1;
        	document.getElementById(id).setAttribute("name", status);
        }
    	
    	$.ajax({
        	url: '<?php echo base_url("admin/updateReviewStatus"); ?>',
        	type: 'POST',
        	cache: false,
        	data: {id, status},
        	success: function(responce){
            	//alert(responce);
        	}
    	});
	}
    
</script>