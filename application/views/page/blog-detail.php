<?php 
	
	require_once('header.php');
?>
	
<section id="page-content" class="sidebar-right">
    <div class="container">
       <!-- <div class="breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a> </li>
                    <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
                    <li class="breadcrumb-item active"><a href="#">Standard post</a></li>
                </ol>
            </nav>
        </div>-->
            
        <div class="row">
            <div class="content">
                <div id="blog" class="single-post">
                    <div class="post-item">
                        <div class="post-item-wrap">
                            <div class="post-item-description">
                                <h1><?php echo $post[0]['name'];?></h1>
                                <div class="post-meta">
                                    <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?php echo date('d M, y',$post[0]['create_on']); ?></span>
                                    <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>Admin</a></span>
                                    <span class="post-meta-category"><a href=""><i class="fa fa-tag"></i><?php echo $post[0]['cat_name'];?></a></span>
                                </div>
                                <p><?php echo $post[0]['short_des'];?></p>
                                            
                                <?php echo $post[0]['long_des']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
	
	require_once('footer.php');
?>
</body>

</html>