<?php
  
  require_once('header.php');
?>
   <!-- Section -->
        <section>
            <div class="container-fluid d-flex flex-column">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-4 col-xl-3 mx-auto">
                    <div class="mb-5 text-center">
                        <h6 class="h3 mb-1">Password Recovery</h6>
                       
                    </div>
                    <?php
                        if($this->session->flashdata('msg')){
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    Your search did not return any results. Please try again with other information.
                                </div>
                            <?php                  
                        }
                    ?>

                    <span class="clearfix"></span>
                    <form class="form-validate" method="POST" action="<?php echo base_url('password_reset');?>">
                        <div class="form-group">
                            <label for="email">Please enter your email address to search for your account.</label>
                            <div class="input-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required="">
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