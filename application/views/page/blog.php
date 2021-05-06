<?php 
	
	require_once('header.php');
?>
	
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
                                            <h2><a href="<?php echo base_url()."blog/$name/"?>"><?php echo ucwords($post['name'])?>
                                                </a></h2>
                                            <?php echo substr($post['long_des'], 0, 300); ?>
                                            <a href="<?php echo base_url()."blog/$name/"?>" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php

                        }
                    ?>
                    <!-- end: Post item-->
                    
                </div>
                 <?php echo $this->pagination->create_links();?>
                
            </div>
            <!-- end: post content -->
        </section> <!-- end: Content -->
        
<?php 
	
	require_once('footer.php');
?>
</body>

</html>