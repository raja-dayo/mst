<?php

	include("include/header.php");
?>
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        	<h4 class="card-title">Conversion List</h4>
          	<div class="row">
            	<div class="col-12">
              		<div class="table-responsive">
                		<table id="order-listing" class="table">
                  			<thead>
                    			<tr>
		                            
		                            <th>Conversion</th>
		                            <th>Rate</th>
		                            <th>Symbol</th>
		                            <th>Actions</th>
		                            
		                        </tr>
                  			</thead>
                  			<tbody>
                  				<?php
                  					foreach ($rates as $key => $rate) {
	                        			?>
                                            <tr>
                                                <td><?php echo strtoupper($rate['conversion']); ?></td>
                                                <td><?php echo $rate['rate']; ?></td>
                                                <td><?php echo $rate['sign']; ?></td>
                                                <td>
                                                    <a href='<?php echo base_url()."admin/edit_rate?id=$rate[id]"?>' class="btn btn-outline-info">Edit</a>
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
<?php

	include("include/footer.php");
?> 