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
          <div class="row" id="alert_msg">
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
        <h4 class="card-title">Edit Product</h4>
        <?php  echo form_open_multipart("admin/update_product", 'class="forms-sample form"'); ?>
        <div class="form-group">
          <label for="title">Title</label> 
          <input type="text" class="form-control" id="title" name="title" placeholder="Product Title" value="<?php echo $product[0]['pro_name']?>">
          <p class="error mt-2 text-danger" id="title_msg"></p>
        </div>
        <div class="form-group">
          <label for="category">Category</label> 
            <select class="form-control" id="category" name="category" >
              <option value="">Select Here</option>
              <?php
                foreach ($categories as $key => $category) {
                  ?>
                    <option value="<?php echo $category['cat_id'];?>"<?=$product[0]['cat_id']==$category['cat_id'] ?'selected="selected"' : '';?>><?php echo $category['cat_name'];?></option> 
                  <?php
                }
              ?>
            </select>
            <p class="error mt-2 text-danger" id="category_msg"></p>
        </div>
       <div class="form-group">
          <label>Image upload</label> 
          <input type="file" name="img" id="img" class="file-upload-default" value="<?php echo $product[0]['pro_image'];?>">
          <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" style="background-color: #161622;" value="<?php echo $product[0]['pro_image'];?>">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button" id="upload">Upload</button>
              </span>             
          </div>
         
          <p class="error mt-2 text-danger" id="img_msg"></p>
        </div>
        <img src="<?php echo base_url().'asset/images/product/'.$product[0]['pro_image']?>" style="width: 200px; height: 150px;"> 
        <!-- <div class="form-group">
            <label for="price">Price</label> 
            <input type="number" class="form-control" id="price" name="price" placeholder="Product price" value="<?php echo $product[0]['p_price']?>" >
            <p class="error mt-2 text-danger" id="price_msg"></p>
          </div>-->
           <!--<div class="form-group">
            <label for="qunatity">Propduct Quantity</label>	
              <select class="form-control" id="qunatity" name="qunatity" >
              	<option value="">Select Here</option>
           		<?php
           			for ($i=1; $i <=50 ; $i++) { 
         					?>
         						<option value="<?php echo $i;?>"<?=$product[0]['p_quantity']==$i ? 'selected="selected"' :''; ?>><?php echo $i;?></option>
         					<?php
           			}
           		?>	
              </select>
              <p class="error mt-2 text-danger" id="quantity_msg"></p>
         </div>-->
        <div class="form-group">
          <label for="exampleTextarea1">Short Description</label>
          <textarea class="form-control" id="exampleTextarea1" name="short_desc" rows="4"><?php echo $product[0]['pro_short_des'];?></textarea>
        </div>
        <div class="row grid-margin">
     	    <div class="col-lg-12">
        		<div class="card">
          		<div class="card-body">
            		<h4 class="card-title">Long Description</h4>
            		<textarea name="long_desc" id="summernoteExample"><?php echo $product[0]['pro_long_des'];?></textarea>
          		</div>
        		</div>
     		 </div>
    	 </div>
        <!--<div class="form-group">
        	<label>Meta Tag</label>
            <input name="tags" id="tags" style="background-color: #161622;" value="<?php echo $product[0]['pro_keywords']?>">
        </div>-->
        <input type="hidden" name="file_name" value="<?php echo $product[0]['pro_image'];?>">
        <input type="hidden" name="p_id" value="<?php echo $product[0]['pro_id'];?>">
        <button type="submit" class="btn btn-gradient-primary mr-2 submit">Update Product</button>
        <a href="<?php echo site_url("admin/products_list");?>" class="btn btn-light">Cancel</a>
        
        <?php  echo form_close(); ?>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Price</h4>
        <?php
          //echo $product[0]['pro_is_brand']." ".$product[0]['pro_id'];
          
          //echo "<pre>";
            //print_r($pro_prices);
          //echo "</pre>";

          foreach ($pro_prices as $key => $price) {
            
            if($price['pro_id']==$product[0]['pro_id'])
            {
              ?>

                <div class="form-group" id="ex_div">
                  <div class="row" id='abc'>
                    
                    <span class="col-sm-2">Quntity</span>
                    <input type="text" class="form-control col-sm-2" name="qun[]" id="<?php echo 'qun_'.$price['pp_id']?>" style="" value="<?php echo $price['p_qun']; ?>">

                    <label class="col-sm-1">Price</label>
                    <input type="text" class="form-control col-sm-2" name="ppp[]" id="<?php echo 'pri_'.$price['pp_id']?>" style="" value="<?php echo $price['p_price'];?>">

                    <!--<a href='<?php //echo base_url()."admin/update_price?id=$price[pp_id]"?>' class="btn btn-outline-success update">Update</a>-->
                    <button class="btn btn-outline-success update" value="<?php echo $price['pp_id']?>">Update</button>
                    <!--<a href='<?php echo base_url()."admin/delete_price?id=$price[pp_id]"?>' class="btn btn-outline-danger delete">Delete</a>-->
                    
                     <!--<button class="btn btn-outline-danger delete" value="<?php echo $price['pp_id']?>">Delete</button>-->

                     <label class="toggle-switch toggle-switch-success">
                     <input type="checkbox" id="<?php echo $price['pp_id']?>" onclick="my(<?php echo $price['pp_id']?>)" name="<?php echo $price['pr_status']?>" tag="stockList" value="<?php echo $price['pp_id']?>" <?=$price['pr_status']==1 ? 'checked="checked"' : '';?>>
                     <span class="toggle-slider round"></span>
                   </label>

                  </div>
                  
              </div>
              <?php
            }
          }
        ?>
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


      if($("#title").val()==="" || $("#category").val()==="" || $("#qunatity").val()==="" || $("#price").val()===""){
				
				if($("#title").val()===""){
          			
          			$("#title_msg").html("Please enter product title");  
        		}
        		if($("#category").val()===""){
          			
          			$("#category_msg").html("Please select product category");  
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


    

    $('.update').click(function(){

      var id  =$(this).val();
      
      var qun =$("#qun_"+id).val();

      var pri =$("#pri_"+id).val();
      
      //alert(id+" "+qun+" "+pri);

      $.ajax({
        url:"<?php echo base_url('admin/update_price')?>",
        type:"POST",
        data:{pp_id:id, p_qun:qun, p_price:pri},
        success:function(response){

          //alert(response);
          location.reload();
        },
      });
    });
    $('.delete').click(function(){

      var id  =$(this).val();

      console.log(id);
      $.ajax({
        url:"<?php echo base_url('admin/delete_price')?>",
        type:"POST",
        data:{pp_id:id},
        success:function(response){

          //alert(response);
          location.reload();
        },
      });
    });
   /*$.ajax({

          url:"<?php echo base_url('shop/getPack');?>",
          type:"POST",
          data:{brand, pro_id},
          success:function(response){

             $("#pc").html(response);
          }
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
  
  //console.log(status);
  $.ajax({                             
      url: '<?php echo base_url().'admin/updateStatusProductPrice'; ?>',
      type: 'POST',
      cache: false,
      data: {id, status},
      success: function(responce){
          console.log(responce);
      }
  });
  
}


</script>