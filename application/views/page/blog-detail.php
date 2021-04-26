<?php 
	
	require_once('header.php');
?>
	  <!-- Page Content -->
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
                    <!-- content -->
                    <div class="content">
                        <!-- Blog -->
                        <div id="blog" class="single-post">
                            <!-- Post item-->
                            <div class="post-item">
                                <div class="post-item-wrap">
                                    <!--<div class="post-image">
                                        <a href="#">
                                            <img alt="" src="<?php //echo base_url().'asset/images/'.$post[0][image]?>">
                                        </a>
                                    </div>-->
                                    <div class="post-item-description">
                                        <h1><?php echo $post[0]['name'];?></h1>
                                        <div class="post-meta">
                                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?php echo date('d M, y',$post[0]['create_on']); ?></span>
                                            <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>Admin</a></span>
                                            <span class="post-meta-category"><a href=""><i class="fa fa-tag"></i><?php echo $post[0]['cat_name'];?></a></span>
                                        </div>
                                        <p><?php echo $post[0]['short_des'];?></p>
                                        <!--<div class="blockquote">
                                            <p>The world is a dangerous place to live; not because of the people who are evil, but because of the people who don't do anything about it.</p>
                                            <small>by <cite>Albert Einstein</cite></small>
                                        </div>-->
                                        <p><?php echo $post[0]['long_des']; ?></p>
                                        <img src="<?php //echo base_url().'asset/images/'.$post[0]['image']?>">
                                    </div>
                                    <div class="post-tags">
                                       <!-- <a href="#">Life</a>
                                        <a href="#">Sport</a>
                                        <a href="#">Tech</a>
                                        <a href="#">Travel<?php //echo $post[0]['image'];?></a>-->
                                    </div>
                                    <!--<div class="comments" id="comments">
                                        <div class="comment_number">
                                            Comments <span>(2)</span>
                                        </div>
                                        <div class="comment-list">
                                            Comment 
                                            <div class="comment" id="comment-1">
                                                <div class="image"><img alt="" src="images/blog/author.jpg" class="avatar"></div>
                                                <div class="text">
                                                    <h5 class="name">John Doe</h5>
                                                    <span class="comment_date">Posted at 15:32h, 06 December</span>
                                                    <a class="comment-reply-link" href="#">Reply</a>
                                                    <div class="text_holder">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                    </div>
                                                </div>
                                                
                                                
                                             
                                            </div>-->
                                            <!-- end: Comment -->
                                            <!-- Comment -->
                                           <!-- <div class="comment" id="comment-2">
                                                <div class="image"><img alt="" src="images/blog/author2.jpg" class="avatar"></div>
                                                <div class="text">
                                                    <h5 class="name">John Doe</h5>
                                                    <span class="comment_date">Posted at 15:32h, 06 December</span>
                                                    <a class="comment-reply-link" href="#">Reply</a>
                                                    <div class="text_holder">
                                                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <!-- end: Comment -->
                                        </div>
                                    </div>
                                    <!--<div class="respond-form" id="respond">
                                        <div class="respond-comment">
                                            Leave a <span>Comment</span></div>
                                        <form class="form-gray-fields">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="upper" for="name">Name</label>
                                                        <input class="form-control required" name="senderName" placeholder="Enter name" id="name" aria-required="true" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="upper" for="email">Email</label>
                                                        <input class="form-control required email" name="senderEmail" placeholder="Enter email" id="email" aria-required="true" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="upper" for="website">Website</label>
                                                        <input class="form-control website" name="senderWebsite" placeholder="Enter Website" id="website" aria-required="false" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="upper" for="comment">Your comment</label>
                                                        <textarea class="form-control required" name="comment" rows="9" placeholder="Enter comment" id="comment" aria-required="true"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group text-center">
                                                        <button class="btn btn-primary" type="submit">Submit Comment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <!-- end: Post item-->
                    </div>
                    <!-- end: content -->
                </div>
            </div>
        </section>
        <!-- end: Page Content -->
        
<?php 
	
	require_once('footer.php');
?>