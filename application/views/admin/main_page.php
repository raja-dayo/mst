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
                <p class="text-center"><?php echo $this->session->flashdata('msg');?></p>
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
        <h4 class="card-title">Add Text Main Page</h4>
        <?php  echo form_open_multipart("admin/updatePageContent", 'class="forms-sample form"'); ?>
         <div class="row grid-margin">
            <div class="col-lg-12">
                <div class="card">
                  
                  <div class="card-body">
                      <h4 class="card-title">Banner Content Section</h4>
                      
                     <textarea name="p_long_description" class="summernoteExample"><?php echo $result[0]['page_description']?></textarea>
                     <input type="hidden" name="id" value="<?php echo $result[0]['id'];?>">
                  </div>
                 
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2 submit">Save</button>             
        <?php  echo form_close(); ?>
      </div>
    </div>
    </br>
     <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Text Main Page</h4>
        <?php  echo form_open_multipart("admin/updatePageContent", 'class="forms-sample form"'); ?>
         <div class="row grid-margin">
            <div class="col-lg-12">
                <div class="card">
                  
                  <div class="card-body">
                      <h4 class="card-title">About Content Section</h4>
                      
                     <textarea name="p_long_description" class="summernoteExample"><?php echo $result[1]['page_description']?></textarea>
                     <input type="hidden" name="id" value="<?php echo $result[1]['id'];?>">
                  </div>
                 
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2 submit">Save</button>             
        <?php  echo form_close(); ?>
      </div>
    </div>
    </br>
		<div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Text Main Page</h4>
        <?php  echo form_open_multipart("admin/updatePageContent", 'class="forms-sample form"'); ?>
         <div class="row grid-margin">
            <div class="col-lg-12">
                <div class="card">
                  
                  <div class="card-body">
                      <h4 class="card-title">Content Section</h4>
                      
                     <textarea name="p_long_description" class="summernoteExample"><?php echo $result[2]['page_description'];?></textarea>
                     <input type="hidden" name="id" value="<?php echo $result[2]['id'];?>">
                  </div>
                 
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2 submit">Save</button>             
        <?php  echo form_close(); ?>
      </div>
    </div>
	</div>
</div>
              
	


<?php
	
	include_once("include/footer.php");

?>


<script type="text/javascript">
  (function() {
  
  var $sumNote = $(".summernoteExample")
    .summernote({
      callbacks: {
        onPaste: function(e,x,d) {
          $sumNote.code(($($sumNote.code()).find("font").remove()));
        }
      },

      dialogsInBody: true,
      dialogsFade: true,
      disableDragAndDrop: true,
      //                disableResizeEditor:true,
      height: "250px",
      tableClassName: function() {
        alert("tbl");
        $(this)
          .addClass("table table-bordered")

          .attr("cellpadding", 0)
          .attr("cellspacing", 0)
          .attr("border", 1)
          .css("borderCollapse", "collapse")
          .css("table-layout", "fixed")
          .css("width", "100%");

        $(this)
          .find("td")
          .css("borderColor", "#ccc")
          .css("padding", "4px");
      }
    })
    .data("summernote");

  //get
  $("#btn-get-content").on("click", function() {
    var y =$($sumNote.code());
  
    console.log(y[0]);console.log(y.find("p> font"));
  var x = y.find("font").remove();    
    $("#content").text($("#ta-1").val());
  });
  //get text$($sumNote.code()).find("font").remove()$($sumNote.code()).find("font").remove()
  $("#btn-get-text").on("click", function() {
    $("#content").html($($sumNote.code()).text());
  });
  //set
  $("#btn-set-content").on("click", function() {
    $sumNote.code(content);
  }); //reset
  $("#btn-reset").on("click", function() {
    $sumNote.reset();
    $("#content").empty();
  });
})();

</script>