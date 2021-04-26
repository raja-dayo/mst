<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Hotjar Tracking Code for https://www.mysleepingtabs.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1778405,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-54758582-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-54758582-1');
</script>



    <script type="application/ld+json">
  		{
  		"@context": "http://schema.org/",
  		"@type": "Organization",
  		"url": "https://www.mysleepingtabs.com/",
  		"logo": "asset/images/mstlogo.png"
  		}
    </script>
    <script type="application/ld+json">
    {
    	"@context": "http://schema.org",
    	"name": "My Sleeping Tabs",
    	"url": "https://www.mysleepingtabs.com/",
    	"telephone": "+44 7563 084792",
    	"priceRange": "GBP",
    	"image": "asset/images/mstlogo.png",
    	"@type": "LocalBusiness",
    	"address": {
    	"@type": "PostalAddress",
    	"streetAddress": "19 Oakhall Court",
    	"addressLocality": "LONDON",
    	"addressRegion": "United Kingdom",
    	"postalCode":"TW16 7LE",
    	"email": "orders@mysleepingtabs.com"
    	}
    }
    </script>

<!--Start of Tawk.to Script-->
<!--<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c8677f2101df77a8be1ff6f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>-->
<!--End of Tawk.to Script-->
    <meta name="ahrefs-site-verification" content="a1eb6caa16736f6924b8bbd4c9b3c3b85de47a859873d2329fca9fb58ddda12c">

    <?php

        $meta_data=$this->session->flashdata('metatag');

    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!--<meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo, html template">-->
    <link rel="icon" type="image/png" href="<?php echo base_url('asset/images/favicon.png')?>">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
   <!-- <title><?php echo $meta_data[0]['title'];?></title>
    <meta name="title" content="<?php echo $meta_data[0]['title'];?>">
    <meta name="description" content="<?php echo $meta_data[0]['description'];?>">
    <meta name="keywords" content="<?php echo $meta_data[0]['keywords'];?>">-->
    
      <title><?php echo ($meta_data[0][title]=="")? 'Buy Anti-anxiety meds and pain killers online from a trustworthy supplier | MySleepingtabs.com' : $meta_data[0][title]?></title>

    <meta name="title" content="<?php echo ($meta_data[0][title]=="")? 'Buy Anti-anxiety meds and pain killers online from a trustworthy supplier | MySleepingtabs.com' : $meta_data[0][title]?>">

    <meta name="description" content="<?php echo ($meta_data[0][description]=="")? 'You can Buy pain meds and sleeping pills, anti-anxiety pills online from top vendor. We offer quality Xanax and valium in bulk quantities and small from within U.S and U.K at very affordable prices.' : $meta_data[0][description]?>">


    <meta name="keywords" content="<?php echo ($meta_data[0][keywords]=="")? 'Buy Xanax online, buy oxycodone online, buy valium online, Xanax supplier, oxycodone supplier, valium supplier, buy sleeping pills, buy pain meds' : $meta_data[0][keywords]?>">
    <!-- Stylesheets & Fonts -->
    <link href="<?php echo base_url('asset/css/plugins.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/css/style.css')?>" rel="stylesheet">
</head>

