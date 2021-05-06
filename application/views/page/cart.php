<?php
	
	require_once('header.php');
?>
	
        <!-- SHOP CART -->
        <section id="shop-cart">
            <div class="container">
                <div class="shop-cart">
                    <?php
                        $items=$this->cart->contents();
                        


                        if(count($items)==0){

                          ?>
                                <div class="col-sm-12 text-center m-t-40 m-b-40">
                                    <img src="https://www.diazepamuk.com/images/empty_cart.png">
                                    <p>Shopping cart is empty</p> 
                                    <a href="<?php echo base_url();?>" class="btn btn-primary">Continue Shopping</a>
                                </div>
                               
                              
                          <?php
                        }
                        else
                        {
                            ?>
                                <div class="table table-sm table-striped table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-remove"></th>
                                                <th class="cart-product-thumbnail" colspan="2">Product</th>
                                                <!--<th class="cart-product-name">Description</th>-->
                                                <th class="cart-product-price">Unit Price</th>
                                                <th class="cart-product-quantity">Quantity</th>
                                                <th class="cart-product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($cart_data as $key => $cart) {
                                                    ?>
                                                         <tr>
                                                            <td class="cart-product-remove">
                                                                <a href="<?php echo base_url().'shop/delete_item/?id='.$cart[rowid]?>"><i class="fa fa-times"></i></a>
                                                            </td>
                                                            <td class="cart-product-thumbnail">
                                                               <!-- <a href="#">
                                                                    <img src="<?php echo base_url().'asset/images/'.$cart[image]?>" alt="Bolt Sweatshirt">
                                                                </a>-->
                                                            </td>
                                                            <td class="">
                                                                <?php echo $cart['name'].' x'.$cart['num'];?></br>
                                                                 <?php
                                                                    if(isset($cart['brand']) && $cart['pack']){
                                                                        ?>

                                                                           <b>Brand :</b><?php echo ucwords($cart['brand']);?></br>
                                                                           <b>Loose Or Strips :</b><?php echo ucwords($cart['pack']);?></br>  
                                                                           <b>Pack :</b><?php echo ucwords($cart['num']);?>
                                                                        <?php
                                                                    }
                                                                 ?>
                                                                 
                                                            </td>
                                                            <!--<td class="cart-product-description">
                                                                <p>
                                                                    <span>Gender: Women</span>
                                                                </p>
                                                            </td>-->
                                                            <td class="cart-product-price">
                                                                <span class="amount"><?php echo $_SESSION['sign'].$cart['price']?></span>
                                                            </td>
                                                            <td class="cart-product-quantity">
                                                                <div class="quantity">
                                                                    <input type="button" class="minus" value="-" dec_id="<?php echo $cart[rowid];?>">
                                                                    <input type="text" class="qty"  name="quantity" id="<?php echo $cart[rowid];?>" value="<?php echo $cart[qty]?>">
                                                                    <input type="button" class="plus" value="+" inc_id="<?php echo $cart[rowid]; ?>">
                                                                </div>
                                                            </td>
                                                            <td class="cart-product-subtotal">
                                                                <span class="amount"><?php echo $_SESSION['sign'].$cart['subtotal'];?></span>
                                                            </td>
                                                        </tr>           
                                                    <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                        
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-6 p-r-10">
                                        <div class="table-responsive">
                                            <h4>Cart Subtotal</h4>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="cart-product-name">
                                                            <strong>Cart Subtotal</strong>
                                                        </td>
                                                        <td class="cart-product-name text-right">
                                                            <span class="amount"><?php echo $_SESSION['sign'].$this->cart->total();?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart-product-name">
                                                            <strong>Shipping</strong>
                                                        </td>
                                                        <td class="cart-product-name  text-right">
                                                            <span class="amount">Free Shipping</span>
                                                        </td>
                                                    </tr>
                                                    <!--<tr>
                                                        <td class="cart-product-name">
                                                            <strong>Coupon</strong>
                                                        </td>
                                                        <td class="cart-product-name  text-right">
                                                            <span class="amount">-20%</span>
                                                        </td>
                                                    </tr>-->
                                                    <tr>
                                                        <td class="cart-product-name">
                                                            <strong>Total</strong>
                                                        </td>
                                                        <td class="cart-product-name text-right">
                                                            <span class="amount color lead"><strong><?php echo $_SESSION['sign'].$this->cart->total();?></strong></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                       
                                        <a href="<?php echo base_url();?>" class="btn btn-primary col-md-5 col-sm-12">Continue Shopping</a>
                                         <?php
                                            $cart=$this->cart->contents();

                                            
                                            if(count($cart)>0){
                                                ?>
                                                    <a href="<?php echo base_url('checkout')?>" class="btn icon-left float-right col-md-5 col-sm-12"><span>Proceed to Checkout</span></a>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    
                    <!--<div class="row">
                        <div class="col-lg-4">
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="text" placeholder="Coupon Code" id="CouponCode" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" id="widget-subscribe-submit-button" class="btn btn-primary">Apply</button>
                                    </div>
                                </div>
                                <p class="small">Enter any valid coupon or promo code here to redeem your discount.</p>
                            </form>
                        </div>
                        <div class="col-lg-8 text-right">
                        	
                        </div>
                    </div>-->
                    
                </div>
            </div>
        </section>
        <!-- end: SHOP CART -->
<?php
	
	require_once('footer.php');
?>

<script type="text/javascript">
	$(document).ready(function(){

		$(".plus").on('click',function(){
			//alert()

			let id = $(this).attr("inc_id");
			
			var val = $('#'+id).val();			
			var qty=	+val + +1;
			
				
			 var url = '<?php echo base_url('shop/update')?>';
	        var form = $('<form action="' + url + '" method="post">' +
	          '<input type="text" name="id" value="' + id + '" />' +
	          '<input type="text" name="qty" value="' + qty + '" />' +
	          '</form>');
	        $('body').append(form);
	        form.submit();
		});

		$(".minus").on('click',function(){
			//alert()

			let id = $(this).attr("dec_id");
			
			var val = $('#'+id).val();			
			var qty=	+val - +1;		
			
			
            if(qty>=1)
            {
                var url = '<?php echo base_url('shop/update');?>';
    	        var form = $('<form action="' + url + '" method="post">' +
    	          '<input type="text" name="id" value="' + id + '" />' +
    	          '<input type="text" name="qty" value="' + qty + '" />' +
    	          '</form>');
    	        $('body').append(form);
    	        form.submit();  
            }
			
			
		});
	})
</script>
</body>

</html>