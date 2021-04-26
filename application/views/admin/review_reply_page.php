<?php
	
	require_once("include/header.php");
?>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="card">
            <div class="card-body">
         
              <?php  echo form_open_multipart("admin/add_reply", 'class="forms-sample form"'); ?>
                
                <div class="row grid-margin">
	           		<div class="col-lg-12">
	              		<div class="card">
	                		<div class="card-body">

	                  			<h4 class="card-title">Write Reply</h4>
	                  			<div id="">
	                  			</div>
	                  			<textarea id="summernoteExample" name="reply"></textarea>
	                		</div>
	              		</div>
	           		</div>
	          	</div>
	          	<input type="hidden" name="rev_id" value="<?php echo $id?>">
	          	 <button type="submit" class="btn btn-gradient-primary mr-2 submit">Save</button>
       			<?php  echo form_close(); ?>
            </div>
        </div>
	</div>
</div>

<?php
	
	require_once("include/footer.php");
?>
<script type="text/javascript">
		
	$(document).ready(function(event){

		//validation form for add product

		$(".form").submit(function(event){

			if($("#title").val()===""){
				
				if($("#title").val()===""){
          			
          			$("#title_msg").html("Please enter category title");  
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
		
	});		
</script>