<body>

    <!-- Body Inner -->
    <div class="body-inner">
      <!-- Topbar -->
        <div id="topbar" class="topbar-fullwidth d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <ul class="top-menu">
                            <li><a href=""><i class="icon-mail"> </i> orders@mysleepingtabs.com</a></li>
                        </ul>
                    </div>
                   <div class="col-md-3">
                   
                       <div class="p-dropdown float-right">
                            <a href="<?php echo base_url('user/my_acount');?>" class="btn-shadow btn-round"><i class="fa fa-user-alt"></i>
                                <?php
                                    if(isset($_SESSION['data']['customer'])){

                                        echo ucfirst($_SESSION['data']['customer']['cus_fname']); 
                                    }else{
                                        echo "Login";
                                    }
                                ?>
                            </a>
                               
                                <?php
                                    if(isset($_SESSION['data']['customer'])){
                                        
                                        ?>
                                            <div class="p-dropdown-content">
                                                <div class="widget-myaccount">
                                                    <ul class="text-center">
                                                        
                                                        <li><a href="<?php echo base_url('user/my_acount')?>"><i class="icon-log-out"></i>My Acount</a></li>
                                                        <li><a href="<?php echo base_url('shop/logout')?>"><i class="icon-log-out"></i>Sign out</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                ?>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
           
        <!-- end: Topbar -->
       <!-- Header -->
        <header id="header" class="header-disable-fixed">
            <div class="header-inner">
                <div class="container mainHeader">
                    <!--Logo-->
                    <div id="logo">
                         <a href="<?php echo base_url()?>">
                            <span class="logo-default"><img alt="" src="<?php echo base_url('asset/images/mstlogo.png');?>"></span>
                            <span class="logo-dark"><img alt="" src="<?php echo base_url('asset/images/mstlogo.png')?>"></span>
                        </a>
                    </div>
                    <!--End: Logo-->
                    <div class="header-extras">
                         <div class="whatsappNumber">
                            <span>
                                <b>Proudly supplying UK to UK </b><img src="<?php echo base_url().'asset/images/rcRfow.svg'?>" alt="UK flag">
                            </span>
                          

                            <a target="_blank" class="mobile_hide" href="https://web.whatsapp.com/send?phone=+447563084792&amp;text="><img src="<?php echo base_url().'asset/images/whatsapp-icon.svg'?>" alt="WhatsApp chat"> +44 7563 084792</a>

                            <a target="_blank" class="desktop_hide" href="https://api.whatsapp.com/send?phone=447563084792"><img src="<?php echo base_url().'asset/images/whatsapp-icon.svg'?>" alt="WhatsApp chat"> +44 7563 084792</a>
                         </div>
                         <div class="d-sm-block float-right">
                        <div class="p-dropdown float-right">
                            <a class="btn btn-light btn-shadow btn-round" href="<?php echo base_url('shop/cart')?>">
                                <i class="icon-shopping-cart"></i>
                                <span class="badge badge-pill badge-danger"><?php echo $this->cart->total_items();?></span>
                            </a>
                            <?php
                            if($this->cart->total_items()>0){
                                ?>
                                    
                                    <div class="p-dropdown-content">
                                        <div class="widget-mycart">
                                            <h4><a href="<?php echo base_url('shop/cart');?>">My Cart</a></h4>
                                            <?php

                                                $items=$this->cart->contents();
                                                
                                                foreach ($items as $key => $item) {
                                                    ?>
                                                        <div class="cart-item">
                                                            <div class="cart-image"> <a href="#"><img src="<?php echo base_url().'asset/images/product/'.$item[image];?>"></a></div>
                                                            <div class="cart-product-meta">
                                                                <a href="#"><?php echo $item['name']." x ".$item['num'];?></a>
                                                                <span><?php echo $item['qty'].' x '.$item['price'];?></span>
                                                            </div>
                                                           
                                                        </div>            
                                                    <?php
                                                }
                                            ?>
                                         
                                           
                                            <hr>
                                            <div class="cart-total">
                                                <div class="cart-total-labels">
                                                    <span>Subtotal</span>
                                                    <span>Taxes</span>
                                                    <span><strong>Total</strong></span>
                                                </div>
                                                <div class="cart-total-prices">
                                                    <span><?php echo $this->cart->total();?></span>
                                                    <span>0.00</span>
                                                    <span><strong><?php echo $this->cart->total();?></strong></span>
                                                </div>
                                            </div>
                                            <div class="cart-buttons text-right">
                                                <a href="<?php echo base_url('shop/checkout');?>" class="btn btn-xs" >Checkout</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                
                                <?php
                            }
                        ?>
                        </div>
                    </div>
                    </div>
                    
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                </div>
                <!--Navigation-->
                    <div id="mainMenu" class="mainMenuWrap">
                        <div class="container">
                             <nav>
                                <ul>
                                   <!-- <li class="dropdown"><a href="single-product.html">Buy Valium 10mg Roche</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo base_url('shop/product_details')?>">Buy Bulk Valium</a> </li>

                                        </ul>
                                    </li>-->
                                    <?php
                                        foreach ($_SESSION['data']['links'] as $key => $cat) {

                                            if(isset($cat['products'])){
                                                foreach ($cat['products'] as $key => $link) {
                                                  
                                                    if($link['pro_d_link']==1){
                                                       
                                                        $arr     =explode(" ",$link['pro_link']);
                                                        $p_title =strtolower(implode("-",$arr));

                                                        if($link['pro_is_brand']==1){

                                                            if($link['pro_id']==1){
                                                                ?>
                                                                    <li class="dropdown"><a href='<?php echo base_url('buy-valium-online/')?>'>Buy Valium 10mg Roche</a>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href='<?php echo base_url("product/$p_title/")?>'><?php echo $link['pro_full_name'];?></a></li>
                                                                        </ul>
                                                                    </li>
                                                                <?php
                                                            }
                                                            else
                                                            {


                                                                ?>
                                                                    <li><a href='<?php echo base_url("product/$p_title/")?>'><?php echo $link['pro_full_name'];?></a></li>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {

                                                            ?>
                                                                <li><a href='<?php echo base_url("product/$p_title/")?>'><?php echo ucwords($link['pro_name']);?></a></li>
                                                            <?php   
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    ?>
                                    <?php

                                        foreach ($_SESSION['data']['links'] as $key => $category) {
                                            $arr     =explode(" ",$category['cat_name']);
                                            $c_title =strtolower(implode("-",$arr));

                                            ?>
                                                <li class="dropdown"><a href='<?php echo base_url("product-category/$c_title/")?>'><?php echo $category['cat_name'];?></a>
                                                    <?php
                                                            if(isset($category['products'])){
                                                              
                                                                ?>
                                                                    <ul class="dropdown-menu">
                                                                        <?php
                                                                            foreach ($category['products'] as $key => $pro) {
                                                                                $arr     =explode(" ",$pro['pro_name']);
                                                                                $p_title =strtolower(implode("-",$arr));
                                                                                $link=$pro['pro_link']
                                                                                ?>
                                                                        
                                                                                    <li><a href='<?php echo base_url("product/$link/") ;?>'><?php echo ucwords($pro['pro_name']);?></a></li>
                                                                        
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                    </ul>
                                                                <?php
                                                                
                                                            }
                                                        ?>
                                                </li>
                                            <?php
                                        }
                                    ?>
                             
                                    <li><a href="<?php echo base_url('buy-bitcoin-with-credit-card/')?>">Buy Bitcoin</a></li>
                                    <li><a href="<?php echo base_url('blog/')?>">Blog</a></li>
                                    <li><a href="<?php echo base_url('contact-us/')?>">Contact Us</a></li>


                                    <?php

                                        if(isset($_SESSION['data']['customer'])){
                                            ?>
                                                <li class="d-lg-none d-sm-block"><a href="<?php echo base_url('user/my_acount')?>">My Acount</a></li>
                                                
                                                <li class="d-lg-none d-sm-block"><a href="<?php echo base_url('shop/logout')?>">Sign Out</a></li>
                                            <?php
                                        }else{

                                           ?>
                                                <li class="d-lg-none d-sm-block"><a href="<?php echo base_url('login/')?>">Login</a></li>
                                           <?php 
                                        }
                                    ?>
                                    
                                  
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--END: NAVIGATION-->
                
            </div>
        </header>
        <!-- end: Header -->
		
		