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
              <h4 class="card-title">Add New Page</h4>
              
              
              	<?php  echo form_open_multipart("", 'class="forms-sample form"'); ?>
               
                
               <div class="form-group">
                  <label for="title">Page Name</label> 
                  <input type="text" class="form-control" id="title" name="p_title" placeholder="Page Name">
                  <p class="error mt-2 text-danger" id="title_msg"></p>
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
                
                <button type="submit" class="btn btn-gradient-primary mr-2 submit">Add</button>
               
            <?php  echo form_close(); ?>
            </div>
        </div>
	</div>
</div>
<?php
	
	require_once('include/footer.php');
?>