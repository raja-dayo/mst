<?php
  
  require_once('header.php');
?>
   <!-- Section -->
        <section>
            <div class="container-fluid d-flex flex-column">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-4 col-xl-3 mx-auto">
                    <div class="mb-5 text-center">
                        <h6 class="h3 mb-1">OTP Code Varification</h6>
                       
                    </div>
                    <?php
                        if($this->session->flashdata('msg')){
                            ?>
                                <div class="alert alert-<?php echo $this->session->flashdata('class')?>" role="alert">
                                    <?php echo $this->session->flashdata('msg')?>
                                </div>
                            <?php                  
                        }
                    ?>
                    <span class="clearfix"></span>
                    <form class="form-validate" method="POST" action="<?php echo base_url('shop/check_otp');?>">
                        <div class="form-group">
                            <label></label>
                            <div class="input-group">
                            <input type="text" class="form-control" name="otp" placeholder="Please enter your OTP" required="">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="icon-user"></i></span>
                            </div>
                        </div>
                        </div>
                      
                        <div class="mt-4"><button type="submit" class="btn btn-primary btn-block btn-primary">Submit</button></div>
                    </form>

                    
                </div>
            </div>
        </div>
    </section>
<?php
  
  require_once('footer.php');
?>