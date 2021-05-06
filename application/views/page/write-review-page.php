<?php 
    
    require_once('header.php');
?>

<body>
    
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Page Content -->
		<section id="page-content" style="background:#f2f2f5;" >
            <div class="container">
                <div class="row">
                    <!-- content -->
					<div class="col-lg-3">
					</div>
                    <div class="col-lg-6">
                        <div class="row">
                            <?php
                                if($this->session->flashdata('msg'))
                                {
                                    ?>
                                        <div class="col-lg-12">
                                           <div class="alert alert alert-<?php echo $this->session->flashdata('class');?> alert-dismissible fade show" role="alert">
                                                <?php echo $this->session->flashdata('msg');?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?>
							<div class="Write_Review col-lg-12">
								<form action="<?php echo base_url().'shop/add_review'?>" method="POST">
								    <div class="col-lg-12 m-b-20">
									    <h4>Rate your recent experience</h4>
    									<div class="starSelector">
    										<input type="radio" id='s-1' name="star_selector" value="1" class="Rating__star" tabindex="-1" v="stars-1.svg">
    										<input type="radio" id='s-2' name="star_selector" value="2" class="Rating__star" tabindex="-1" v="stars-2.svg">
    										<input type="radio" id='s-3' name="star_selector" value="3" class="Rating__star" tabindex="-1" v="stars-3.svg">
    										<input type="radio" id='s-2' name="star_selector" value="4" class="Rating__star" tabindex="-1" v="stars-4.svg">
    										<input type="radio" id='s-5' name="star_selector" value="5" class="Rating__star"  tabindex="0" v="stars-5.svg">
    									</div>
									    <div class="starRating large___3x4yz"><img alt="TrustScore: 0" src="<?php echo base_url().'asset/images/blog/stars-0.svg'?>" id="trt_img" img_val='0'></div>
                                        <p style="color: red; display: none;" id="rtmsg">Please select rating star</p>
								    </div>

								    <div class="col-lg-12">
									   <h4>Enter Your Nick name</h4>
                                        <p>Your nick name show on our review page with your review</p>
                                        <div class="form-group">
                                            <input type="text" id="notify_title" name="nick_name" placeholder="Enter Nick name here." class="form-control notification-message" required="">
                                        </div>
                                        <h4>Give your review a title</h4>
                                        <div class="input-group mb-3">
                                            <input type="text" id="notify_title" name="title" placeholder="Write the title of your review here." class="form-control notification-message">
                                            <div class="input-group-append">
                                                <span class="btn btn-light titleUpd"><i class="icon-edit-2"></i></span>
                                            </div>
                                        </div>
                                    
                                        <h4>Tell us about your experience</h4>
									    <div class="form-group">
										  <textarea id="notify_message" name="review" class="form-control notification-message" placeholder="This is where you write your review. Explain what happened, and leave out offensive words. Keep your feedback honest, helpful, and constructive." required="" rows="5"></textarea>
									    </div>
									
									    <h4>Enter Order Number (optional)</h4>
									    <p>Include your Order Number so it’s easier for Beauty Bay to identify you and reply to your review.</p>
									   <div class="form-group">
                                            <input type="text" id="notify_title" name="od_id" placeholder="Enter Order Number here." class="form-control notification-message">
                                        </div>
									
    									<div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  id="terms_conditions" class="custom-control-input" value="1" required=""/>
                                                <label class="custom-control-label" for="terms_conditions">I confirm this review is about my own genuine experience. I am eligible to leave this review,</a> and have not been offered any incentive or payment to leave a review for this company.</label>
                                            </div>
                                        </div>
									
                                        <input type="submit" class="btn btn-primary" value="submit">
									</div>
							    </form>
							</div>
						</div>
						
						<div class="div_cleat"></div>
                    </div>
                    <!-- end: content -->
                    <div class="col-lg-3">
					</div>
                </div>
            </div>
        </section>
    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <?php 
    
        require_once('footer.php');
    ?>

<script type="text/javascript">
    $(document).ready(function(){

      $(document).on('click','.Rating__star',function(){
            
            var abc = $(this).val();

           // var aaa = $(".Rating__star").val($(this).attr("v"));
            //var aaa = $(this).attr("v");
            
           $(this).attr('checked', true);

           

            var url = "<?php echo base_url().'asset/images/blog/'?>";
            
           $("#trt_img").attr("src", url+'stars-'+abc+'.svg');

            $("#trt_img").attr("img_val", abc);
        });

        $('.Rating__star').on("mouseover", function(){

            var abc = $(this).val();

            var url = "<?php echo base_url().'asset/images/blog/'?>";
            
            $("#trt_img").attr("src", url+'stars-'+abc+'.svg');
        });

        $('.Rating__star').on("mouseout", function(){
            
            var img_val = $("#trt_img").attr('img_val');
            
            var url = "<?php echo base_url().'asset/images/blog/'?>";
            
            $("#trt_img").attr("src", url+'stars-'+img_val+'.svg');     
        })

       

    });

   
</script>
</body>

</html>