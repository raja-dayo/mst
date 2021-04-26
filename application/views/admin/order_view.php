<?php

	include_once("include/header.php");
?>

<div class="content-wrapper" style="background-color: white">
	<div class="container">
        
           <div class="alert alert-success" role="alert" style="margin-top:5%">
            <div class="row">
              <div class="col-sm-4">
                  <p class="mb-0">Order # <?php echo $result[0]['od_id'];?></p>
              <p class="mb-0">Place on <?php echo $result[0]['od_create_on'] ;?></p>
              </div>
              <div class="col-sm-4">
                <p>Billing Address</p>
                 <p><?php echo ucwords($result[0]['cus_fname']." ".$result[0]['cus_lname'])?></p>
                
                <p><?php echo $result[0]['cus_add']?></p>
                <p><?php echo $result[0]['cus_city']?></p>
                <p><?php echo $result[0]['cus_state']?></p>
                 <p><?php echo $result[0]['cus_zipcode']?></p>
                <p><?php echo $result[0]['cus_country']?></p>
                <p><?php echo $result[0]['cus_email']?></p>
                <p><?php echo $result[0]['cus_phone']?></p>
              </div>
              <div class="col-sm-4">
                <p>Shipping Address</p>
                <p><?php echo ucwords($result[0]['od_s_fname']." ".$result[0]['od_s_lname'])?></p>
                <p><?php echo $result[0]['od_s_add']?></p>
                <p><?php echo $result[0]['od_s_city']?></p>
                <p><?php echo $result[0]['od_s_state']?></p>
                <p><?php echo $result[0]['od_s_zipcode']?></p>
                <p><?php echo $result[0]['od_s_country']?></p>
                <!--<p><?php echo $result[0]['od_s_email']?></p>-->
                <p><?php echo $result[0]['od_s_num']?></p>
              </div>
            </div>
            
              <hr>
              <?php
                foreach ($result as $key => $order) 
                {
                  ?>          
                    <div class="row">
                      <div class="col-sm-2"><img style="width: 100px; height: 100px;" src="<?php echo base_url().'asset/images/'.$order['pro_image'];?>"></div>
                        <div class="col-sm-4"><?php echo strtoupper($order['pro_full_name']).' x '.$order['p_qun'];?>
                          <?php
                            if(isset($order['b_name'])){
                              ?>
                                <p><b>Brands : </b><?php echo ucwords($order['b_name']); ?></p>
                                <p><b>Stripes or Loose : </b><?php echo ucwords($order['pack_name']); ?></p>
                              <?php
                            }
                          ?>
                          
                        </div>
                        <div class="col-sm-2"><span style="color: red">Qty: <?php echo $order['qty']?></span></div>
                       <div class="col-sm-2">
                            <span style="color: red"> <?php echo $order['qty']*$order['pro_price']?></span>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>    
                    </br>
                  <?php
                }
              ?>
                  <div class="row">
                      <div class="col-sm-2"></div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-2"><span style="color: red"><?php echo ($result[0]['od_discount']>0)? 'Discount :':''?></span></div>
                        <div class="col-sm-2">
                            <span style="color: red"> <?php echo ($result[0]['od_discount']>0)? '-'.$result[0]['od_discount']:''?></span>
                        </div>
                        <div class="col-sm-2"></div>

                    </div>   
              <hr>
              <div class="row">
                <div class="col-sm-8">Total Amount</div>
                <div class="col-sm-4" style="color: red"><?php echo   ($result[0]['od_s_country']=='UK')? '£'.$result[0]['od_total']:'$'.$result[0]['od_total']?></div>
              </div>
            </div>
          </div>
        </div>

<?php
	
	include_once("include/footer.php");
?>