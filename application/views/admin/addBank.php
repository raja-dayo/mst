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
        <h4 class="card-title">Add Bank</h4>
        <?php  echo form_open_multipart("admin/insertBank", 'class="forms-sample form"'); ?>
          <div class="form-group">
            <label for="url">Bank Name</label> 
            <input type="text" class="form-control" id="bname" name="bank_name" placeholder="Enter bank name" required="">
            <p class="error mt-2 text-danger" id="bname_msg"></p>
          </div>
          <div class="form-group">
            <label for="title">Acount Title</label> 
            <input type="text" class="form-control" id="title" name="acount_title" placeholder="Enter acount title" required="">
            <p class="error mt-2 text-danger" id="ac_title_msg"></p>
          </div>

          <div class="form-group">
            <label>Acount No</label>
            <input  type="text" class="form-control" name="acount_no" placeholder="Enter acount no" required="">
          </div>
          <div class="form-group">
            <label for="short_cord">Short Cord</label>
            <input  type="text" class="form-control" name="short_code" placeholder="Enter bank short cord" required="">
          </div>

          <button type="submit" class="btn btn-gradient-primary mr-2 submit">Add</button>
        <?php  echo form_close(); ?>
      </div>
    </div>
  </div>
<?php

	include_once("include/footer.php");

?>