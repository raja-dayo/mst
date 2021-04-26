<?php

	include_once("include/header.php");
?>
	<style type="text/css">
		.table td, .table th{
			padding: 15px 0 !important;
		}
	</style>
	 <div class="content-wrapper">
          <div class="row">
            <div class="col-md-5 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Filter</h4>
                  <form class="form-sample">
                        <div class="form-group row">
                          
                          <div class="col-sm-5">
                            <input type="text" id="key_1" name="key_1" class="form-control" placeholder="Search Keyword" />
                          </div>
                          <div class="col-sm-4">
                          	<select class="form-control" id="s_1">
                          		<option value="">Select Filter</option>
                          		<option value="cus_fname">First Name</option>
                          		<option value="cus_lname">Last Name</option>
                          		<option value="cus_phone">Phone Number</option>
                          		<option value="cus_email">Email</option>

                          		
                          		
                          	</select>
                          </div>
                        </div>
                      
                        <div class="form-group row">
                          
                          <div class="col-sm-5">
                            <input type="text" id="key_2" name="key_2" class="form-control" placeholder="Search Keyword" />
                          </div>
                           <div class="col-sm-4">
                          	<select class="form-control" id="s_2">
                          		<option value="">Select Filter</option>
                          		<option value="cus_fname">First Name</option>
                          		<option value="cus_lname">Last Name</option>
                          		<option value="cus_phone">Phone Number</option>
                          		<option value="cus_email">Email</option>

                          		
                          		
                          	</select>
                          </div>
                        </div>
						 <div class="form-group row">
						  
						  <div class="col-sm-5">
							<input type="text" id="key_3" name="key_3" class="form-control" id="exampleInputMobile" placeholder="Search Keyword">
						  </div>
						    <div class="col-sm-4">
                          	<select class="form-control" id="s_3">
                          		<option value="">Select Filter</option>
                          		<option value="cus_fname">First Name</option>
                          		<option value="cus_lname">Last Name</option>
                          		<option value="cus_phone">Phone Number</option>
                          		<option value="cus_email">Email</option>

                          		
                          		
                          	</select>
                          </div>
						</div>
						<div class="form-group row">
						 
						  <div class="col-sm-5">
							<input type="email" id="key_4" name="key_4" class="form-control" id="exampleInputEmail2" placeholder="Search Keyword">
						  </div>
						    <div class="col-sm-4">
                          	<select class="form-control" id="s_4">
                          		<option value="">Select Filter</option>
                          		<option value="cus_fname">First Name</option>
                          		<option value="cus_lname">Last Name</option>
                          		<option value="cus_phone">Phone Number</option>
                          		<option value="cus_email">Email</option>

                          		
                          		
                          	</select>
                          </div>
						</div>
                        
						<button type="button" class="btn btn-gradient-primary mr-2" id="clk">Click</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					 <div class="table-responsive">
						<table class="table">
						  <thead>
							<tr>
							  <th>ID</th>
							  <th>Name</th>
							  <th>Phone</th>
							  <th>Email</th>
							  <th>City</th>
							  <th>Action</th>
							</tr>
						  </thead>
						  <tbody>
							<!--<tr>
							  <td>Jacob</td>
							  <td>53275531</td>
							  <td>12 May 2017</td>
							  <td><label class="badge badge-gradient-danger">Pending</label></td>
							</tr>
							<tr>
							  <td>Messsy</td>
							  <td>53275532</td>
							  <td>15 May 2017</td>
							  <td><label class="badge badge-gradient-warning">In progress</label></td>
							</tr>
							<tr>
							  <td>John</td>
							  <td>53275533</td>
							  <td>14 May 2017</td>
							  <td><label class="badge badge-gradient-info">Fixed</label></td>
							</tr>
							<tr>
							  <td>Peter</td>
							  <td>53275534</td>
							  <td>16 May 2017</td>
							  <td><label class="badge badge-gradient-success">Completed</label></td>
							</tr>
							<tr>
							  <td>Dave</td>
							  <td>53275535</td>
							  <td>20 May 2017</td>
							  <td><label class="badge badge-gradient-warning">In progress</label></td>
							</tr>-->
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

		$("#clk").click(function(){

			var key_1 = $("#key_1").val();
			var key_2 = $("#key_2").val();
			var key_3 = $("#key_3").val();
			var key_4 = $("#key_4").val();

			var cons_1 = $("#s_1").val();
			var cons_2 = $("#s_2").val();
			var cons_3 = $("#s_3").val();
			var cons_4 = $("#s_4").val();
			
			$.ajax({
				url:"<?php echo base_url().'admin/getUsers';?>",

				type:'POST',
				data:{key_1,key_2,key_3,key_4,cons_1,cons_2,cons_3,cons_4},
				dataType:"json",
				success:function(data){

					console.log(data);

					var html = '';
					if(data.length>0){
						for (var count =0; count<data.length; count++) {
							html += '<tr>';
							html += '<td>'+data[count].cus_id+'</td>';
							html += '<td>'+data[count].cus_fname+" "+data[count].cus_lname+'</td>';
							html += '<td>'+data[count].cus_phone+'</td>';
							html += '<td>'+data[count].cus_email+'</td>';
							html += '<td>'+data[count].cus_city+'</td>';
							html += '<td>'+'<a class="btn btn-outline-primary" href="<?=base_url().'admin/customer_history?cus_id='?>'+data[count].cus_id+'" target="_blank">View</a>'+'</td>';
 							html += '</tr>';
 						}
 					}
 					else
 					{
 						html += '<tr><td colspan="5">No Data Found</td></tr>';
 					}
 					$('tbody').html(html);
				},
			});
		});
	});
</script>