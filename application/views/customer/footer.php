    <!-- Footer -->
    <!--<div class="mob-footer container">
			<div class="row">
				<div class="col-lg-12  m-b-20">
						<select class="form-control" id="notify_icon" onChange="window.location.href=this.value">
							<option value="">CUSTOMER SERVICES</option>
							<option value="<?php echo base_url('about-us/')?>">About US</option>
							<option value="<?php echo base_url('contact-us/')?>">Contact Us</option>
							<option value="<?php echo base_url('faqs/')?>">FAQs</option>
							<option value="<?php echo base_url('blog/')?>">Blog</option>
							<option value="#"></option>
						</select>
				</div>
				<div class="copyright-text text-center col-lg-12">&copy; 2020 MysleepingTabs.com All Rights Reserved.</div>
			</div>
		</div>-->
    <div class="mob-footer container">
				<div class="toggle accordion accordion-shadow">
					<div class="ac-item">
						<h5 class="ac-title">About US</h5>
						<div class="ac-content">
							<p>We are the top suppliers of Valium, Xanax, Ambien and Temazepam. We send from within U.K and we have simple payment terms.</p>
							
							<a href="<?php echo base_url('about-us/')?>" class="btn btn-inverted">Click Here</a>
						</div>
					</div>
					<div class="ac-item">
						
						<h5 class="ac-title">Terms and Condition</h5>
						<div class="ac-content">
							<p>For Terms and Condition Go through the link below</p>
							<a href="<?php echo base_url('terms-conditions/')?>" class="btn btn-inverted">Click Here</a>
						</div>
							
					</div>
					<div class="ac-item">
						<h5 class="ac-title">Latest Blog</h5>
						<div class="ac-content">
							
						    <?php

		                	    foreach ($_SESSION['data']['posts'] as $key => $post) {
		                			
        		                   	if($key==5)
                        			{
                        				break;
                        			}
                        			else
                        			{
                        				$name= explode(' ', $post['name']);
                                        
        	                            $name= implode('-', $name);
        
        	                			?>
        	                				<li><a href="<?php echo base_url(strtolower($name).'/')?>"><?php echo $post['name'];?></a></li>
        	                			<?php
        	                		}	
		                		}
		                	?>

							
						</div>
					</div>
					<div class="ac-item">
						<h5 class="ac-title">Contact Us</h5>
						<div class="ac-content">
							<address>
								<span><i class="fa fa-map-marker-alt"></i> 19 Oakhall Court/Oakhall <br>Drive Sunbury-On-Thames Middlesex <br> TW16 7LE</span>
								<span><i class="fa fa-phone"></i> +44 7563 084792</span>
								<span><i class="far fa-envelope"></i> <a href="mailto:orders@mysleepingtabs.com">orders@mysleepingtabs.com</a><span>
							</address>
						</div>
					</div>
				</div>
				<div class="copyright-text text-center col-lg-12">&copy; 2020 MysleepingTabs.com All Rights Reserved.</div>
		</div>
    <footer id="footer" class="inverted">
      <div class="footer-content">
        <div class="container">
          <div class="row">
		  
		   <div class="col-xl-3 col-lg-3 col-md-6">
               <div class="widget">
					<div class="widget-title">About US</div>
					<p class="mb-5">We are the top suppliers of Valium, Xanax, Ambien and Temazepam. We send from within U.K and we have simple payment terms.</p>
						
					<div class="widget-title">Terms &amp; Condition</div>
					<p class="mb-5">For Terms and Condition Go through the link below</p>
					<a href="<?php echo base_url('terms-conditions/')?>" class="btn btn-inverted" target="_blank">Click Here</a>
				</div>
            </div>
			
			<div class="col-xl-3 col-lg-3 col-md-6">
              <div class="widget">
                <h4>Latest Blog</h4>
                <ul class="list">
                	<?php

                		foreach ($_SESSION['data']['posts'] as $key => $post) {
                			if($key==5)
                			{
                			    break;
                			}
                			$name= explode(' ', $post['name']);
                                
                            $name= implode('-', $name);

                			?>
                				<li><a href="<?php echo base_url(strtolower($name).'/')?>"><?php echo $post['name'];?></a></li>
                			<?php
                		}
                	?>
                  
                  <!--<li><a href="https://airforshare.com/files/NkTILD.html#">Stressed at Work- Here’s How to Keep a Work-Life Balance</a></li>
                  <li><a href="https://airforshare.com/files/NkTILD.html#">How to get over Anxiety in Coronoavirus Pandemic</a></li>
                  <li><a href="https://airforshare.com/files/NkTILD.html#">Buy Pregabalin in the UK without Prescription</a></li>
                  <li><a href="https://airforshare.com/files/NkTILD.html#">Trustpilot has blocked us from replying and claiming our Review page</a></li>-->
                </ul>
              </div>
            </div>
			
			<div class="col-xl-3 col-lg-3 col-md-6">
               <div class="widget">					
					<div class="widget-title">FAQs</div>
					<p class="mb-5">For Frequently Asked Question Go through the link below</p>
					<a href="<?php echo base_url('faqs/');?>" class="btn btn-reveal"><span>FAQs</span><i class="icon-chevron-right"></i></a>
					
					<div class="widget-title m-t-20 m-b-0">Usefull Link</div>
					<ul class="list">
						<?php

							foreach ($_SESSION['data']['pages'] as $key => $page) {
								?>
									<li><a href="<?php echo base_url("$page[page_url]".'/')?>"><?php echo ucwords($page['page_name'])?></a></li>
								<?php
							}
						?>
			            <!--<li><a href="<?php echo base_url('about-us')?>">About-us</a></li>
			            <li><a href="<?php echo base_url('contact-us')?>">Contact-us</a></li>-->
			            
			        </ul>
				</div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6">
				<div class="widget  widget-contact-us">
					<h4>Contact Us</h4>
					<ul class="list-icon m-b-40">
						<li><i class="fa fa-map-marker-alt"></i> 19 Oakhall Court/Oakhall Drive Sunbury-On-Thames Middlesex TW16 7LE</li>
						<li><i class="fa fa-phone"></i> +44 7563 084792</li>
						<li><i class="far fa-envelope"></i> <a href="mailto:orders@mysleepingtabs.com">orders@mysleepingtabs.com</a> </li>
					</ul>
					
					<h4>Add us on whatsapp</h4>
					<ul class="list-icon">
						<li><b><i class="fab fa-whatsapp"></i> +44 7563 084792</b></li>
					</ul>
				</div>
			</div>


            

          </div>
        </div>
      </div>
      <div class="copyright-content">
			<div class="container">
				<div class="copyright-text text-center">© <?php echo date('Y',time())?> MysleepingTabs.com All Rights Reserved.</div>
			</div>
		</div>
    </footer>
    <!-- end: Footer -->
    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('asset/js/plugins.js');?>"></script>
    <!--Template functions-->
    <script src="<?php echo base_url('asset/js/functions.js');?>"></script>
    <script src="<?php echo base_url('asset/js/custom.js');?>"></script>
</body>

</html>