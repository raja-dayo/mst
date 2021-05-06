<?php 
	
	require_once('header.php');

	foreach ($data as $key => $review) {

		if($review['rating']==1){
			
			$one_star +=1;
		}
		else if($review['rating']==2){

			$two_star +=1;
		}

		else if($review['rating']==3){

			$three_star +=1;
		}
		else if($review['rating']==4){

			$four_star +=1;
		}
		else if($review['rating']==5){

			$five_star +=1;

			//$f_per = ($five_star*count($data->result()))/100 ; 
		}
	}
?>
<style type="text/css">
	#numbers li a.active {
	opacity: 1;
	background: #blue;
	color: #333;
}
</style>

<section id="page-content" style="background:#f2f2f5;" >
            <div class="container">
                <div class="row">
                    <!-- content -->
                    <div class="content col-lg-12">
						
						<div class="Review_Info_Detail row">
						
						<div class="row">
							<div class="Review_Detail col-lg-6">
								<h1>My Sleeping Tabs</h1>
								<p>Reviews <?= $total_str = count($data);?> &nbsp;•&nbsp; Excellent </p>
								<div class="Review_star-rating" style="float:none;">
									<img src="<?php echo base_url().'asset/images/blog/stars-4.svg'?>" alt="4.5 stars: Excellent"><span>4.4</span>
								</div>
								
							</div>
							
							<div class="col-lg-6 text-right">
								<a href="<?php echo base_url().'write-review/'?>" class="btn">Write a review</a>
							</div>
						</div>
						
							<div class="div_cleat"></div>
						</div>
						<div class="SortBy_review">
							<div class="SortBy_Review_Head">
								<h1>Reviews  <span>
									
									<?php

										echo $total_str = count($data);
									?>
								</span></h1>
							</div>
							<div class="ReviewProgress star-rating-5">
								<div class="rating_checkbox">
									<!--<input value="" id="rating-5" type="checkbox">-->
									<label for="rating-5">Excellent</label>
								</div>
								
								<div class="rating_progress">
									<div class="p-progress-bar-container small">
										<div class="p-progress-bar active"  data-percent="<?php echo intval($five_star*100/$total_str);?>" data-delay="1100" data-type="%">
										</div>
									</div>
								</div>
								<div class="rating_value"><?php echo intval($five_star*100/$total_str).'%';?></div>
							</div>
							
							<div class="ReviewProgress star-rating-4">
								<div class="rating_checkbox">
									<!--<input value="" id="rating-4" type="checkbox">-->
									<label for="rating-4">Great</label>
								</div>
								
								<div class="rating_progress">
									<div class="p-progress-bar-container small">
										<div class="p-progress-bar active" data-percent="<?php echo intval($four_star*100/$total_str);?>" data-delay="1100" data-type="%">
										</div>
									</div>
								</div>
								<div class="rating_value"><?php echo intval($four_star*100/$total_str).'%';?></div>
							</div>
							
							<div class="ReviewProgress star-rating-3">
								<div class="rating_checkbox">
									<!--<input value="" id="rating-3" type="checkbox">-->
									<label for="rating-3">Average</label>
								</div>
								
								<div class="rating_progress">
									<div class="p-progress-bar-container small">
										<div class="p-progress-bar active" data-percent="<?php echo intval($three_star*100/$total_str);?>" data-delay="1100" data-type="%">
										</div>
									</div>
								</div>
								<div class="rating_value"><?php echo intval($three_star*100/$total_str).'%';?></div>
							</div>
							
							<div class="ReviewProgress star-rating-2">
								<div class="rating_checkbox">
									<!--<input value="" id="rating-2" type="checkbox">-->
									<label for="rating-2">Poor</label>
								</div>
								
								<div class="rating_progress">
									<div class="p-progress-bar-container small">
										<div class="p-progress-bar active" data-percent="<?php echo intval($two_star*100/$total_str);?>" data-delay="1100" data-type="%">
										</div>
									</div>
								</div>
								<div class="rating_value"><?php echo intval($two_star*100/$total_str).'%';?></div>
							</div>
							
							<div class="ReviewProgress star-rating-1">
								<div class="rating_checkbox">
									<!--<input value="" id="rating-1" type="checkbox">-->
									<label for="rating-1">Bad</label>
								</div>
								
								<div class="rating_progress">
									<div class="p-progress-bar-container small">
										<div class="p-progress-bar active" data-percent="<?php echo intval($one_star*100/$total_str);?>" data-delay="1100" data-type="%">
										</div>
									</div>
								</div>
								<div class="rating_value"><?php echo intval($one_star*100/$total_str).'%';?></div>
							</div>
							<div class="SortBy_review_Footer">
								<form id="widget-search-form-sidebar" action="search-results-page.html" method="get">
									<div class="input-group">
									  <input type="text" aria-required="true" id="myInput" name="q" class="form-control widget-search-form" placeholder="Search review">
									 <!-- <div class="input-group-append">
										<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
									  </div>-->
									</div>
								</form>
							</div>
														
						</div>

						
						<table id="my-table" width="100%">
							<?php
								foreach ($data as $key => $review) {
									?>
										<tr>
											<td><div class="review-card">
										
												<a href="" class="consumer-information">
													<div class="consumer__picture"><img class="quick-evaluate__default-image" src="<?php echo base_url().'asset/images/blog/rvs.png'?>" alt="Your profile picture"></div>
													<div class="consumer-information__details">
														<div class="consumer__name"><?php echo ucwords($review['nick_name']);?>
															<span style="float:right"><?= $review['create_on']?></span>
														</div>
														<div class="consumer-information__data">
															<div class="consumer__reviews"><i class="fa fa-pencil-alt"></i> 13 reviews</div>
															<div class="consumer__location"><i class="icon-map-pin"></i> US</div>
														</div>
													</div>
												</a>
												
												<div class="rating__date">
													<div class="star-rating">
														<img src="<?php echo base_url().'asset/images/blog/stars-'.$review[rating].'.svg'?>" alt="5 stars: Excellent">
													</div>
													<div class="dates">3 hours ago</div>
													
												</div>
												<div class="review-content">
													<h2><a href="#"><?php echo $review['title'];?></a></h2>
													<p><?php echo $review['review'];?></p>
												</div>
												
												<!--<div class="review-footer">
													
													<div class="p-dropdown">
														<a class=""><i class="icon-thumbs-up"></i> Useful</a>
													</div>
													
													<div class="p-dropdown">
														<a class=""><i class="icon-share-2"></i> Share</a>
														<ul class="p-dropdown-content">
															<li><a href="#"><i class="fab fa-facebook-square"></i>Facebok</a></li>
															<li><a href="#"><i class="fab fa-twitter-square"></i>Twitter</a></li>
														</ul>
													</div>
												</div>-->
												<?php
													if(is_array($review['rep'])){
														
														foreach ($review['rep'] as $key => $reply) {
															?>
																<div class="reply_review">
																	<div class="reply_icon">
																		<i class="fas fa-reply"></i>
																	</div>
																	<div class="reply_content">
																		<div class="reply_info">
																			<b>Reply from ED</b>
																			<span><?php echo $reply['rep_create_on'];?></span>
																		</div>
																		<p>
																			<?php echo $reply['reply'];?>
																		</p>
																	</div>
																	<div class="div_cleat"></div>
																</div>

															<?php
														}
													}
												?>
												

											</div></td>
										</tr>
									<?php
								}
							?>
						</table>
						<div>
							
							<ul id="numbers" class="pagination justify-content-center" style="margin-top: 30px;"></ul>
						
						</div>
					</div>
                    <!-- end: content -->
                    
                </div>
            </div>
        </section>
