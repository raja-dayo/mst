<?php

	include_once("include/header.php");
?>
<!--
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'admin_assets/css/jquery.dataTables.min.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'admin_assets/css/buttons.dataTables.min.css'?>">

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
	<div class="card">
            <div class="card-body">
              <h4 class="card-title">Filters</h4>
              
              
              	<?php  echo form_open_multipart("admin/get_data", 'class="forms-sample form"'); ?>
                <div class="row form-group">
                  <label for="url" class="col-sm-2">From</label> 
                  <input type="text" class="form-control col-sm-4" id="url" name="from" placeholder="Enter starting date">
                  
                  <label for="url" class="col-sm-2">To</label> 
                  <input type="text" class="form-control col-sm-4" id="url" name="to" placeholder="Enter end date">
                  
                </div>
                 <div class="row form-group">
                  <label for="url" class="col-sm-2">Payment</label> 
                  <select name="payment" class="col-sm-4 js-example-basic-single w-100">
                  	<option value="">Select Payment</option>
                  	<option value="2">Bank Transfer</option>
                  	<option value="3">Bitcoin</option>
                  </select>

                  <label for="url" class="col-sm-2">Country</label> 
                  <select name="country" class="col-sm-4 js-example-basic-single w-100">
                  	<option value="">Select Country</option>
                  	<option value="UK">Uk</option>
                  	<option value="USA">USA</option>
                  	<option value="CA">CAN</option>
                  </select>
                </div>

                <div class="row form-group">
                  <label for="url" class="col-md-2">Product</label> 
                  <select name="product" class="col-md-4 js-example-basic-single w-100">
                  	<option value="">Select Product</option>
                  	<?php
                  		foreach ($products as $key => $product) {
                  			?>
                  				<option value="<?php echo $product['pro_id']?>"><?php echo $product['pro_name'];?></option>
                  			<?php
                  		}
                  	?>
                  </select>

                 
                </div>
                <div class="row form-group">
                  <label for="url" class="col-md-2">Brand</label> 
                  <select name="brand" class="col-md-4 js-example-basic-single w-100">
                  	<option value="">Select Brand</option>

                  	<option value="1">Valium</option>
                  	<option value="2">Bensedin</option>
                  	<option value="3">Kern</option>
                  </select>

                 
                </div>
               <div class="row form-group">
                  <label for="url" class="col-md-2">Pack</label> 
                  <select name="pack" class="col-md-4 js-example-basic-single w-100">
                  	<option value="">Select Loose or stripes</option>
                  	<option value="2">Loose</option>
                  	<option value="3">Stripes</option>
                  </select>

                 
                </div>
     
                <button type="submit" class="btn btn-gradient-primary mr-2 submit">Get Data</button>
                
            <?php  echo form_close(); ?>
            </div>

	</div>

	

</div>

	<?php

		if(isset($result)){

			?>
					<div class="container-fluid" style="background-color: white; margin-top:50px; padding: 20px 10px">
			
						<div class="col-sm-12" style="color: black">
							<table id="example" class="display" cellspacing="0">
								<thead>
									<tr>
										<th>Order No</th>
										<th>Name</th>
										<th>Email</th>
										<th>Product</th>
										<th>Country</th>
										<th>Number</th>
										<th>PM</th>
										<th>Amount</th>
										<th>Order Date</th>

									</tr>
								</thead>

								<tbody>
									<?php
										foreach ($result as $key => $data) {
											?>
												<tr>
													<td><?php echo $data['od_id']?></td>
													<td><?php echo $data['cus_fname']." ".$data['cus_lname'];?></td>
													<td><?php echo $data['cus_email']?></td>
													<td>
														<?php  if($data['pro_is_brand']==1)
															{
																echo ucwords($abc[$key]['brands'][0]['b_name'].'/'.$abc[$key]['brands'][0]['pak_name']).'/'.$data['p_qun'];
															}
															else
															{
																echo $data['pro_full_name']." x ".$data['p_qun'];
															} 
														?>
														
													</td>
													<td><?php echo $data['od_s_country']?></td>
													<td><?php echo $data['cus_phone']?></td>
													<td><?php echo ($data['od_payment_type']=='2') ? 'Bank Transfer':'Bitcoin'?></td>
													<td><?php echo (($data['od_s_country']=='UK')? '£':'$').$data['od_total']?></td></td>
													<td><?php echo $data['od_create_on']  ?></td></td>

												</tr>
											<?php
										}
									?>
									
								</tbody>
							</table>
						</div>
					</div>
			<?php
		}

	?>
			
	

	<!--
		<table id="example" class="display nowrap" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Order No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Number</th>
				<th>PM</th>
				<th>Amount</th>
				<th>Order Date</th>

			</tr>
		</thead>

		<tbody>
			<tr>
				<td>#782</td>
				<td>Ahmed</td>
				<td>ahmed@gmail.com</td>
				<td>1465456</td>
				<td>Bitcoin</td>
				<td>455</td>
				<td>4-21-2021</td>

			</tr>
		</tbody>
	</table>
	-->
<?php

	include_once("include/footer.php");
?>

<script type="text/javascript" src="<?php echo base_url().'admin_assets/js/jquery-3.5.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'admin_assets/js/jquery.dataTables.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'admin_assets/js/dataTables.buttons.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'admin_assets/js/buttons.flash.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'admin_assets/js/pdfmake.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'admin_assets/js/jszip.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'admin_assets/js/vfs_fonts.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'admin_assets/js/buttons.html5.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'admin_assets/js/buttons.print.min.js'?>"></script>

<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script> 
-->
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>