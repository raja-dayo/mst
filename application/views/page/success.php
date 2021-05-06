<?php
	
	require_once("header.php");

  //echo "<pre>";
  //print_r($orderInfo);
  //die;
?>
 
  <section>
    <div class="container m-t-40">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center">Thank you Your order has been recieved.</h2>
            <?php 
              if($orderInfo[0]['od_payment_type']==3)
              {
                ?>
                  <div class="col-md-10 card">
                        <table class="table table-borderd">
                          <thead>
                            <tr>

                              <th scope="col" class="" colspan="2">Bit Coin Wallet</th>
                           
                            </tr>
                          </thead>
                          <tbody>
                              
                              <td>Address</td>
                              <td>1E8dSfjL3gH1GMTQT6VUiu2P9yRLYVnNbB</td>
                              
                          </tbody>
                          
                        </table>
                      </div>
                <?php
              }
              else
              {
                ?>
                  <p class="text-center">We are only giving bank detail on email.<br> Please contact us on <a href="mailto:orders@mysleepingtabs.com">orders@mysleepingtabs.com</a> with your ORDER ID so that we can give you the bank details</p>
                <?php
              }
            ?>
            
        </div>
      </div>
      <div class="row m-t-60">
        <div class="col-lg-6">
          <h4 class="upper">Order Detail</h4>
          <div class="table table-sm table-striped table-responsive table table-bordered table-responsive">
            <table class="table m-b-0">
              <thead>
                <tr>
                  <th class="cart-product-thumbnail">Product</th>
                  <th class="cart-product-name">Qty</th>
                  <th class="cart-product-subtotal">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($orderInfo as $key => $od)
                  {
                    ?>
                      <tr>
                        <td class="cart-product-thumbnail">
                          <div class="cart-product-thumbnail-name"><?php echo ucwords($od['pro_full_name']).'-'.$od['p_qun'].' x '.$od['qty']?>
                               
                           <?php
                              if(isset($od['b_name']) && $od['pack_name']){
                                  
                                  ?>
                                    </br>
                                     <b>Brand :</b><?php echo ucwords($od['b_name']);?></br>
                                     <b>Loose Or Strips :</b><?php echo ucwords($od['pack_name']);?></br>  
                                     <b>Pack :</b><?php echo ucwords($od['p_qun']);?>
                                  <?php
                              }
                           ?>
                          </div>
                        </td>
                        <td class="cart-product-subtotal">
                          <span class="amount"><?php echo $od['qty']?></span>
                        </td>
                        <td class="cart-product-subtotal">
                          <span class="amount"><?php echo $od['qty']*$od['pro_price']?></span>
                        </td>
                      </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive">
                <h4>Order info</h4>
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="cart-product-name">
                        <strong>Order ID</strong>
                      </td>
                      <td class="cart-product-name text-right">
                        <span class="amount"><?php echo $orderInfo[0]['od_id']; ?></span>
                      </td>
                    </tr>
                    <tr>
                      <td class="cart-product-name">
                        <strong>Date</strong>
                      </td>
                      <td class="cart-product-name  text-right">
                        <span class="amount"><?php echo $orderInfo[0]['od_create_on']; ?></span>
                      </td>
                    </tr>
                     <tr>
                      <td class="cart-product-name">
                        <strong>Shipping</strong>
                      </td>
                      <td class="cart-product-name  text-right">
                          <span class="amount">
                           <?php 
                              if($orderInfo[0]['od_d_charge']==0)
                              {
                                echo "1st class signed for with tracking";
                              }
                              else if($orderInfo[0]['od_d_charge']==15)
                              {
                                echo "Next Day Delivery (£15)";
                              }
                              else if($orderInfo[0]['od_d_charge']==50)
                              {
                                echo "USPS Shipping Delivery ($50)";
                              }
                            ?>
                          </span>
                      </td>
                    </tr>
                    <tr>
                      <td class="cart-product-name">
                        <strong>Total</strong>
                      </td>
                      <td class="cart-product-name  text-right">
                          <span class="amount"><?php echo $_SESSION['sign'].($orderInfo[0]['od_total']+$orderInfo[0]['od_d_charge']); ?></span>
                      </td>
                    </tr>

                      <tr>
                        <td class="cart-product-name">
                          <strong>Payment Method</strong>
                        </td>
                        <td class="cart-product-name  text-right">
                          <span class="amount"><?php echo ($orderInfo[0]['od_payment_type']==2)? 'Bank Transfar':'Bitcoin';  ?></span>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
	
<?php
	
	require_once("footer.php");
?>
</body>

</html>