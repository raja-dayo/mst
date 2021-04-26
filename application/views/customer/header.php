<?php
    
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <title><?php echo $meta_data[0]['title'];?></title>
    <meta name="title" content="<?php echo $meta_data[0]['title'];?>">
    <meta name="description" content="<?php echo $meta_data[0]['description'];?>">
    <meta name="keywords" content="<?php echo $meta_data[0]['keywords'];?>">
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

                                            echo $_SESSION['data']['customer']['cus_fname']; 
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
                                         
                                           <!-- <li><a href="#"><i class="icon-clock"></i>Activity logs</a></li>
                                            <li><a href="#"><i class="icon-mail"></i>Messages</a></li>
                                            <li><a href="#"><i class="icon-settings"></i>Settings</a></li>
                                            <li><a href="#"><i class="icon-log-out"></i>Sing Out</a>
                                            </li>-->           
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
           
        <!-- end: Topbar -->
       <!-- Header -->
        <header id="header" data-fullwidth="true">
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
                                                            <div class="cart-image"> <a href="#"><img src="<?php echo base_url().'asset/images/'.$item[image];?>"></a></div>
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
                                                                    <li><a href='<?php echo base_url('buy-valium-online/')?>'>Buy Valium 10mg Roche</a>
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
                                                <li><a href='<?php echo base_url("shop-by-category/$c_title/")?>'><?php echo $category['cat_name'];?></a>
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
                             
                                    <li><a href="<?php echo base_url('bitcoin/')?>">Buy Bitcoin</a></li>
                                    <li><a href="<?php echo base_url('blog/')?>">Blog</a></li>
                                    <li><a href="<?php echo base_url('contact-us/')?>">Contact Us</a></li>
                                    <li class="d-lg-none d-sm-block"><a href="<?php echo base_url('user/my_acount')?>">My Acount</a></li> 
                                    <li class="d-lg-none d-sm-block"><a href="<?php echo base_url('shop/logout')?>">Sign Out</a></li>
                                  
                                  
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--END: NAVIGATION-->
                
            </div>
        </header>
        <!-- end: Header -->
        
        