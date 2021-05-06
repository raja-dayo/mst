<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] 		= 'Shop';
$route['page/(:any)'] 				= 'Shop/page/$1';
$route['about-us'] 					= 'Shop/about_us'; 
$route['faqs'] 						= 'Shop/faqs'; 
$route['ban']						='shop/banPage';
$route['447563084792']				='login/admin_login';
$route['forgot_password'] 			= 'Shop/forgot_password';
$route['password_reset'] 			= 'Shop/password_reset';
$route['create/new_password']		='Shop/create_password';
$route['reviews']                  ='Shop/review';
$route['write-review']              ='Shop/write_review';
$route['blog'] 						= 'Shop/blog';
$route['blog/(:num)'] 				= 'Shop/blog/$1';
$route['contact-us'] 				= 'Shop/contact_us';
$route['store']						='Shop/store';
$route['checkout']					='Shop/checkout';
$route['my-acount']					='User/my_acount';
$route['login']						='shop/login';
$route['buy-bitcoin-with-credit-card']	='Shop/bitcoin';
$route['terms-conditions']			='Shop/terms_conditions';
//$route['success/:id']				='Shop/success';
$route['product-category/(:any)']	='Shop/category/$1';
$route['product/(:any)']		 	= "shop/product_details/$1";
$route['buy-valium-online'] 		= 'Shop/buy_valium_online'; 
$route['blog/(:any)']				="Shop/blog_details/$1";


/*$route['privacy-policy']		= 'Shop/privacy_policy';
$route['terms-conditions']		= 'Shop/terms_conditions';
$route['refund-policy']			= 'Shop/refund_policy';*/




$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;
