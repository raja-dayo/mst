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
    <div class="card">
        <div class="card-body">
        	<h4 class="card-title">Abandon Cart List</h4>
        	
        	<form method="POST" action="<?php echo base_url().'admin/adb_dlt_items'?>">
        		
        		<input type="submit" class="btn btn-warning" name="dlt" value="Delete">
              	
              	<div class="row">
                	<div class="col-12">
                  		<div class="table-responsive">
                    		<table id="order-listing" class="table">
                      			<thead>
                        			<tr>
                        			    <th><input type="checkbox" id="all_check"> Select </th>
    		                            <th>No </th>
    		                            <th>Full Name</th>
    		                            <th>Eamil</th>
    		                           	<!--<th>User IP</th>
    		                            <th>Tag</th>-->
    		                            <th>Product</th>
    		                            <th>Number</th>
    		                            <th>Date</th>
    		                            
    		                        </tr>
                      			</thead>
                      			<tbody>
                      				<?php
                      					foreach ($records as $key => $record) {
    	                        			?>
    	                        				<tr>
    	                        				    <td><input type="checkbox" class="chk" name="check[]" value="<?php echo $record->ac_id?>"></td>
    	                        					<td><?php echo $key+1; ?></td>
    	                        					<td><?php echo ucwords($record->full_name); ?></td>
    												<td><?php echo $record->email; ?></td>
    												<!--<td><?php echo $record->ip; ?></td>-->
    												<td><?php echo ucwords($record->pro_full_name)." x ".$record->p_qun; ?></td>
    												<td><?php echo $record->phone_number; ?></td>
    												<td><?php echo $record->create_on; ?></td>
    												
    											
    	                        				</tr>
    	                        			<?php
    	                        		}
    
    	                        	?>
    	                    	</tbody>
                    		</table>
                  		</div>
               		</div>
              	</div>
            </form>
        </div>
    </div>
</div>

<?php
	
	include_once("include/footer.php");
?>
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
	})
</script>