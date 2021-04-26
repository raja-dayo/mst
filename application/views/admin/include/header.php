<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/vanta/template/demo/Emerald/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jan 2020 20:05:08 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?php echo base_url('asset/images/favicon.png')?>">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MST Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?php echo base_url()."admin_assets/vendors/ti-icons/css/themify-icons.css"?>">
  <link rel="stylesheet" href="<?php echo base_url()."admin_assets/vendors/css/vendor.bundle.base.css"?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/summernote/dist/summernote-bs4.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/quill/quill.snow.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/simplemde/simplemde.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url()."admin_assets/css/layout/style.css"?>">
  <!-- endinject -->
  
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/select2/select2.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css'?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->









  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/font-awesome/css/font-awesome.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-bar-rating/bars-1to10.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-bar-rating/bars-horizontal.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-bar-rating/bars-movie.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-bar-rating/bars-pill.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-bar-rating/bars-reversed.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-bar-rating/bars-square.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-bar-rating/bootstrap-stars.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-bar-rating/css-stars.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-bar-rating/examples.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-bar-rating/fontawesome-stars-o.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-bar-rating/fontawesome-stars.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-asColorPicker/css/asColorPicker.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/x-editable/bootstrap-editable.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/dropify/dropify.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-file-upload/uploadfile.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/jquery-tags-input/jquery.tagsinput.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/vendors/dropzone/dropzone.css'?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url().'admin_assets/css/layout/style.css'?>">
  <!-- endinject -->
  


</head>
<body>
  <div class="container-scroller" >
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar" id="sidebar">
      <div class="sidebar-content-wrapper sidebar-offcanvas">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("admin/dashboard")?>">
              <i class="ti-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#orders" aria-expanded="false" aria-controls="orders">
              <i class="ti-archive menu-icon"></i>
              <span class="menu-title">Orders</span>
              <i class="ti-angle-down menu-arrow"></i>
            </a>
            <div class="collapse" id="orders">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/newOrders');?>">Order List</a></li>
                <!--<li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/order_list');?>">Order List</a></li>-->
              </ul>
            </div>
          </li> 
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
              <i class="ti-archive menu-icon"></i>
              <span class="menu-title">Products</span>
              <i class="ti-angle-down menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/add_product_page');?>">Add New</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/products_list');?>">All Products</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="categories">
              <i class="ti-archive menu-icon"></i>
              <span class="menu-title">Categoreis</span>
              <i class="ti-angle-down menu-arrow"></i>
            </a>
            <div class="collapse" id="categories">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/add_category_page')?>">Add New</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/cotegory_list')?>">All Categories</a></li>
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#posts" aria-expanded="false" aria-controls="post">
              <i class="ti-archive menu-icon"></i>
              <span class="menu-title">Posts</span>
              <i class="ti-angle-down menu-arrow"></i>
            </a>
            <div class="collapse" id="posts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/add_post_page')?>">Add New</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/all_posts')?>">All Posts</a></li>
              </ul>
            </div>
          </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#customers" aria-expanded="false" aria-controls="orders">
              <i class="ti-archive menu-icon"></i>
              <span class="menu-title">Cutomers</span>
              <i class="ti-angle-down menu-arrow"></i>
            </a>
            <div class="collapse" id="customers">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/customer_list');?>">Our Customers</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url().'admin/users';?>">Manage</a></li>
              </ul>
            </div>
          </li> 

          <!--<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#banner" aria-expanded="false" aria-controls="banner">
              <i class="ti-archive menu-icon"></i>
              <span class="menu-title">Manage Banner</span>
              <i class="ti-angle-down menu-arrow"></i>
            </a>
            <div class="collapse" id="banner">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/add_banner');?>">Add Banner</a></li>
              </ul>
            </div>

          </li> -->
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#meta-data" aria-expanded="false" aria-controls="meta-data">
              <i class="ti-archive menu-icon"></i>
              <span class="menu-title">Meta Data</span>
              <i class="ti-angle-down menu-arrow"></i>
            </a>
            <div class="collapse" id="meta-data">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/add_meta_tag');?>">Add Meta Tag</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/tagList')?>">All Meta Tags</a></li>
              </ul>
            </div>
            
          </li> 


           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page" aria-expanded="false" aria-controls="page">
              <i class="ti-archive menu-icon"></i>
              <span class="menu-title">Pages</span>
              <i class="ti-angle-down menu-arrow"></i>
            </a>
            <div class="collapse" id="page">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/new_page');?>">New Page</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/manage_page');?>">Manage</a></li>
                <?php

                  /*foreach ($_SESSION['data']['pages'] as $key => $page) {
                    ?>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url("$page[page_url]")?>"><?php echo ucwords($page['page_name'])?></a></li>
                    <?php
                  }*/
                ?>
                
              </ul>
            </div>
            
          </li> 
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bank-data" aria-expanded="false" aria-controls="bank-data">
              <i class="ti-archive menu-icon"></i>
              <span class="menu-title">Manage Banks</span>
              <i class="ti-angle-down menu-arrow"></i>
            </a>
            <div class="collapse" id="bank-data">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/add_bank');?>">New Bank</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/manage_bank');?>">All Bank</a></li>
              </ul>
            </div>
            
          </li> 
          <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/strips_loose');?>">Strips Or Loose</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/data_view');?>">Data Export</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/view_currency');?>">Currency Rate</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/review');?>">Reviews</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/cart_abandon');?>">Cart Abandon</a></li>

        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper settings-success">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles success"></div>
          </div> 
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_navbar.html --> 
      <nav class="navbar p-0 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="ti-align-left"></span>
          </button>
          <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="" style="color: white;">My Sleeping Tab Admin</a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url().'admin_assets/images/logo-mini.svg'?>" alt="logo"/></a>
          </div>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item nav-search d-none d-sm-flex">
              <div class="nav-link d-flex justify-content-center align-items-center">
                <input type="text" class="form-control hidden" id="search-field" placeholder="Search...">
                <i class="ti-search mx-0" id="search-icon"></i>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                <i class="ti-comment mx-0"></i>
                <span class="count"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                      <img src="<?php echo base_url().'admin_assets/images/faces/face4.jpg'?>" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                    </h6>
                    <p class="font-weight-light small-text text-muted mb-0">
                      The meeting is cancelled
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                      <img src="<?php echo base_url().'admin_assets/images/faces/face2.jpg'?>" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                    </h6>
                    <p class="font-weight-light small-text text-muted mb-0">
                      New product launch
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                      <img src="<?php echo base_url().'admin_assets/images/faces/face3.jpg'?>" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                    </h6>
                    <p class="font-weight-light small-text text-muted mb-0">
                      Upcoming board meeting
                    </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="ti-bell mx-0"></i>
                <span class="count"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-gradient-success">
                      <i class="ti-info mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Application Error</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      Just now
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-gradient-warning">
                      <i class="ti-settings mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      Private message
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-gradient-info">
                      <i class="ti-user mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      2 days ago
                    </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="<?php echo base_url().'admin_assets/images/faces/face8.jpg'?>" alt="profile"/>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a href="<?php echo base_url();?>"  target="_blank" class="dropdown-item">
                  <i class="ti-settings text-primary"></i>
                  Shop
                </a>
                <a href="<?php echo base_url('login/logout');?>" class="dropdown-item">
                  <i class="ti-new-window text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="ti-menu"></span>
          </button>
        </div>
      </nav> 
      <div class="main-panel">