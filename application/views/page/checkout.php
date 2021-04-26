<?php
    
    require_once('header.php');
?>
	<style type="text/css">
		
	</style>
 <!-- SHOP CHECKOUT -->
        <div class="loadingPopUp" style="display:none;" id="lod">
			<div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
		</div>
        <section id="shop-checkout">
            <div class="container">
                <div class="shop-cart">
                    <div class="row">
                        <?php if(!isset($_SESSION['data']['customer']))
                            {
                                ?>
                                    <div class="col-lg-12 m-b-20">
                                        <div class="toggle accordion">
                                            <div class="ac-item" style="background:#ecf6f9">
                                                <h5 class="ac-title">Sign in to your account to continue.</h5>
                                                <div class="ac-content">
                                                    <form class="form-validate row" method="POST" action="<?php echo base_url('Shop/login_process')?>">
                                                        <div class="form-group col-lg-5">
                                                            <div class="input-group">
                                                                <input type="email" class="form-control" name="email" placeholder="Enter your email" required="">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group  col-lg-5">
                                                            <div class="input-group show-hide-password">
                                                                <input class="form-control" name="password" placeholder="Enter password" type="password" required="">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2"><button type="submit" class="btn btn-primary btn-block btn-primary">Sign in</button></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                          
                        <div class="col-lg-5">
                            <div class="table table-sm table-striped table-responsive table table-bordered table-responsive">
                                <table class="table m-b-0" id="tbl_1">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-thumbnail">Product</th>
                                            <th class="cart-product-name">Quantity</th>
                                            <th class="cart-product-subtotal">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            foreach ($items as $key => $item) {
                                                ?>
                                                     <tr>
                                                        <td class="cart-product-thumbnail">
                                                           <!-- <a href="#">
                                                                <img src="<?php echo base_url().'asset/images/'.$item[image]?>" alt="Codeine Phosphate 30mg">
                                                            </a>-->
                                                            <div class="cart-product-thumbnail-name"><?php echo $item['name']." x ".$item['num'];?></div>
                                                        </td>
                                                        <td class="cart-product-quantity"><?php echo $item['qty'];?></td>
                                                        <td class="cart-product-subtotal">
                                                            <span class="amount"><?php echo $_SESSION['sign'].$item['price']; ?></span>
                                                        </td>
                                                    </tr>           
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            
                             <div class="table-responsive">
                                <table class="table" id="tbl_2">
                                    <tbody>
                                        <tr>
                                            <td class="cart-product-name">
                                                <strong>Order Subtotal</strong>
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
                                               <span class="amount sm" id="sp_1">
                                                    <?php
                                                        if($_SESSION['sign']=='$')
                                                        {
                                                            echo "USPS Shipping Delivery ($50)";
                                                        }
                                                        else if($this->cart->order_ship()==15)
                                                        {
                                                            echo "Next Day Delivery (£15)";
                                                        }
                                                        else
                                                        {
                                                            echo "1st class signed for with tracking";
                                                        }
                                                    ?>
                                                </span>

                                            </td>
                                        </tr>
                                        <tr 
                                        	<?php 
                                        		if(isset($_SESSION['bit_discount']) || isset($_SESSION['bank_discount'])){
                                        			?>
                                        				style='display: table-row;'
                                        			<?php
                                        		}
                                        		else
                                        		{
                                        			?>
                                        				style='display: none;'
                                        			<?php	
                                        		}

                                        	?>>
                                            <td class="cart-product-name">
                                                <strong><?php echo (isset($_SESSION['bit_discount']) ? 'Payment Bitcoin':'Payment Bank Transfer')?></strong>
                                            </td>
                                            <td class="cart-product-name  text-right" >
                                                <span class="amount"><?php echo '-'.(isset($_SESSION['bit_discount']) ? $_SESSION['bit_discount']:$_SESSION['bank_discount']);?></span>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td class="cart-product-name">
                                                <strong>Coupon</strong>
                                            </td>
                                            <td class="cart-product-name  text-right">
                                                <span class="amount">0%</span>
                                            </td>
                                         </tr>-->
                                        <tr>
                                            <td class="cart-product-name">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="cart-product-name text-right">
                                                <span class="amount color lead"><strong id="ttl"><?php echo $_SESSION['sign'].($this->cart->total()+$this->cart->order_ship());?></strong></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-7">
							<div class="card col-lg-12">
                                <form action="<?php echo base_url('shop/order_submit');?>" method="POST">
    								<div class="row">
    									<div class="BilingHeadding col-lg-12 m-b-20">Biling Address</div>
    									<div class="col-lg-6 form-group">
    										<label class="sr-only">First Name*</label>
    										<input type="text" class="form-control" id="b_fname" name="b_fname" placeholder="First Name*" value="<?php echo $_SESSION['data']['customer']['cus_fname'];?>">
    										<span id="bFnameErr"></span>
    									</div>
    									<div class="col-lg-6 form-group">
    										<label class="sr-only">Last Name*</label>
    										<input type="text" class="form-control" id="b_lname" name="b_lname" placeholder="Last Name*" value="<?php echo $_SESSION['data']['customer']['cus_lname'];?>">
    										<span id="bLnameErr"></span>
    									</div>
    									<div class="col-lg-6 form-group">
    										<label class="sr-only">Phone*</label>
    										<input type="text" class="form-control" id="b_number" name="b_number" placeholder="Phone*" value="<?php echo $_SESSION['data']['customer']['cus_phone'];?>">
    										<span id="bNumberErr"></span>
    									</div>
    									<div class="col-lg-6 form-group">
    										<label class="sr-only">Email</label>
    										<input type="email" class="form-control" id="b_email" name="b_email" placeholder="Email*" value="<?php echo $_SESSION['data']['customer']['cus_email'];?>">
    										<span id="bEmailErr"></span>
    									</div>
    									<div class="col-lg-6 form-group">
    										<label class="sr-only">Town / City</label>
    										<input type="text" class="form-control" id="b_city" name="b_city" placeholder="Town / City*" value="<?php echo $_SESSION['data']['customer']['cus_city'];?>">
    										<span id="bCityErr"></span>
    									</div>
    									<div class="col-lg-6 form-group">
    										<label class="sr-only">State / County</label>
    										<input type="text" class="form-control" id="b_state" name="b_state" placeholder="State / County" value="<?php echo $_SESSION['data']['customer']['cus_state'];?>">
    										<span id="bStateErr"></span>
    									</div>
    									<div class="col-lg-6 form-group">
    										<label class="sr-only">Country</label>
    										<select id="b_country" name="b_country" class="country">
    											<option value="">SELECT COUNTRY</option>
    								    	   <?php
    								    	   		foreach ($countries as $key => $country) {
    								    	   			?>
    								    	   				<option value="<?php echo $country[iso];?>" <?= $_SESSION['data']['customer']['cus_country']==$country[iso] ?'selected="selected"' : '';?>><?php echo $country['name'];?></option>



    								    	   			<?php
    								    	   		}

    								    	   ?>
    										</select>
    										<span id="bCountryErr"></span>
    									</div>
    									<div class="col-lg-6 form-group">
    										<label class="sr-only">Postcode / Zip</label>
    										<input type="text" class="form-control" id="b_zipcode" name="b_zipcode" placeholder="Postcode / Zip*" value="<?php echo $_SESSION['data']['customer']['cus_zipcode'];?>">
    										<span id="bZipcodeErr"></span>
    									</div>
    									<div class="col-lg-12 form-group">
    										<label class="sr-only">Address</label>
    										<input type="text" class="form-control" id="b_add" name="b_add" placeholder="Address 1" value="<?php echo $_SESSION['data']['customer']['cus_add'];?>">
    										<span id="bAddErr"></span>
    									</div>
    									
    									
    									  
    									<div class="col-lg-12 shippingAddres">
    										<div class="row">
    											<div class="col-lg-12">
    												<label class="p-checkbox checkbox-color-primary">
    												<input href="#collapseFour" type="checkbox" name="d_add" id="d_add" checked="" data-toggle="collapse" class="collapsed" aria-expanded="false">
    												Delivery address is the same as billing address</label>
    											</div>
    											<div class="col-lg-12">
    												<div style="height: 0px;" aria-expanded="false" id="collapseFour" class="panel-collapse collapse">
    													<div class="panel-body">
    														
    														<div class="sep-top-xs">
    															<div class="row">
    																<div class="col-lg-6 form-group">
    																	<label class="sr-only">First Name*</label>
    																	<input type="text" class="form-control" id="s_fname" name="s_fname" placeholder="First Name*" value="">
    																</div>
    																<div class="col-lg-6 form-group">
    																	<label class="sr-only">Last Name*</label>
    																	<input type="text" class="form-control" id="s_lname" name="s_lname" placeholder="Last Name*" value="">
    																</div>
    																<div class="col-lg-12 form-group">
    																	<label class="sr-only">Address</label>
    																	<input type="text" class="form-control" id="s_add" name="s_add" placeholder="Address" value="">
    																</div>
    																<div class="col-lg-6 form-group">
    																	<label class="sr-only">Town / City</label>
    																	<input type="text" class="form-control" id="s_city" name="s_city" placeholder="Town / City*" value="">
    																</div>
    																<div class="col-lg-6 form-group">
    																	<label class="sr-only">State / County</label>
    																	<input type="text" class="form-control" id="s_state" name="s_state" placeholder="State / County" value="">
    																</div>
    																<div class="col-lg-6 form-group">
    																	<label class="sr-only">Country</label>
    																	<select id="s_country" name="s_country" class="country">
    																		<option value="CA">Canada</option>
    																		<option selected="selected" value="UK">United Kingdom (UK)</option>
    																		<option value="US">United States (US)</option>
    																		
    																	</select>
    																</div>
    																<div class="col-lg-6 form-group">
    																	<label class="sr-only">Postcode / Zip</label>
    																	<input type="text" class="form-control" id="s_zipcode" name="s_zipcode" placeholder="Postcode / Zip*" value="">
    																</div>
    																<div class="col-lg-6 form-group">
    																	<label class="sr-only">Phone*</label>
    																	<input type="text" class="form-control" id="s_number" name="s_number" placeholder="Phone*" value="">
    																</div>
    																<div class="col-lg-6 form-group">
    																	<label class="sr-only">Email</label>
    																	<input type="text" class="form-control" id="s_email" name="s_email" placeholder="Email*" value="">
    																</div>
    															</div>
    														</div>
    													</div>
    												</div>
    											</div>
    										</div>
    									</div>
    									
    								    <div class="col-lg-12 m-b-30 m-t-20" id="ok">
                                            <div class="BilingHeadding col-lg-12 m-b-20">Select Shipping Type</div>
                                            <div id="s_uk">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="uk" id="nd" value="option1" type="radio" checked="">
                                                    <label class="form-check-label" for="nd">Normal Delivery</label>
                                                </div>
                                                <!--<div class="form-check">
                                                    
                                                    <input class="form-check-input" name="uk" id="ndd" value="option2" type="radio">
                                                    
                                                    <label class="form-check-label" for="ndd">Next Day Delivery (£15)</label>
                                                </div>-->
                                            </div>
                                            <div class="form-check" id="s_us" style="display: none;"> 
                                                <input class="form-check-input" name="us" id="gridRadios3" value="option3" type="radio" checked="">
                                                <label class="form-check-label" for="gridRadios3">
                                                    USPS Shipping Delivery ($50)
                                                </label>
                                            </div>
                                        </div>
                                       
                                        <div class="container">
    									   <div class="row">
    									        
    									        <div class="BilingHeadding col-lg-12 m-b-20">Select Payment Method</div>
        									    <div class="col-lg-1"></div>
        										<div class="col-lg-10">
        										 
        											<ul class="PaymentOption" id="ok">
        												<li id="bank">
        													<label>
        														<input type="radio" name="pm" img="" class="brand" value="2" id="b" disabled=""
                                                                    <?php  

                                                                        if(isset($_SESSION['bank_discount']))
                                                                        {
                                                                            ?> 
                                                                                checked='true' 
                                                                            <?php
                                                                        }

                                                                    ?>
                                                                >
        														<span><img src="<?php echo base_url().'asset/images/bank.png'?>" alt="Bank"><h4>Bank Transfer</h4><b>10% Discount</b></span>
        													</label>
        												</li>
        												<li id="pm_bit">
        													<label>
        														<input type="radio" name="pm" img="" class="brand" value="3" disabled="" id="bit" 
        															<?php  

        																if(isset($_SESSION['bit_discount']))
        																{
        																	?> 
        																		checked='true' 
        																	<?php
        																}

        															?>
        														>
        														<span><img src="<?php echo base_url().'asset/images/bitcoin.png'?>" alt="Bitcoin">
        														<h4>Bitcoin</h4><b>15% Discount</b></span>
        													</label>
        												</li>
        											</ul>
        											<div id="bPmErr"></div>
        										</div>
        										<div class="col-lg-1"></div>
        									</div> 
    									</div>
    									
    								    <div class="col-lg-12 form-check">
                                            <label class="p-checkbox checkbox-color-primary">
                                            <input type="checkbox" name="term" checked=""><span class="p-checkbox-style"></span>
                                                <span>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our Terms & Conditions .</span>
                                            </label>
                                        </div>

    									<div class="col-lg-12 m-b-20">
    										<button type="submit" class="btn mt-3" id="sbt" style="float: right">Submit</button>
    									</div>
    								</div>
                                </form>
							</div>
						</div>
                        <div class="col-lg-12 card" id="paymentlists" style="display: none;">
						</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: SHOP CHECKOUT -->
<?php
    
    require_once('footer.php');
?>
<script type="text/javascript">
    

    $(document).ready(function(){
        
        if($("#b_fname").val()!="" && $("#b_lname").val()!="" && $("#b_email").val()!="" && $("#b_number").val()!="" && $("#b_country")!="" && $("#b_city") !="" && $("#b_state") !="" && $("#b_zipcode") !="" && $("#b_add") !="")
        {
            $('input:radio[class="brand"]').prop('disabled', false);    
        }
        
      	$(".country").on('change',function(){

      	    $("#lod").css('display','block'); 

            $('input:radio[class="brand"]').prop('disabled', false);		  
   			
   			$("#ndd").prop('checked', false);	  
   		    
   		    $("#nd").prop('checked', true);
            
            var code = $(".country").val();
      		
            
            if(code=='US')
            {
                
                $("#s_us").show();
                $("#s_uk").hide();
            }
            else
            {
              
                $("#s_uk").show();
                $("#s_us").hide();   
            }
      		$.ajax({

      			url:"<?php echo base_url().'shop/currency_converter'?>",
      			type:'POST',
      			data:{code},
      			success:function(responce){

      				$("#tbl_1").load(" #tbl_1");
      				
      				$("#tbl_2").load(" #tbl_2");

                   // $(".uk").load(" .uk");
                    //$("#usuuu").load(" #usuuu");
  					setTimeout( function(){ 
					    $("#lod").css('display','none'); 
					  }  , 1500 );
                },
      		});
      	});

        $('input:radio[name="uk"]').on('click', function(){

            var abc = $('input:radio[name="uk"]:checked').val();
            
            $.ajax({

                url:"<?php echo base_url().'shop/ship_type'?>",
                type:'POST',
                data:{abc},
                success:function(responce){
                    if(abc=='option2')
                    {
                        $("#ttl").load(" #ttl");
                        
                        $(".sm").text('Next Day Delivery (£15)');}
                    else
                    {
                        $("#ttl").load(" #ttl");
                        
                        $(".sm").text('1st class signed for with tracking'); 
                    }
                },
            });
            
        });

        $("#sbt").click(function(){

            var b_fname     =$("#b_fname").val();
            var b_lname     =$("#b_lname").val();
            var b_add       =$("#b_add").val();
            var b_city      =$("#b_city").val();
            var b_state     =$("#b_state").val();
            var b_country   =$("#b_country").val();
            var b_zipcode   =$("#b_zipcode").val();
            var b_number    =$("#b_number").val();
            var b_email     =$("#b_email").val();

            //alert(b_fname+" "+b_lname+" "+b_add+" "+b_city+" "+b_state+" "+b_country+" "+b_zipcode+" "+b_number+" "+b_email);
            
			if($('#b').prop('checked') || $('#bit').prop('checked')){

				
			}
			else
			{
				$("#bPmErr").css('color','red');
              	$("#bPmErr").html("Please select payment method");

              	var flag =0
			}
            if(b_fname=="") 
            {
              $("#bFnameErr").css('color','red');
              $("#bFnameErr").html("Please Enter First Name");
              $("#bFnameErr").show();
              var flag = 0;
           }
           else{
            $("#bFnameErr").hide();
           }
           if(b_lname=="")
           {
              $("#bLnameErr").css('color','red');
              $("#bLnameErr").html("Please Enter Last Name");
              $("#bLnameErr").show();
              var flag = 0;
           }
           else{
            $("#bLnameErr").hide();
           } 
           if(b_add=="")
           
           {
              $("#bAddErr").css('color','red');
              $("#bAddErr").html("Please Enter Address");
              $("#bAddErr").show();
              var flag = 0;
           } 
           if(b_city=="")
           {
              $("#bCityErr").css('color','red');
              $("#bCityErr").html("Please Enter City");
              $("#bCityErr").show();
              var flag = 0;
           } 
           if(b_country=="")
           {
              $("#bCountryErr").css('color','red');
              $("#bCountryErr").html("Please Select Country");
              $("#bCountryErr").show();
              var flag = 0;
           } 
           if(b_state=="")
           {
              $("#bStateErr").css('color','red');
              $("#bStateErr").html("Please Enter Postcode");
              $("#bStateErr").show();
              var flag = 0;
           } 
            if(b_zipcode=="")
           {
              $("#bZipcodeErr").css('color','red');
              $("#bZipcodeErr").html("Please Enter City");
              $("#bZipcodeErr").show();
              var flag = 0;
           } 
           if(b_number=="")
           {
              $("#bNumberErr").css('color','red');
              $("#bNumberErr").html("Please Enter Phone");
              $("#bNumberErr").show();
              var flag = 0;
           } 
           
           if(b_number!="")
           {
              if(b_number.length<10)
              {
                 $("#bNumberErr").css('color','red');
                 $("#bNumberErr").html("Please Enter Valid Phone Number");
                 $("#bNumberErr").show();
                 var flag = 0;
              }

              if(isNaN(b_number)) 
              {
                 $("#bNumberErr").css('color','red');
                 $("#bNumberErr").html("Please Enter Valid Phone Number");
                 $("#bNumberErr").show();
                 var flag = 0;
              }
           }
           
           if(b_email=="")
           {
              $("#bEmailErr").css('color','red');
              $("#bEmailErr").html("Please Enter Email Address");
              $("#bEmailErr").show();
              //$('#check_email').css('color','red');
              var flag = 0;
           }else
           {
                var email       = $("#b_email").val();

       
                var emailReg = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;

                if(!emailReg.test(email)) {
                   
                    $("#bEmailErr").css('color','red');
                    $("#bEmailErr").html("Please Enter Valid Email Address");
                    $("#bEmailErr").show();
                    
                    $(this).focus();
                    
                    var flag = 0;    
                }
           }
            if(flag!=0)
            {
                if($("#d_add").prop('checked') == true){
                  //  alert('ok');
                    var s_fname     =$("#b_fname").val();
                    var s_lname     =$("#b_lname").val();
                    var s_add       =$("#b_add").val();
                    var s_city      =$("#b_city").val();
                    var s_state     =$("#b_state").val();
                    var s_country   =$("#b_country").val();
                    var s_zipcode   =$("#b_zipcode").val();
                    var s_number    =$("#b_number").val();
                    var s_email     =$("#b_email").val();
                }
                else
                {
                    var s_fname     =$("#s_fname").val();
                    var s_lname     =$("#s_lname").val();
                    var s_add       =$("#s_add").val();
                    var s_city      =$("#s_city").val();
                    var s_state     =$("#s_state").val();
                    var s_country   =$("#s_country").val();
                    var s_zipcode   =$("#s_zipcode").val();
                    var s_number    =$("#s_number").val();
                    var s_email     =$("#s_email").val();
                }
                    
               if($(".ac").prop('checked') == true){
                
                    var ac=1;
                    //alert(ac);
                }
                else
                {

                    var ac=0
                }
            }

            if(flag==0)
            {
                return false;
            }
               
            $("#lod").css('display','block');
            
        });
       	
      
       /* function getRandomString(length) {
            var randomChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var result = '';
            for ( var i = 0; i < length; i++ ) {
                result += randomChars.charAt(Math.floor(Math.random() * randomChars.length));
            }
            return result;
        }*/

        /*$("#Radio3").click(function(){

            //alert("check Bitcoin");

            var id = getRandomString(64);

            var url = '<?php echo base_url('shop/addOrder')?>';
            var form = $('<form action="' + url + '" method="get">'+ 
              '<input type="text" name="id" value="' + id + '" />' +
              /*'<input type="text" name="qty" value="' + qty + '" />' +*/
             // '</form>');
            //$('body').append(form);
            //form.submit();
        //});*/
    });

 	$("#ok li").on('change', function(){

   		//let abc = $(".brand").val();
   		
   		$("#lod").css('display','block');

   		let id =this.id;
   		
   		$.ajax({

			url:'<?php echo base_url().'shop/bitcoin_permotion'?>',
			type:'POST',
			data:{id},
			success:function(responce){
                $("#tbl_1").load(" #tbl_1");
				$("#tbl_2").load(" #tbl_2");
			
				//alert(responce);
                setTimeout( function(){ 
				    $("#lod").css('display','none'); 
				}  , 1500 );
            },
        });
   	});
   	$("#b_email").change(function(){

       // console.log($("#b_email").val());
        console.log('ok');
        var email       = $("#b_email").val();

       
        /*var emailReg = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;

        if(!emailReg.test(email)) {
        $(this).after('<span style="color:red">Pleas enter valid email.</span>');
        $(this).focus();
        }*/

        var f_name      = $("#b_fname").val();

        var l_name      = $("#b_lname").val();

        var p_number    = $("#b_number").val();
        
        var full_name   = f_name+" "+l_name;
        
        $.ajax({

            url:'<?php echo base_url().'shop/update_db_card'?>',
            type:'POST',
            data:{email, full_name, p_number},
            success:function(responce){

                console.log(responce);
            },
        });
    });
</script>