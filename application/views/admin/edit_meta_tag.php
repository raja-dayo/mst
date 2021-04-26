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
              <h4 class="card-title">Edit Meta Tag</h4>
              
              
              	<?php  echo form_open_multipart("admin/update_mTag", 'class="forms-sample form"'); ?>
                <div class="form-group">
                  <label for="url">URL</label> 
                  <input type="text" class="form-control" id="url" name="url" placeholder="Enter Url" value="<?php echo $tag[0]['url']?>">
                  <p class="error mt-2 text-danger" id="url_msg"></p>
                </div>
                 <div class="form-group">
                  <label for="title">Title</label> 
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?php echo $tag[0]['title']?>">
                  <p class="error mt-2 text-danger" id="title_msg"></p>
                </div>

                  <div class="form-group">
                  <label>Keywords</label>
                    <input  type="text" class="form-control" style="background-color: #161622;" name="keywords" value="<?php echo $tag[0]['keywords']?>">
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Description</label>
                  <textarea class="form-control" id="exampleTextarea1" name="description" rows="4"><?php echo $tag[0]['description']?></textarea>
                </div>
     
                <button type="submit" class="btn btn-gradient-primary mr-2 submit">Update</button>
                <a href="<?php echo base_url().'admin/tagList'?>" class="btn btn-gradient-primary mr-2">Cancel</a>
                <input type="hidden" name="t_id" value="<?php echo $tag[0]['m_tag_id'];?>">
            <?php  echo form_close(); ?>
            </div>

	</div>
</div>
<?php

	include_once("include/footer.php");

?>