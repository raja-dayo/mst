<?php
	
	include_once("include/header.php");

?>

<div class="content-wrapper">

	<div class="row">
		
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
    <div class="card col-sm-6" style="">
        <div class="card-body">
        	<h4 class="card-title"></h4>
          	<div class="row">
            	<div class="col-sm-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
		                            <th>No </th>
		                            <th>Pack</th>
		                            
		                            <th>Status</th>
		                         
		                            
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  				    	
	                        	    foreach ($packs as $key => $pack) 
	                        		{
                        			       ?>
    	                        				    <tr>
    	                        					    <td><?php echo $key+1; ?></td>
    	                        					
    												    <td><?php echo strtoupper($pack['pak_name']); ?></td>
    												    
    													<td>
    													
    							                        <label class="toggle-switch toggle-switch-success">
    							                            <input type="checkbox"  name="<?php echo $pack['pak_status'] ?>" id="<?php echo $pack['pak_id']?>" value="<?php echo $pack['pak_id']?>" <?=$pack['pak_status']==1 ? 'checked="checked"' : '';?>>
    							                        		
    							                            <span class="toggle-slider round"></span>
    							                        </label> 
    												
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

        	console.log(id+" "+status);
        	$.ajax({
		        url: "<?php echo site_url("admin/updatePack"); ?>",
		        type: "POST",
		        data: {id, status},
		        success:function(responce){
		        	alert('Status Updated');
		        }
		    });          
        });
    });

    
</script>