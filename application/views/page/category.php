<?php
	
	require_once('header.php');

?>
 <!-- Shop products -->
		
		
		
        <section>
            <div class="container">
				
            	 <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a> </li>
                        
                            <li class="breadcrumb-item"><?php echo $products[0]['cat_name'];?></li>
                            <!--<li class="breadcrumb-item active" aria-current="page">Data</li>-->
                        </ol>
                    </nav>
                </div>

               <div class="row m-b-20">
                    <div class="col">
                        <h1 class="m-b-20"><?php echo $products[0]['cat_name'];?></h1>
                        <p>All the <?php echo $products[0]['cat_name'];?> are listed in this category</p>
                    </div>
                </div>
			
                <div class="shop">
                    <div class="grid-layout grid-4-columns" data-item="grid-item">
                        
                        <?php
                        	foreach ($products as $product) {
                        		//$arr     =explode(" ",$product['pro_name']);
                                //$title   =implode("-",$arr);
                        		?>
                        			<div class="grid-item">
			                            <div class="product">
			                                <div class="product-image">
			                                    <a href='<?php echo base_url("product/$product[pro_link]/"); ?>'><img alt="<?php echo ucwords($product['pro_full_name']);?>"  src="<?php echo base_url().'asset/images/product/'."$product[pro_image]"?>" title="<?php echo ucwords($product['pro_full_name']);?>">
			                                    </a>
			                                    <!--<div class="product-overlay">
			                                        <a href='<?php //echo base_url("product/$title/"); ?>' data-lightbox="ajax">Quick View</a>
			                                    </div>-->
			                                </div>
			                                <div class="product-description">

			                                    <div class="product-title">
			                                        <h3><a href='<?php echo base_url("product/$product[pro_link]/"); ?>'><?php echo ucwords($product['pro_full_name']);?></a></h3>
			                                    </div>
			                                    <div class="product-rate">
			                                        <i class="fa fa-star"></i>
			                                        <i class="fa fa-star"></i>
			                                        <i class="fa fa-star"></i>
			                                        <i class="fa fa-star"></i>
			                                        <i class="fa fa-star-half-o"></i>
			                                    </div>
			                                    
			                                </div>
			                            </div>
			                        </div>
                        		<?php
                        	}
                        ?>
                    </div>
                    <hr>
                    <!-- Pagination -->
                    <!--<ul class="pagination justify-content-end">
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item active"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>-->
                    <!-- end: Pagination -->
                </div>
            </div>
        </section>
        <!-- end: Shop products -->
<?php
	
	require_once('footer.php');

?>
</body>

</html>