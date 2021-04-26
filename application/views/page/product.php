<?php
	
	require_once('header.php');
?>
        <style type="text/css">
            .sbt{
                   background-color: #ff423d;
    border-color: #ff423d;
    border-radius: 5px 5px 5px 5px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .5px;
    text-decoration: none;
    text-transform: uppercase;
    color: #fff !important;
    padding: 8px 15px;
    display: inline-block;
        </style>
        <!-- SHOP PRODUCT PAGE -->
          <div class="loadingPopUp" style="display: none;" id="lod">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
        <?php

            if($product[0]['pro_is_brand']==0){
                
                ?>
                    <section id="product-page" class="product-page py-2">
                        <div class="container">
                            <!--<div class="breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li><a href="#"><i class="fa fa-home"></i></a> </li>
                                        <li class="breadcrumb-item"><a href="#">Portfolio</a></li>
                                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                                    </ol>
                                </nav>
                            </div>-->
                            <div class="m-t-20">
                                
                                    <h1 class='main-heading'><?php echo ucwords($product[0]['pro_full_name']);?></h1>
                                
                                
                                <p><?php echo $product[0]['pro_short_des'];?></p>
                            </div>
                            
                            <div class="product">
                            
                            <div class="row m-b-80">
                            
                                <div class="col-md-5">
                                    <div class="prodct_bx">
                                        <?php $img = $product[0]['pro_image']; ?>
                                    <img src='<?php echo base_url("asset/images/product/$img")?>' alt="<?php echo ucwords($product[0]['pro_full_name']);?>" title="<?php echo ucwords($product[0]['pro_full_name']);?>">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Tablets</th>
                                                <th>Per Tablet</th>
                                                <th>Total Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                echo "<pre>";
                                                print_r($prices);
                                                echo "</pre>";
                                                if($prices[0]['pro_id']==14){
                                                   

                                                   ?>
                                                        <tr>
                                                            <td><?php echo $prices[3]['p_qun']?></td>
                                            
                                                             <td>
                                                                <?php 
                                                                    echo $_SESSION['sign'].round(($prices[3]['p_price']/$prices[3]['p_qun'])*$_SESSION['rate'],2);
                                                                ?>
                                                                    
                                                            </td>
                                                            <td><b><?php echo $_SESSION['sign'].number_format($prices[3]['p_price']*$_SESSION['rate'])?></b></td>
                                                            <td>
                                                                <form method="POST" action="<?php echo base_url('shop/add_cart');?>">
                                                                    <button name="pro" class="sbt" <?php if ($product[0]['pro_status']=='0'){ ?> disabled <?php   } ?>  value="<?php echo $prices[3]['pp_id']?>">  <?php echo ($product[0]['pro_status']=='1') ? 'BUY NOW':'Out Of Stock'?></button>

                                                                </form>
                                                                
                                                            </td>
                                                        </tr>
                                                   <?php 
                                                }

                                                if($prices[0]['pro_id']==14){

                                                    unset($prices[3]);
                                                }
                                                foreach ($prices as $key => $price) {
                                                    
                                                    ?>
                                                        <tr>
                                                        <td><?php echo $price['p_qun']?></td>
                                                        <!--<td><?php //echo '£'.round($price['p_price']/$price['p_qun'],2);?></td>-->
                                                        <!--<td><b><?php //echo '£'.$price['p_price']?></b></td>-->
                                                         <td>
                                                            <?php 
                                                                echo $_SESSION['sign'].round(($price['p_price']/$price['p_qun'])*$_SESSION['rate'],2);
                                                            ?>
                                                                
                                                        </td>
                                                        <td><b><?php echo $_SESSION['sign'].number_format($price['p_price']*$_SESSION['rate'])?></b></td>
                                                        <td>
                                                            <form method="POST" action="<?php echo base_url('shop/add_cart');?>">
                                                                <button name="pro" class="sbt" <?php if ($product[0]['pro_status']=='0'){ ?> disabled <?php   } ?>  value="<?php echo $price['pp_id']?>">  <?php echo ($product[0]['pro_status']=='1') ? 'BUY NOW':'Out Of Stock'?></button>

                                                            </form>
                                                            
                                                        </td>
                                                        </tr>
                                                    <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                                <!-- Product additional tabs -->
                                <div class="tabs tabs-folder">
                                    <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="false"><i class="fa fa-align-justify"></i>Description</a></a>
                                        </li>
                                        <!--<li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="true"><i class="fa fa-info"></i>Additional
                                                Info</a></a>
                                        </li>-->
                                        <!--<li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-star"></i>Reviews</a></a>
                                        </li>-->
                                    </ul>
                                    <div class="tab-content" id="myTabContent3">
                                        <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab">
                                            <p>
                                                <?php echo $product[0]['pro_long_des'];?>
                                            </p>
                                        </div>
                                        <!--<div class="tab-pane fade " id="profile3" role="tabpanel" aria-labelledby="profile-tab">
                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>Size</td>
                                                        <td>Small, Medium &amp; Large</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Color</td>
                                                        <td>Pink &amp; White</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Waist</td>
                                                        <td>26 cm</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Length</td>
                                                        <td>40 cm</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Chest</td>
                                                        <td>33 inches</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fabric</td>
                                                        <td>Cotton, Silk &amp; Synthetic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Warranty</td>
                                                        <td>3 Months</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>-->
                                        <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="comments" id="comments">
                                                <div class="comment_number">
                                                    
                                                </div>
                                                <!--<div class="comment-list">
                                                    
                                                    <div class="comment" id="comment-1">
                                                        <div class="image"><img alt="xyz" src="" class="avatar">
                                                        </div>
                                                        <div class="text">
                                                            <div class="product-rate">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </div>
                                                            <h5 class="name">John Doe</h5>
                                                            <span class="comment_date">Posted at 15:32h, 06 December</span>
                                                            <a class="comment-reply-link" href="#">Reply</a>
                                                            <div class="text_holder">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                                    industry. Lorem Ipsum has been the industry's standard dummy
                                                                    text ever since the 1500s.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="comment" id="comment-1-1">
                                                        <div class="image"><img alt="xyz" src="" class="avatar">
                                                        </div>
                                                        <div class="text">
                                                            <div class="product-rate">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </div>
                                                            <h5 class="name">John Doe</h5>
                                                            <span class="comment_date">Posted at 15:32h, 06 December</span>
                                                            <a class="comment-reply-link" href="#">Reply</a>
                                                            <div class="text_holder">
                                                                <p>It is a long established fact that a reader will be distracted by
                                                                    the readable content.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="comment" id="comment-1-2">
                                                        <div class="image"><img alt="xyz" src="" class="avatar">
                                                        </div>
                                                        <div class="text">
                                                            <div class="product-rate">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </div>
                                                            <h5 class="name">John Doe</h5>
                                                            <span class="comment_date">Posted at 15:32h, 06 December</span>
                                                            <a class="comment-reply-link" href="#">Reply</a>
                                                            <div class="text_holder">
                                                                <p>There are many variations of passages of Lorem Ipsum available,
                                                                    but the majority have suffered alteration in some form, by
                                                                    injected humour.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Product additional tabs -->
                            </div>
                        </div>
                    </section>
                    <!-- end: SHOP PRODUCT PAGE -->
                <?php
            }
            else
            {
                ?>
                     <section id="product-page" class="product-page p-t-0 p-b-0">
                        <div class="container m-t-40">
                            <div class="m-t-20">
                                <h1 class='main-heading'><?php echo ucwords($product[0]['pro_full_name']);?></h1>
                                <p><?php echo $product[0]['pro_short_des']?></p>
                            </div>
                            <div class="product">
                                <div class="row m-b-40">
                                    <!--<div class="col-lg-5">
                                        <div class="product-image">
                                            <div class="carousel dots-inside dots-dark arrows-visible" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="2500" data-lightbox="gallery">
                                                <a href="images/shop/products/buy-valium-online.jpg" data-lightbox="image" title="Shop product image!">
                                                       <?php $img = $product[0]['pro_image']; ?>
                                                       
                                                    <img alt="Shop product image!" src='<?php echo base_url("asset/images/$img")?>'>
                                                </a>
                                                <a href="images/shop/products/buy-valium-online.jpg" data-lightbox="image" title="Shop product image!"><img alt="Shop product image!" src='<?php echo base_url("asset/images/$img")?>'>
                                                </a>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="col-lg-5 ProductGalleryWrap">                         
                                        <div class="ProductGallery">
                                            <div class="mySlides Slidefade">
                                                <img alt="Shop product image!" id="p_img" src='<?php echo base_url("asset/images/$img")?>'>
                                            </div>
                                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                        </div>
                                        <div style="text-align:center">
                                            <?php
                                                foreach ($brands as $key => $brand) {
                                                
                                                    if($brands[$key-1]["b_id"]!=$brand['b_id'])
                                                    {

                                                        ?>
                                                            <span class="Thumbnail"> <img id="<?php echo $brand[b_image]?>" class="slider" src="<?php echo base_url().'asset/images/'.$brand[b_image]?>" ></span> 
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6>Brands</h6>
                                                <ul class="product-size">
                                                    <?php
                                                        foreach ($brands as $key => $brand) {
                                                            
                                                            if($brands[$key-1]["b_id"]!=$brand['b_id'])
                                                            {

                                                                ?>
                                                                    <li>
                                                                        <label>
                                                                            <input type="radio" name="brand" img="<?php echo $brand['b_image'];?>" class="brand" value="<?php echo $brand['b_id'];?>">
                                                                            <span><?php echo strtoupper($brand['b_name']);?></span>
                                                                        </label>
                                                                    </li>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                       
                                                </ul>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <h6>Loose Or Strips</h6>
                                                <ul class="product-size" id="pc">
                                                    <?php
                                                        if(isset($packs[0]['pak_id'])){
                                                            ?>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" id="" class="pack" name="pack" value="<?php echo $packs[0][pak_id]?>">
                                                                        <span><?php echo strtoupper($packs[0]['pak_name']);?></span>
                                                                    </label>
                                                                </li>
                                                            <?php
                                                        }
                                                        if(isset($packs[1]['pak_id'])){
                                                            ?>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" id="" class="pack" name="pack" value="<?php echo $packs[1][pak_id];?>">
                                                                        <span><?php echo strtoupper($packs[1]['pak_name']);?></span>
                                                                    </label>
                                                                </li>
                                                            <?php
                                                        }
                                                    ?>  
                                                </ul>
                                            </div>
                                             <div class="col-lg-12" style="display: none;" id="tbl">
                                               <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Tablets</th>
                                                        <th>Per Tablet</th>
                                                        <th>Total Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ajax_price">
                                                    <?php
                                                        foreach ($product as $key => $pro) {
                                                            
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $pro['pro_qun'];?></td>
                                                                    <td><?php echo $_SESSION['sign'].round($pro['pro_pri']/$pro['pro_qun'],2);?></td>
                                                                    <td><b><?php echo $_SESSION['sign'].number_format($pro['pro_pri']*$_SESSION['rate']);?></b></td>
                                                                    <td><a href="checkout.html">Buy Now</a></td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>Anxiety disorders have been the most prevalent of all psychiatric illnesses. There is the various cause of anxiety-like genetic, environmental, medical, brain chemistry or due to withdrawal from an illegal substance. When anxiety occurs chemical chemistry of our brain is altered. Amount of GABA is decreased which can cause mood disorders. Serotonin is imbalanced in our brain which can lead to tiredness, extreme mood swings are most common in this condition. If we look at the history we will observe that anxiety was treated by general depressants like opium, alcohol</p>
                                <!-- Product additional tabs -->
                                <div class="tabs tabs-folder">
                                    <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="false"><i class="fa fa-align-justify"></i>Description</a></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent3">
                                        <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab">
                                            <h4>VALIUM- A PROTECTIVE SHIELD AGAINST ANXIETY</h4>
                                            <p>Anxiety disorders have been the most prevalent of all psychiatric illnesses. There is the various cause of anxiety-like genetic, environmental, medical, brain chemistry or due to withdrawal from an illegal substance. When anxiety occurs chemical chemistry of our brain is altered. Amount of GABA is decreased which can cause mood disorders. Serotonin is imbalanced in our brain which can lead to tiredness, extreme mood swings are most common in this condition. If we look at the history we will observe that anxiety was treated by general depressants like opium, alcohol, lithium bromide and chlorate hydrate. These medications had serious side-effects and were not strong enough to heal mental disorder like depression and anxiety. In 1960 pharmacotherapy was available for anxiety disorders. In 1960s anti-anxiety were made and were introduced in the market. Nowadays antianxiety pills are available online. You can buy Valium online UK.</p>
                                            <p><strong>HISTORY AND ORIGIN OF VALIUM:</strong></p>
                                            <p>Valium is the brand name for Diazepam. In 1954, Leo Sternbach, who is a pharmacist and chemist worked on a task to develop an alternative of barbiturates. After a few years, he created 40 new compounds. Diazepam was the second successful compound which was introduced in 1963 with the brand name for Valium. Between 1969 and 1982 this antianxiety became famous and was the most prescribed drug in the USA. This drug was a great success and healed depression and was better than barbiturates. Valium is available from online stores. You can buy diazepam online UK.</p>
                                            <p><strong>DEFINITION OF VALIUM DIAZEPAM:</strong></p>
                                            <p>Valium belongs to the class of benzodiazepine. Benzodiazepine acts directly on the central nervous system. It produces the calming effect on your body. Valium is used to treat anxiety, muscle spasms, depression, and seizures. Valium also reduces severe symptoms of alcohol withdrawal, behavioral disorders, and mood disorders. It also treats bipolar disorder. You can also buy Valium online.</p>
                                            <p><strong>VALIUM- NATURALLY HEALING PROCESS:</strong></p>
                                            <p>Since Valium belongs to the class of benzodiazepine- it acts directly on the central nervous system. Amount of GABA is balanced in our brain and it controls our mood swings and balances chemicals in our brain. You can buy Diazepam UK. Depression or anxiety occurred due to the decreased amount of GABA which then leads to an imbalance of chemicals. Amount of serotonin is imbalanced which leads to depression and anxiety. Valium binds with GABA and it enhances the amount of GABA. It calms our body and mind. Valium balances chemicals in our brain. It controls fight or flight response which is triggered even when it is not needed during anxiety. Due to its control of fight or flight response, patient heart rate is controlled.</p>
                                            <p><strong>THE RIGHT DOSAGE OF VALIUM:</strong></p>
                                            <p>Dosage: Dosage of Valium depends upon age, present and past medical condition, and how the body reacts towards it. Do not increase its dosage without doctor’s advice. Overdosage of Valium can lead to severe drowsiness, a problem in breathing, fainting, slow reflexes, and loss of consciousness. If you have accidentally missed its dosage then take it immediately. But if the time of next dosage has arrived then skip it. Take dosage on time and you can buy Diazepam online.<br>
                                            Withdrawal effect: Doses of Valium should not be skipped gradually. If it is skipped gradually without doctor’s advice then it can lead to increased heart rate, sweating, muscle spasm, tremors, abdominal pain, vomiting, irritability, anxiety, depression, seizures, headaches, and delirium.<br>
                                            Usage: Valium is taken by mouth and is present in the form of tablet and liquid. If one is taking in the form of tablet then take it with food or without food. If you feel difficulty in swallowing then swallow it with the form of little water. Do not crush it or chew it. Follow the instructions of the doctor before taking Valium and you can buy Diazepam online UK.<br>
                                            Storage: Valium should be kept away from children and pets. Store Valium at room temperature and away from light and moisture.</p>
                                            <p><strong>SIDE EFFECTS OF VALIUM:</strong></p>
                                            <p>Common side-effects: Valium has common side-effects are dizziness, drowsiness, tiredness, blurred vision, confusion, sleep disturbances, nightmares, skin reactions, and tiredness. In some cases, Valium suits patient and they don’t have serious side-effects. If you want anti-anxiety you can buy Valium online.<br>
                                            Serious side-effects: Valium serious side-effects are agitation, hallucinations, confusion, restlessness, minor depression, trouble speaking and walking, and weakness in muscles, the problem in urinating, pale eyes and skin and in rare cases fever and chills. Allergic reaction due to this drug is rare. An allergic reaction includes rash, itching, dizziness, hypotension, jaundice, insomnia, and problem in breathing. If these side-effects occur seek medical assistance.</p>
                                            <p><strong>WARNINGS AND PRECAUTIONARY MEASURES- ONE SHOULD NOT IGNORE:</strong></p>
                                            <p>Valium is not recommended to a patient who is addicted to drugs. Valium should not be taken with alcohol. It should be avoided if you are allergic to any of the chemicals present in Valium. Valium should be avoided if one is pregnant. It can lead to congenital malformations and other abnormalities due to benzodiazepine. A newborn can have neonatal flaccidity, respiratory and feeding problem and hypothermia. This can occur if Valium is taken regularly. Valium during pregnancy can lead to miscarriage. Valium used during labor and delivery can lead to heart rate, poor suckling and hypotonic. Moreover, it can lead to hypothermia and respiratory depression. The reason behind side-effect on a child is due to the enzymes which are not developed. Enzymes are unable to breakdown drug. Valium can be passed in the breast milk. Valium should not be given to children without a doctor’s prescription.</p>
                                            <p><strong>DRUG INTERACTIONS:</strong></p>
                                            <p>Drug interactions may change and can lead to serious side-effects. Before you buy Valium online make a list of drugs you use. Do not start or change the dosage of any medicines without doctor’s approval. Few drugs can interact with Valium like clozapine, fluvoxamine, orlistat, sodium oxybate. Drugs interactions can lead to breathing problem, drowsiness, severe dizziness. These symptoms can become severe if the dosage of any of these drugs is increased along with Valium. Inform your pharmacist if you use products like opioid pain, cough relievers like hydrocodone, etc. Do not use alcohol, marijuana, and other sleep or anxiety drugs like alprazolam, lorazepam, etc. Also, avoid the usage of muscle relaxing medicines like carisoprodol and cyclobenzaprine.</p>
                                        </div>
                                       
                                        <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="comments" id="comments">
                                                <div class="comment_number">
                                                    
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Product additional tabs -->
                            </div>
                        </div>
                    </section>
                <?php
            }
        ?>
     
        
<?php
	
	require_once('footer.php');
?>
<script type="text/javascript">
    $(document).ready(function(){

        var v_id    = 1;
        var brand   = 1;
        var pro_id  = 1;
        
        $.ajax({

            url:"<?php echo base_url('shop/getPack');?>",
            type:"POST",
            data:{brand, pro_id},
            success:function(response){

               $("#pc").html(response);
            }
        });

        jQuery('input:radio[name="brand"]').filter('[value="1"]').attr('checked', true);

        //jQuery('input:radio[name="pack"]').filter('[value="1"]').attr('checked', true);
        //alert(v_id);
       


        //$(".brand").prop("checked", true);
        $.ajax({
            url:"<?php echo base_url('shop/getPrice');?>",
            type:"POST",
            data:{v_id},
            success:function(responce){
                
                $("#tbl").css("display", "block");
                
                $("#ajax_price").html(responce);
                
                jQuery('input:radio[class="pack"]').filter('[value="1"]').attr('checked', true);
                
            },
        });


       $(".slider").click(function(){

            var img = $(this).attr("src");
        
            $("#p_img").attr("src", img);

            //$(".Thumbnail").addClass("active");
            //$("p:first").addClass("intro");
       })
       
       $(".brand").click(function(){

            var brand = $(this).val();
            
            if(brand==1)
            {
                var v_id =1;
               // var p    =3;
            }
            else if(brand==2)
            {
                var v_id =3;
               // var p   =4;
            }
            else if(brand==3)
            {
                var v_id =4;
                //var p   =1;
            }
            
            $("#tbl").css('display','none');
            
            $("#lod").css('display','block'); 
             
            var b_img =$(this).attr("img");

            
            var url="<?php echo base_url().'asset/images/'?>"+b_img
            
            $("#p_img").attr("src", url);

            var pro_id = "<?php echo $product[0]['pro_id'];?>"

            $.ajax({

                url:"<?php echo base_url('shop/getPack');?>",
                type:"POST",
                data:{brand, pro_id},
                success:function(response){

                   $("#pc").html(response);
                    jQuery('input:radio[class="pack"]').filter('[value = "'+v_id+'"]').attr('checked', true);
                    
                     setTimeout( function(){ 
                            $("#lod").css('display','none'); 
                          }  , 500 );
                }
            });
            
             if(brand==1)
            {
                var v_id =1;
               // var p    =3;
            }
            else if(brand==2)
            {
                var v_id =3;
               // var p   =4;
            }
            else if(brand==3)
            {
                var v_id =4;
                //var p   =1;
            }
           // alert('hi raja "'v_id'" ')
            $.ajax({
                url:"<?php echo base_url('shop/getPrice');?>",
                type:"POST",
                data:{v_id},
                success:function(responce){
                    
                    $("#tbl").css("display", "block");
                    $("#ajax_price").html(responce);
                   
                    
                },
            });
        });

        $(document).on("click", ".pack", function(event){
            
            $("#tbl").css("display", "block");
            var v_id = $(this).val();
            
            $.ajax({
                url:"<?php echo base_url('shop/getPrice');?>",
                type:"POST",
                data:{v_id},
                success:function(responce){
                    
                   $("#ajax_price").html(responce);
                    //alert(responce);
                },
            });
        });
    });
</script>