<?php
	
	include('header.php');
?>
	 <!-- Section -->
        <section>
            <div class="container-fluid d-flex flex-column">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-4 col-xl-3 mx-auto">
                    <div class="mb-5 text-center">
                        <h6 class="h3 mb-1">Login</h6>
                        <p class="text-muted mb-0">Sign in to your account to continue.</p>
                    </div>
                    <span class="clearfix"></span>
                    <form class="form-validate" method="POST" action="<?php echo base_url('Login/login_process');?>">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <div class="input-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required="">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="icon-user"></i></span>
                            </div>
                        </div>
                        </div>
                        <div class="form-group ">
                            <label for="password">Password</label>
                            <div class="input-group show-hide-password">
                                <input class="form-control" name="password" placeholder="Enter password" type="password" required="">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                </div>

                            </div>
                            
                        </div>
                        <div class="mt-4"><button type="submit" class="btn btn-primary btn-block btn-primary">Sign in</button></div>
                    </form>

                    <div class="mt-4 text-center"> <a href="<?php echo base_url().'login/forgot_password/'?>" class="small font-weight-bold">Forgot Password</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
	
	require_once('footer.php');
?>