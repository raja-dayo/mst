<?php
	
	include_once("include/header.php");

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
              <h4 class="card-title">Add New Product</h4>
              
              
              	<?php  echo form_open_multipart("admin/insert_product", 'class="forms-sample form"'); ?>
                <div class="form-group">
                  <label for="title">Title</label> 
                  <input type="text" class="form-control" id="title" name="p_title" placeholder="Product Title">
                  <p class="error mt-2 text-danger" id="title_msg"></p>
                </div>
                
                <div class="form-group">
                  <label for="title">Full Name</label> 
                  <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
                  <p class="error mt-2 text-danger" id="full_name_msg"></p>
                </div>

                 <div class="form-group">
                  <label for="title">Product Link</label> 
                  <input type="text" class="form-control" id="pro_link" name="pro_link" placeholder="Product Link">
                  <p class="error mt-2 text-danger" id="pro_linl_msg"></p>
                </div>

                <div class="form-group">
                  <label for="category">Category</label> 
                    <select class="form-control js-example-basic-single w-100" id="category" name="p_category_id" >
                      <option value="">Select Here</option>
                      <?php
                        foreach ($categories as $key => $category) {
                          ?>
                            <option value="<?php echo $category['cat_id'];?>"><?php echo $category['cat_name'];?></option>
                          <?php
                        }
                      ?>
                    </select>
                    <p class="error mt-2 text-danger" id="category_msg"></p>
                </div>
                 <div class="form-group">
                    <label>Image upload</label> 
                    <input type="file" name="img" id="img" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" style="background-color: #161622;">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button" id="upload">Upload</button>
                        </span>             
                    </div>
                    <p class="error mt-2 text-danger" id="img_msg"></p>
                </div>
                <!--
                <div class="row">
                  <div class="col-sm-2">Table Per</div>
                  <div class="col-sm-3">
                    <select class="form-control">
                      <option>30</option>
                      <option>60</option>
                      <option>90</option>
                      <option>120</option>
                      <option>150</option>
                      <option>200</option>
                    </select>
                  </div>
                  <div class="col-sm-2">Price</div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="pricee" name="price" placeholder="Product price">
                  </div>
                  <div class="col-sm-2">
                    <input type="submit" name="add" value="Add">
                  </div>
                </div> -->


                <div class="form-group"> 
                  
                  <label>Varaitions</label>
                  <input type="radio" name="var" value="1">Yes
                  <input type="radio" name="var" value="0">No
                </div>
                <div class="form-group" id="ex_div">
                  <div class="row" id='abc'>
                    <label for="price" class="col-sm-1">Brand</label>  
                 
                    <select class="form-control col-sm-2" name='brand[]'>
                      <option value="0">Select Brand</option>
                      <?php
                        foreach ($brands as $key => $brand) {
                          ?>
                            <option value="<?php echo $brand['b_id'];?>"><?php echo $brand['b_name']?></option>
                          <?php
                        }
                      ?>
                      <!--<option value="30">1X30</option>
                      <option value="60">1X60</option>
                      <option value="90">1X90</option>
                      <option value="120">1X120</option>
                      <option value="150">1X150</option>
                      <option value="200">1X200</option>-->
                    </select>
                    <label for="price" class="col-sm-1">Pack</label>  
                 
                    <select class="form-control col-sm-2" name='pack[]'>
                      <option value="0">Select Pack</option>
                      <?php
                        foreach ($packs as $key => $pack) {
                          ?>
                            <option value="<?php echo $pack['pak_id']?>"><?php echo $pack['pak_name'];?></option>
                          <?php
                        }
                      ?>
                      <!--<option value="30">1X30</option>
                      <option value="60">1X60</option>
                      <option value="90">1X90</option>
                      <option value="120">1X120</option>
                      <option value="150">1X150</option>
                      <option value="200">1X200</option>-->
                    </select>
                  
                    <label class="col-sm-1">Quntity</label>
                    <input class="form-control col-sm-2" name="qun[]" id="" style="" value="">

                    <label class="col-sm-1">Price</label>
                    <input class="form-control col-sm-2" name="ppp[]" id="" style="" value="">
                  </div>
                  <!--<label for="price">Price</label> 
                  <input type="number" class="form-control col-sm-3" id="price" name="price" placeholder="Add More price" >-->

                  <p class="error mt-2 text-danger" id="price_msg"></p>
                </div>

                <div class="form-group">
                  <button type="button" class="btn btn-gradient-primary mr-2" id='btn-new'>Add More Price</button>
                </div>
                 
                
                <div class="form-group">
                  <label for="exampleTextarea1">Short Description</label>
                  <textarea class="form-control" id="exampleTextarea1" name="p_short_description" rows="4"></textarea>
                </div>
                
               <div class="row grid-margin">
	           		<div class="col-lg-12">
	              		<div class="card">
	                		<div class="card-body">
	                  			<h4 class="card-title">Long Description</h4>
	                  			
                         <textarea name="p_long_description" id="summernoteExample"></textarea>
	                		</div>
	              		</div>
	           		</div>
	          	</div>


                <div class="form-group">
                  <label for="title">Meta Title</label> 
                  <input type="text" class="form-control" id="mtitle" name="meta_title" placeholder="">
                    <p class="error mt-2 text-danger" id="m_title"></p>
                </div>
                 <div class="form-group">
                  <label for="exampleTextarea1">Meta Description</label>
                  <textarea class="form-control" id="exampleTextarea1" name="meta_des" rows="2"></textarea>
                </div>
                <div class="form-group">
                	<label>Meta Tag</label>
                    <input class="form-control" name="keywords" id="tags" style="background-color: #161622;" value="">
                </div>
                
                <button type="submit" class="btn btn-gradient-primary mr-2 submit">Add Product</button>
                <button class="btn btn-light">Cancel</button>
            <?php  echo form_close(); ?>
            </div>
        </div>
	</div>
</div>
              
	


<?php
	
	include_once("include/footer.php");

?>

<script type="text/javascript">
		
	$(document).ready(function(event){

		//validation form for add product

		$(".form").submit(function(event){

			if($("#title").val()==="" || $("#img").val()==="" || $("#category").val()==="" || $("#qunatity").val()==="" || $("#price").val()===""){
				
				if($("#title").val()===""){
          			
          			$("#title_msg").html("Please enter product title");  
        		}
        		if($("#category").val()===""){
          			
          			$("#category_msg").html("Please select product category");  
        		}
        		if($("#img").val()===""){
          			
          			$("#img_msg").html("Please enter product image");  
        		}
        		if($("#price").val()===""){
          			
          			$("#price_msg").html("Please enter product price");  
        		}
        		if($("#qunatity").val()===""){
          			
          			$("#quantity_msg").html("Please enter product quantity");  
        		}
				return false;
			}
			else{
				return true;
			}
		});

		//remove messages

		$("#title").keypress(function(){
			$("#title_msg").html("");
		});
		$("#category").change(function(){
			$("#category_msg").html("");
		});
		$("#upload").click(function(){
			$("#img_msg").html("");
		});
		$("#price").keypress(function(){
			$("#price_msg").html("");
		});
		$("#qunatity").change(function(){
			
			$("#quantity_msg").html("");
		});

    $("#btn-new").click(function(){

      //alert('hi raja');

      $("#abc").clone().appendTo("#ex_div");
    });
	});		
</script>