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
                                <div class="alert alert-danger" role="alert">
                                    Invalid OPT
                                </div>
                            <?php                  
                        }
                    ?>
                    <span class="clearfix"></span>
                    <form class="form-validate" method="POST" action="<?php echo base_url('shop/update_pass');?>">
                        <p id="msg" style="color: red; text-align: center;"></p>
                         <div class="form-group ">
                          
                            <div class="input-group show-hide-password">
                                <input class="form-control" name="password" id="new_pass" placeholder="Enter your new password" type="password" required="">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                </div>

                            </div>
                            
                        </div>
                          <div class="form-group ">
                          
                            <div class="input-group show-hide-password">
                                <input class="form-control" name="c_password" id="con_pass" placeholder="confmirm passowrd" type="password" required="">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
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
<script type="text/javascript">
        $(document).ready(function(){

            $("form").submit(function(){

                var new_pass = $("#new_pass").val();
                
                var con_pass = $("#con_pass").val();
                    
                if(new_pass !== con_pass)
                {
                    $("#msg").html('Confirm password not match');
                    return false;
                }       
            });
        });
</script>
</body>

</html>