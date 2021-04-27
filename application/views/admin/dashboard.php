<?php

	require_once("include/header.php");
?>


	
		<div class="content-wrapper">
        	<div class="row">
	            <div class="col-12 col-sm-6 col-xl-3 grid-margin">
	              <div class="card">
	                <div class="card-body">
	                  <div class="d-flex align-items-center justify-content-between">
	                    <div>
	                      <h4>Orders</h4>
	                      <h4 class="text-white mt-3">$6781.00</h4>
	                      <h6 class="text-muted">35.19% Since last month</h6>
	                    </div>
	                    <div class="icon-box icon-box-bg-image-warning">
	                      <i class="ti-announcement gradient-card-icon"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="col-12 col-sm-6 col-xl-3 grid-margin">
	              <div class="card">
	                <div class="card-body">
	                  <div class="d-flex align-items-center justify-content-between">
	                    <div>
	                      <h4>Sales</h4>
	                      <h4 class="text-white mt-3">$9653.00</h4>
	                      <h6 class="text-muted">73.52% Since last month</h6>
	                    </div>
	                    <div class="icon-box icon-box-bg-image-info">
	                      <i class="ti-agenda gradient-card-icon"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="col-12 col-sm-6 col-xl-3 grid-margin">
	              <div class="card">
	                <div class="card-body">
	                  <div class="d-flex align-items-center justify-content-between">
	                    <div>
	                      <h4>Revenue</h4>
	                      <h4 class="text-white mt-3">$4753.00</h4>
	                      <h6 class="text-muted">49.39% Since last month</h6>
	                    </div>
	                    <div class="icon-box icon-box-bg-image-danger">
	                      <i class="ti-pie-chart gradient-card-icon"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="col-12 col-sm-6 col-xl-3 grid-margin">
	              <div class="card">
	                <div class="card-body">
	                  <div class="d-flex align-items-center justify-content-between">
	                    <div>
	                      <h4>Cost</h4>
	                      <h4 class="text-white mt-3">$8753.00</h4>
	                      <h6 class="text-muted">18.33% Since last month</h6>
	                    </div>
	                    <div class="icon-box icon-box-bg-image-success">
	                      <i class="ti-briefcase gradient-card-icon"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	        </div>
	        <?php
	        
	            function getUserIpAddr(){
			    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			        //ip from share internet
			        $ip = $_SERVER['HTTP_CLIENT_IP'];
			    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			        //ip pass from proxy
			        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			    }else{
			        $ip = $_SERVER['REMOTE_ADDR'];
			    }
			    return $ip;
			}
                
                $ip =getUserIpAddr();
			
			
	        ?>
	        <h1><?php echo "my ip is ".$ip?></h1>
	   
<?php

	require_once("include/footer.php");
?>
