<?php 
	
	require_once('header.php');
?>
	 <!-- Content -->
        <section id="page-content">
            <div class="container">
               <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
                   
                    <?php

                        foreach ($posts as $key => $post) {
                            
                                $name= explode(' ', $post['name']);
                                
                                 $name= implode('-', $name);
                            ?>
                                <div class="post-item border">
                                    <div class="post-item-wrap">
                                        <!--<div class="post-image">
                                            <a href='<?php echo base_url(strtolower($name).'/')?>'>
                                                <img alt="" src="<?php echo base_url().'asset/images/'.$post[image];?>">
                                            </a>
                                        </div>-->
                                        <div class="post-item-description">
                                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?php echo date('d M, y',$post['create_on']); ?></span>
                                            <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>Admin</a></span>
                                            <h2><a href="<?php echo base_url(strtolower($name).'/')?>"><?php echo ucwords($post['name'])?>
                                                </a></h2>
                                            <p><?php echo substr($post['long_des'], 0, 300); ?></p>
                                            <a href="<?php echo base_url(strtolower($name).'/')?>" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    <!-- end: Post item-->
                    
                </div>
                 <?php echo $this->pagination->create_links();?>
                <!-- end: Blog -->
                <!-- Pagination -->
                <!--<ul class="pagination">
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
            <!-- end: post content -->
        </section> <!-- end: Content -->
        
<?php 
	
	require_once('footer.php');
?>