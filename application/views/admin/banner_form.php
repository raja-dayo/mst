<?php

	include_once("include/header.php");
?>

<div class="content-wrapper" style="background-color: white;">
	<div class="container">

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
			            <div class="col-sm-4"></div>
			          </div>    
			      
			           
			          
			            
			        <?php
			      }
			    ?>


	 	<?php  echo form_open_multipart("admin/upload_banner", 'class="forms-sample form"'); ?>
	 	<div class="row" style="padding-top: 20px;">
     		<div class="col-lg-4 grid-margin stretch-card"></div>
     		<div class="col-lg-4 grid-margin stretch-card">
            	<div class="card">
                	<div class="card-body">
                  		<h4 class="card-title d-flex">Dropify
                    		<small class="ml-auto align-self-end">
                      			<a href="dropify.html" class="font-weight-light" target="_blank">More dropify examples</a>
                    		</small>
                  		</h4>
                  		<input type="file" class="dropify" name="img" />
                	</div>
              	</div>

            </div>
            <div class="col-lg-4 grid-margin stretch-card"></div>
        </div>
        <div class="row">
        	<div class="col-lg-4 grid-margin stretch-card"></div>
     		<div class="col-lg-4 grid-margin stretch-card text-center">
     				<button type="submit" class="btn btn-danger btn-icon-text"><i class="ti-upload btn-icon-prepend"></i>Upload</button>
     		</div>
        </div>
          
                                     
    <?php  echo form_close(); ?> 
 </div>
</div>
<?php

	include_once("include/footer.php");
?>