<?php
	
	require_once('include/header.php');
?>
	
	<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
    <?php
      if($this->session->flashdata('msg'))
      {
        ?>
          <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
               <div class="alert btn-<?php echo $this->session->flashdata('class');?> alert-dismissible fade show" role="alert">
                    <p class="text-center"><?php echo $this->session->flashdata('msg');?><p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
          </div>    
         
      
           
          
            
        <?php
      }
    ?>
		<div class="card">
            <div class="card-body">
              <h4 class="card-title">Manage Page</h4>
              
              
              	
               
                
               

                <div class="form-group">
                  <label for="category">Pages</label> 
                    <select class="form-control js-example-basic-single w-100" name="p_category_id" id="new">
                      <option value="" id="abc">Select Here</option>
                      <?php
                        foreach ($pages as $key => $page) {
                          ?>
                            <option  value="<?php echo $page['p_id'];?>"><?php echo $page['page_name'];?></option>
                          <?php
                        }
                      ?>
                    </select>
                    
                </div>
            

                 <div class="row grid-margin">
	           		<div class="col-lg-12">
	              		<div class="card">
	                		<div class="card-body">
	                  			<h4 class="card-title">Long Description</h4>
	                  			
                         			<textarea name="p_long_description" id="summernoteExample" class="des_ar"></textarea>
	                		</div>
	              		</div>
	           		</div>
	          	</div>

                <input type="hidden" name="p_id" id="p_id" value="">
                <button type="submit" class="btn btn-gradient-primary mr-2 submit" id="save">Save</button>
                
            
            </div>
        </div>
	</div>
</div>
<?php
	
	require_once('include/footer.php');
?>

<script type="text/javascript">
	

	/*function abc(){

		alert('askdjlkasd');

		 d = document.getElementById("new").value;
		
		alert(d);
	}*/

	$(document).ready(function(){
		
		$("select").change(function(){
		  
		  var page_id=$("#new").val();
			
			$.ajax({

                url:"<?php echo base_url('admin/getPageData');?>",
                type:"POST",
                data:{page_id},
                success:function(response){

                	//alert(response);
                	
                	//alert(response.page_content);
                	var data = $.parseJSON(response);
                   	//alert(data.page_content);
                   	$(".card-block").html(data.page_content);
                   	$("#p_id").val(data.p_id);
                   	/*
                   	alert(data);
                   	 $.each(data, function(index, value){

                   	 	alert(value.page_content);
                   	 })*/
                   //$("#pc").html(response);
                }
            });
		});

		$("#save").click(function(){

			var p_id = $("#p_id").val();	
			var des  =$(".card-block").html()
			
      $.ajax({

        url:"<?php echo base_url().'admin/updatePageData'?>",
        type:'POST',
        data:{p_id, des},
        success:function(result){

          
            location.reload();
            alert(result);

          
        },
      });
		})
	});
</script>