<?php
	
	require_once('footer.php');
?>
<script type="text/javascript">
		
	$(document).ready(function(){
	  
		$("#myInput").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $("#my-table tr").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		});
	});

$(function() {
	const rowsPerPage = 5;
	const rows = $('#my-table tr');
	const rowsCount = rows.length;
	const pageCount = Math.ceil(rowsCount / rowsPerPage); // avoid decimals
	const numbers = $('#numbers');
	
	// Generate the pagination.
	for (var i = 0; i < pageCount; i++) {
		numbers.append('<li class="page-item"><a href="#" class="page-link">' + (i+1) + '</a></li>');
	}
		
	// Mark the first page link as active.
	$('#numbers li:first-child ').addClass('active');

	// Display the first set of rows.
	displayRows(1);
	
	// On pagination click.
	$('#numbers li').click(function(e) {
		var $this = $(this);
		
		e.preventDefault();
		
		// Remove the active class from the links.
		$('#numbers li ').removeClass('active');
		
		// Add the active class to the current link.
		$this.addClass('active');
		
		// Show the rows corresponding to the clicked page ID.
		displayRows($this.text());
	});
	
	// Function that displays rows for a specific page.
	function displayRows(index) {
		var start = (index - 1) * rowsPerPage;
		var end = start + rowsPerPage;
		
		// Hide all rows.
		rows.hide();
		
		// Show the proper rows for this page.
		rows.slice(start, end).show();
	}
});
</script>
</body>

</html>