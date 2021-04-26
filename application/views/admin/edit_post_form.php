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
              <h4 class="card-title">Edit Post Form</h4>
              
              
              	<?php  echo form_open_multipart("admin/update_post", 'class="forms-sample form"'); ?>
                <div class="form-group">
                  <label for="title">Title</label> 
                  <input type="text" class="form-control" id="title" name="title" placeholder="Add Title" value="<?php echo $post[0]['name'];?>">
                  <p class="error mt-2 text-danger" id="title_msg"></p>
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Excerpt</label>
                  <textarea class="form-control" id="exampleTextarea" name="excerpt" rows="4"><?php echo $post[0]['short_des'];?></textarea>
                </div>
                 <div class="row grid-margin">
	           		  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Long Description</h4>
                          
                         <textarea name="long_desc" id="summernoteExample"><?php echo $post[0]['long_des'];?></textarea>
                      </div>
                    </div>
                </div>
	          	</div>
	          	  <div class="form-group">
                    <label>Image upload</label> 
                    <input type="file" name="img" id="img" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" style="background-color: #161622;" value="<?php echo $post[0]['image'];?>">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button" id="upload">Upload</button>
                        </span>             
                    </div>
                    <p class="error mt-2 text-danger" id="img_msg"></p>
                </div>
              
                <div class="form-group">
                	<label>Categories</label>
                    <?php
                    	foreach ($categories  as $key => $category){
                    		
                        $cates_id= explode(',', $post[0]['cat_id']);
                        
                        ?>
                    			<div class="form-check">
                    				<label class="form-check-label">
                    					<input type="checkbox" class="form-check-input" name="cat[]" value="<?php echo $category['cat_name']?>"
                              <?=$category['cat_id']==$post[0]['cat_id']?'checked' : '';?>>

                              <?php echo $category['cat_name']?>

                             
                    				</label>
                    			</div>
                    		<?php
                    	}
                    ?>
                </div> 

                <input type="hidden" name="post_id" value="<?=$post[0]['id']?>">
                <button type="submit" class="btn btn-gradient-primary mr-2 submit">Update</button>
                <button class="btn btn-light">Cancel</button>
            <?php  echo form_close(); ?>
            </div>

	</div>
</div>
<?php

	include_once("include/footer.php");

?>