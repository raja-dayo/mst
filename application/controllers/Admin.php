<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin Extends Ci_controller{

		public function __construct(){
			
			parent::__construct();

			$this->load->helper('form');

			$this->load->model("AdminModel",'Admin');

			$this->load->model("ShopModel",'Shop');

			//$data['pages']=$this->Shop->all_pages();

			//$_SESSION['data']['pages']=$data['pages'];

			if(!isset($_SESSION['data']['admin'])){

				return redirect('login');
			}
			
			date_default_timezone_set("Asia/Kolkata");
			
		}

		public function index(){
			
			//echo "<pre>";
			//print_r($_SESSION['data']['pages']);
			//return redirect("shop",$data);	
		}

		public function dashboard(){

			//echo "<pre>";
			//print_r($_SESSION['data']['pages']);
			$this->load->view("admin/dashboard");
		}

		public function manage_page(){

			$data['pages']=$this->Shop->all_pages();
			
			$this->load->view('admin/pages',$data);
		}

		public function getPageData(){

			//echo $_REQUEST['page_id'];

			$result=$this->Admin->singlePageData($_REQUEST['page_id']);
			
			//echo "<pre>";
			//print_r($result[0]);

			echo json_encode($result[0]);
		}

		public function new_page(){

			$this->load->view('admin/create_page');
		} 
		public function add_banner(){

			$this->load->view("admin/banner_form");
		}

		public function add_meta_tag(){

			$this->load->view("admin/add_meta_tag");
		}

		public function add_meta_tag_process(){
			//echo "<pre>";
			//print_r($_REQUEST);

			//die;
			$result=$this->Admin->add_meta_tag($_REQUEST);
			
			if($result){

            	$this->session->set_flashdata('msg',"Meta Tag has been added successfully");
            	$this->session->set_flashdata('class',"success");
            	
            	return redirect('admin/add_meta_tag');
            }
            else
            {
            	$this->session->set_flashdata('msg',"Something wrong Meta Tag not added");
            	$this->session->set_flashdata('class',"danger");

            	return redirect('admin/add_meta_tag');
            }
            
		}
		public function upload_banner(){
			
			//echo "<pre>";
			//print_r($_FILES);
			//die;
			$config['upload_path']          = './asset';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 204800;
	        $config['max_width']            = 2800;
	        $config['max_height']           = 2400;  

	        $this->load->library('upload', $config);

            if ($this->upload->do_upload("img"))
            {
	            		
            	extract($_REQUEST);

                $data = array('upload_data' => $this->upload->data());

                $file_name= $data['upload_data']['file_name'];
                	
                $result=$this->Admin->add_banner_model($file_name);

                if($result){

                	$this->session->set_flashdata('msg',"Banner has been added successfully");
                	$this->session->set_flashdata('class',"success");
                	
                	return redirect('admin/add_banner');
                }
                else
                {
                	$this->session->set_flashdata('msg',"Something wrong banner Image not added");
                	$this->session->set_flashdata('class',"danger");

                	return redirect('admin/add_banner');
                }
	        }
	        else{
	            
	            $data=$this->upload->display_errors();
	            	
	          	$this->session->set_flashdata("msg",$data);
	          	$this->session->set_flashdata('class',"warning");
                	
                return redirect('admin/add_banner');       
	       }
		}
		public function add_category_page(){

			$this->load->view("admin/add_category");
		}

		public function insert_category(){
			
			$result=$this->Admin->add_category_model($_REQUEST['title']);
			
			if($result){

				$this->session->set_flashdata('msg','Category add successfully');
				$this->session->set_flashdata('class','success');

				return redirect('admin/cotegory_list');
			}
			else{
				
				$this->session->set_flashdata('msg','Something wrong Category not added');
				$this->session->set_flashdata('class','warning');

				return redirect('admin/add_category_page');
			}
		}

		public function cotegory_list(){

			$data['categories']=$this->Admin->category_list_model();

			$this->load->view("admin/category_list",$data);
		}

		public function category_action(){
			echo "<pre>";
			print_r($_REQUEST);
			if(isset($_REQUEST['cat_delete_id'])){

				$result=$this->Admin->dltCategory($_REQUEST['cat_delete_id']);
				if($result){

					
				$this->session->set_flashdata('msg','Category add successfully');
				$this->session->set_flashdata('class','success');

				return redirect('admin/cotegory_list');
	
				}
			}
		}

		public function add_product_page(){

			$data['categories']=$this->Admin->category_list_model();

			$data['brands']=$this->Admin->brand_list_model();

			$data['packs']=$this->Admin->pack_list_model();
			
			$this->load->view("admin/add_product",$data);
		}

		public function insert_product(){
			
			//echo "<pre>";
			//print_r($_POST);
			
			//$brand =$_POST['brand'];

			//$pack =$_POST['pack'];
			//die;
			for ($i=0; $i<count($_POST['qun']) ; $i++) { 
				
				$qun[] = explode('|', $_POST['qun'][$i]);
						
				$pri[] = explode('|', $_POST['ppp'][$i]);
			}
			
			$config['upload_path']          = './asset/images/product/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 204800;
	        $config['max_width']            = 2800;
	        $config['max_height']           = 2400;  

	        $this->load->library('upload', $config);

            if ($this->upload->do_upload("img"))
            {
	            

	            		
            	extract($_REQUEST);

            	//$url=explode(' ', $p_title);
				$url= strtolower($pro_link);

				//$url=explode(' ', $title);
				//$url=implode('-', $url);
				$data=array(

					'url'			=>$url,
					'title'			=>$meta_title,
					'keywords'		=>$keywords,
					'description'	=>$meta_des,
				);

				$this->Admin->add_meta_tag($data);

                $data = array('upload_data' => $this->upload->data());

                $file_name= $data['upload_data']['file_name'];
                	
                	
                $insert_id=$this->Admin->add_product_model($p_title, $full_name, $pro_link, $p_category_id, $file_name, $p_short_description, $p_long_description, $var);
                                                           

                	for ($i=0; $i<count($qun) ; $i++) { 
				
						$qunatity[] = explode('|', $qun[$i]);
								
						$price[] = explode('|', $ppp[$i]);
					}

                //echo "<pre>";
                //print_r($qunatity);
                //print_r($price);
                //die;

                if($insert_id){

                	if($var == 0){

                		
						$id=$this->Admin->add_pro_variation($insert_id, 0, 0);

						for ($i=0; $i<count($qunatity); $i++) { 
							
							for ($j=0; $j<count($qunatity[$i]); $j++) { 
								
								//echo $qunatity[$i]." ";

								
								$result=$this->Admin->addPri($id, $qunatity[$i][$j], $price[$i][$j]);
							}

						}


					}
					else
					{
						for ($i=0; $i<count($brand) ; $i++) { 
						
							$id=$this->Admin->add_pro_variation($insert_id, $brand[$i], $pack[$i]);

							for ($j=0; $j <count($qunatity[$i]); $j++) { 
									
								$result=$this->Admin->addPri($id, $qunatity[$i][$j], $price[$i][$j]);

							}

						}
					}
                	/*for ($i=0; $i <count($prices) ; $i++) { 
                		
                		$prices[$i]['pro_id']=$insert_id;

                		arsort($prices[$i]);
                		
                		$result=$this->Admin->addPriceModel($prices[$i]);
                	}*/
                	
                	if($result){
                			
            			$this->session->set_flashdata('msg',"Product has been added successfully");
            			
            			$this->session->set_flashdata('class',"success");
            	
            			return redirect('admin/products_list');
                	}
                	else{

            			$this->session->set_flashdata('msg',"Something wrong product not added");
            			
            			$this->session->set_flashdata('class',"danger");

            			return redirect('admin/add_product_page');
                	}               	
                }
                else
                {
                	$this->session->set_flashdata('msg',"Something wrong product not added");
                	$this->session->set_flashdata('class',"danger");

                	return redirect('admin/add_product_page');
                }
	        }
	        else{
	            
	            $data=$this->upload->display_errors();
	            	
	          	$this->session->set_flashdata("msg",$data);
	          	$this->session->set_flashdata('class',"warning");
                	
                return redirect('admin/add_product_page');
                
	        }
		}

		public function products_list(){

			$data['products']=$this->Admin->product_list_model();
			
			$this->load->view("admin/product_list",$data);
		}

		public function edit(){

			//echo $_REQUEST['id'];
			$data['product']	=$this->Admin->edit_product_model($_REQUEST['id']);
				
			$data['pro_prices']	=$this->Admin->get_product_price();
			
			$data['categories']=$this->Admin->category_list_model();

			$this->load->view("admin/product_edit_form",$data);
		}
		
		public function delete(){

			echo $_REQUEST['id'];
		}
		
		/*public function delete_price(){

			//echo $_REQUEST['id'];	

			$result=$this->Admin->deleteProPrice($_REQUEST['pp_id']);
			
			if($result){

				return redirect('');
			}
		}*/


		public function updateStatusProductPrice(){	

			$result=$this->Admin->updateProductPriceStatus($_REQUEST['id'], $_REQUEST['status']);
			
			if($result){

				echo $result;
				//return redirect('');
			}
		}
		public function update_price(){

			//echo $_REQUEST['id'];	
			//echo "<pre>";
			//print_r($_REQUEST);
			extract($_REQUEST);
			$result=$this->Admin->updateProductPrice($pp_id, $p_qun, $p_price);
			
			if($result){
				echo "sb sai aa";
			}else{

				echo "Something wrong";
			}
		}
		/*public function product_action(){

			//echo "yes";
			
			if(isset($_REQUEST['pro_edit_id'])){

				$data['product']	=$this->Admin->edit_product_model($_REQUEST['pro_edit_id']);
				
				$data['pro_prices']	=$this->Admin->get_product_price();
				
				$data['categories']=$this->Admin->category_list_model();

				$this->load->view("admin/product_edit_form",$data);
			}
			else if(isset($_REQUEST['pro_delete_id'])){

				echo "delete";
			}

		}*/

		public function update_product(){

			//echo "<pre>";
			//print_r($_REQUEST);
			//die;
			if($_FILES['img']['name']==""){

				//echo "empty image";
				//echo "<pre>";
				//print_r($_REQUEST);
				//die;
				extract($_REQUEST);
				$result=$this->Admin->update_product_model($title, $category, $file_name, $short_desc, $long_desc, $p_id);

	            if($result){

	                $this->session->set_flashdata('msg',"Product has been updated successfully");
	                $this->session->set_flashdata('class',"success");
	                	
	                return redirect('admin/edit?id='.$p_id);
	            }
	            else{
                	
                	$this->session->set_flashdata('msg',"Something wrong product not added");
                	
                	$this->session->set_flashdata('class',"danger");

                	return redirect('admin/product_edit_page');
	            }
			}
			else{

				$config['upload_path']          = './asset/images';
		        $config['allowed_types']        = 'gif|jpg|png|jpeg';
		        $config['max_size']             = 204800;
		        $config['max_width']            = 6000;
		        $config['max_height']           = 6000;  

		        $this->load->library('upload', $config);

	            if ($this->upload->do_upload("img"))
	            {
		            		
	            	extract($_REQUEST);

	                $data = array('upload_data' => $this->upload->data());

	                $file_name= $data['upload_data']['file_name'];
	                	
	                $result=$this->Admin->update_product_model($title, $category, $file_name, $short_desc, $long_desc, $p_id);

	                if($result){

	                	$this->session->set_flashdata('msg',"Product has been added successfully");
	                	$this->session->set_flashdata('class',"success");
	                	
	                	return redirect('admin/edit?id='.$p_id);
	                }
	                else
	                {
	                	$this->session->set_flashdata('msg',"Something wrong product not added");
	                	$this->session->set_flashdata('class',"danger");

	                	return redirect('admin/product_edit_page');
	                }
		        }
		        else{
		            
		            $data=$this->upload->display_errors();
		            	
		          	$this->session->set_flashdata("msg",$data);
		          	$this->session->set_flashdata('class',"warning");
	                	
	                echo $data;
	                //return redirect('admin/product_action');
	                
		        }
			}
		}

		public function add_post_page(){

			$data['categories']=$this->Admin->category_list_model();

			$this->load->view("admin/new_post_form",$data);
		}

		public function publish_post(){

			//echo "<pre>";
			//print_r($_REQUEST);
			//die;
			if($_FILES['img']['name']==""){

				if(isset($_REQUEST['cat'])){

					$category =implode(',', $_REQUEST['cat']);

				}
				else{
					$category='NULL';
				}
				
				$img='NULL';

				//echo "<pre>";
				//print_r($_REQUEST);
				
				//die;
				extract($_REQUEST);
					//echo $category." ".$title." ".$long_desc;
				$url=explode(' ', $title);
				$url= strtolower(implode('-', $url));
				//echo $url;
				//die;
				$mul_cat=implode(',', $cat);
				$result=$this->Admin->add_post_model($title, $long_desc, $img, $mul_cat);

				$url=explode(' ', $title);
				$url=implode('-', $url);
				$data=array(

					'url'			=>$url,
					'title'			=>$meta_title,
					'keywords'		=>$keywords,
					'description'	=>$meta_des,
				);

				$this->Admin->add_meta_tag($data);
				
				if($result){

					$this->session->set_flashdata('msg',"Post has been published successfully");
	                
	                $this->session->set_flashdata('class',"success");
	                	
	                return redirect('admin/add_post_page');
				}
				else{
					
					$this->session->set_flashdata("msg",'Something Wrong Post Not published');
		          		
		          	$this->session->set_flashdata('class',"warning");
	                	
	                return redirect('admin/add_post_page');
				}
			}
			else{

				$config['upload_path']          = './asset/images/blog';
		        $config['allowed_types']        = 'gif|jpg|png|jpeg';
		        $config['max_size']             = 204800;
		        $config['max_width']            = 6000;
		        $config['max_height']           = 6000;  

		        $this->load->library('upload', $config);

		      	if ($this->upload->do_upload("img")){
	        		
	        		if(isset($_REQUEST['cat'])){

						$category =implode(',', $_REQUEST['cat']);
					}
					else{
						$category='NULL';
					}

					$data = array('upload_data' => $this->upload->data());

	                $img= $data['upload_data']['file_name'];
					
					extract($_REQUEST);

					$mul_cat=implode(',', $cat);
					
					$result=$this->Admin->add_post_model($title, $excerpt, $long_desc, $img, $mul_cat, $tags);					
	        		
	        		if ($result) {
	        			
	        			$this->session->set_flashdata('msg',"Post has been published successfully");
	                
	                	$this->session->set_flashdata('class',"success");
	                	
	                	return redirect('admin/add_post_page');
	        		}
	        		else{

	        			echo "Something wrong";
	        		}
	        	}
	        	else{
	        		
	        		$data=$this->upload->display_errors();
	        			
	        		echo $data;
	        	}
			}	
		}

		public function edit_post(){

			$data['categories']=$this->Admin->category_list_model();
			
			$data['post']=$this->Admin->singlePost($_GET['id']);
			
			$this->load->view('admin/edit_post_form',$data);
		}

		public function update_post(){

			echo "<pre>";
			print_r($_REQUEST);

			$data=array(

				
			);
			$this->Admin->updatePost();
		}

		public function all_posts(){

			$data["posts"]=$this->Admin->get_posts();
			
			$this->load->view("admin/all_posts",$data);
		}

		public function newOrders(){

			
			$data['result']=$this->Admin->newOrderModel();
				
			$this->load->view("admin/new_orders",$data);
		}

		public function view_order(){
			
			$data['result']=$this->Admin->order_view($_REQUEST['od_id']);

			foreach ($data['result'] as $key => $od) {
				
				if($od['b_id']!=0 && $od['pak_id']!=0){

					//echo 'Brand '.$od['b_id']."  pack".$od['pak_id'];
					//echo "<br>";	
					$brands=$this->Shop->brand($od['b_id']);
					$packs=$this->Shop->pack($od['pak_id']);
					
					foreach ($brands as $brand) {
						
						$data['result'][$key]['b_name']=$brand['b_name'];						
					}

					foreach ($packs as $pack) {
						
						$data['result'][$key]['pack_name']=$pack['pak_name'];						
					}
				} 
			}
		
			$this->load->view("admin/order_view",$data);
		}

		public function customer_list(){

			$data['customers']=$this->Admin->custoemsModel();
			//echo "<pre>";
			//print_r($data['customers']);
			//die;	
			$this->load->view('admin/customerList',$data);
		}

		public function mysleepingtab(){
		
			$data['result']=$this->Admin->pageContent(basename($_SERVER['REQUEST_URI']));
			
			$this->load->view('admin/main_page',$data);
		}

		public function about_us(){
			$this->load->view('admin/about-us');
		}
		
		/*public function updatePageContent(){

				//echo "<pre>";
				//print_r($_REQUEST);		
				//die;
			$result=$this->Admin->updateContent($_REQUEST['id'],$_REQUEST['p_long_description']);
			
			if($result){

				return redirect('admin/diazepamuk');
			}	
		}*/
		
		public function add_bank(){
		    
		    
		    $this->load->view('admin/addBank');
		}
		public function insertBank(){

			$result=$this->Admin->addBankModel($_POST);
			
			//echo ($result)? 'inserted successfully' : "Something wrong";
			if($result){

				$this->session->set_flashdata('msg',"Bank Detail insert successfully");
                
                $this->session->set_flashdata('class',"success");

                return redirect('admin/manage_bank');
            }
            else
            {
            	$this->session->set_flashdata('msg',"Something wrong");
                
                $this->session->set_flashdata('class',"danger");
                 
                return redirect('admin/add_bank');
            }
		}
		public function manage_bank(){

			$data['banks']=$this->Admin->getBanks();
			
			$this->load->view('admin/all_banks',$data);
		}

        public function delete_bank(){
            
           $result=$this->Admin->deleteBankModel($_GET['id']);
			
			if($result){

				$this->session->set_flashdata('msg',"Bank Detail Delete successfully");
                
                $this->session->set_flashdata('class',"success");

                return redirect('admin/manage_bank');
            }
            else
            {
            	$this->session->set_flashdata('msg',"Something wrong");
                
                $this->session->set_flashdata('class',"danger");	
            }
        }
		public function updateBankStatus(){

			$result=$this->Admin->updateBankStatus($_REQUEST['id'], $_REQUEST['status']);
		
		}
		
		public function data_view(){

			$data['products']=$this->Admin->product_list_model();
			$this->load->view('admin/data_export',$data);
		}
		
		public function tagList()
		{
		    $data['tags']=$this->Admin->getMetaTagsList();
		    
		    $this->load->vieW('admin/meta_tag_list',$data);
		    
		}
		public function get_data(){

			$data['result']=$this->Admin->export_data($_REQUEST['to'],$_REQUEST['from']);
			
			foreach ($data['result'] as $key => $value) {
				
				if($value['pro_is_brand']==1)
				{
					$data['abc'][$key]['brands']=$this->Admin->get_brand_pack($value['pro_id']);
				}
			}
			$this->load->view('admin/data_export',$data);
		}
		public function updateProductStatus(){

			$result=$this->Admin->updateProductStatus($_REQUEST['id'], $_REQUEST['status']);
		
			if($result){

				echo 'Product updated successfully'; 
			}else{

				echo "no";
			}
		}
		
		public function editMeta(){
		    
		   // echo $_REQUEST['id'];
		    
		    $data['tag']=$this->Admin->mTag($_REQUEST['id']);
		
		    $this->load->view('admin/edit_meta_tag',$data);
		}
		
		public function update_mTag()
		{
		    //echo "<pre>";
		    //print_r($_REQUEST);
		    
		    extract($_REQUEST);
		    
		    $result=$this->Admin->updateMetaTag($t_id, $url, $title, $keywords, $description);
		    
		    if($result)
		    {
		        $this->session->set_flashdata('msg',"Meta Tag has been updated");
            	$this->session->set_flashdata('class',"success");
            	
            	return redirect('admin/tagList');
		    }
		    else
		    {
		        $this->session->set_flashdata('msg',"Something wrong");
            	$this->session->set_flashdata('class',"danger");
            	return redirect('admin/tagList');
		    }
		    
		}
		public function deleteMeta(){
		    
		    //echo $_REQUEST['id']." welcome";
		    
		    $result= $this->Admin->dltMtag($_REQUEST['id']);
		
		    if($result)
		    {
		        $this->session->set_flashdata('msg',"Meta Tag has been deleted");
            	
            	$this->session->set_flashdata('class',"success");
            	
            	return redirect('admin/tagList');
		    }
		    else
		    {
		        $this->session->set_flashdata('msg',"Something wrong");
            	
            	$this->session->set_flashdata('class',"danger");
            	
            	return redirect('admin/tagList');
		    }
		}
		public function updateOrderStatus(){


			$result=$this->Admin->updateOrdertStatus($_REQUEST['id'], $_REQUEST['status']);
			
			if($result)
			{
				echo "Updated";
			}
			else
			{
				echo "Something wrong";
			}
		}
		
		public function view_currency()
		{
			$data['rates']=$this->Admin->get_currency();
			
			$this->load->view('admin/view_currency',$data);
        }
        
        public function review(){

			$data['reviews']=$this->Admin->getReviews();
			
			$this->load->view('admin/allReviews',$data);
		}
		public function review_reply(){

			$data['id']=$_REQUEST['id'];

			$this->load->view('admin/review_reply_page',$data);
		}

		public function add_reply(){

			$data = array(

				"rev_id"			=> $_REQUEST['rev_id'],
				"reply"				=> $_REQUEST['reply'],
				"rep_create_on"		=> date('d-M-Y h:i A',time()),

			);
			
			$result=$this->Admin->add_reply($data);
			
			if($result)
			{
				return redirect('admin/review');
			}
		}
		
		public function updateReviewStatus(){

			//echo "<pre>";
			//print_r($_REQUEST);

			$result=$this->Admin->updateReviewStatus($_REQUEST['id'],$_REQUEST['status']);
			
			
		}
		
		public function cart_abandon(){
            
			$data['records']=$this->Admin->get_abd_cart();
			
			$this->load->view('admin/cart_abandon_list',$data);
		}
	    
	    public function adb_dlt_items(){
            
            
			for ($i=0; $i <count($_REQUEST['check']); $i++) { 
				
				$result=$this->Admin->abd_dlt_item($_REQUEST['check'][$i]);
			}
			
			if($result)
			{
				return redirect('admin/cart_abandon');
			}
			else
			{
				echo "something wrong";
			}	
		}

		public function strips_loose(){

			$data['packs']=$this->Admin->pack_list_model();
			
			$this->load->view('admin/packs',$data);
		}

		public function updatePack(){

			//echo "<pre>";
			//print_r($_REQUEST);
			$result=$this->Admin->updatePack($_REQUEST['id'], $_REQUEST['status']);
		}

		public function users(){

			$data['customers']=$this->Admin->custoemsModel();
			
			$this->load->view('admin/manage_users',$data);
		}

		public function getUsers(){

			//echo "<pre>";
			//print_r($_REQUEST);
			//echo $_REQUEST['fname']." ".$_REQUEST['lname']." ".$_REQUEST['phone']." ".$_REQUEST['email'];

			/*$abc['fname']="";
			$abc['lname']="";
			$abc['email']="";
			$abc['phone']="03312934390";*/
			//die;
			$data=$this->Admin->customerFilter($_REQUEST);
			
			echo json_encode($data);
			//print_r($data);
		}
		public function customer_history(){

			//echo $_REQUEST['cus_id'];

			
			$data['orders']=$this->Admin->cus_orders($_REQUEST['cus_id']);

			$data['reviews']=$this->Admin->cusReview($data['orders'][0]['cus_id']);

			$data['banHistory']=$this->Admin->cusBanHistory($_REQUEST['cus_id']);
			
			$this->load->view('admin/cus_history',$data);
		}

		public function resetCusPass(){

			
			$result = $this->Admin->cusPassResest($_REQUEST);
			
			echo $result;
		}

		public function updateCustomer(){

			$data=array(
				'cus_id'				=>$_REQUEST['cus_id'],
				'cus_fname'				=>$_REQUEST['fname'],
				'cus_lname'				=>$_REQUEST['lname'],
				'cus_email'				=>$_REQUEST['email'],
				'cus_phone'				=>$_REQUEST['phone'],
				'cus_add'				=>$_REQUEST['add'],
				'cus_city'				=>$_REQUEST['city'],
				'cus_state'				=>$_REQUEST['state'],
				'cus_country'			=>$_REQUEST['country'],
				'cus_zipcode'			=>$_REQUEST['zipcode'],
				'cus_update_on'			=>date('Y-m-d H:i:s', time()),
			);

			$result=$this->Admin->update_user($data);

			echo $result;
		}

		public function banAction(){

			if($_REQUEST['status']==1){

				$this->Admin->unBanCus($_REQUEST['cus_id']);
				if($result){
					echo "Now you are free";
				}else{

					echo "something is wrong";
				}
			}
			else
			{
				$result=$this->Admin->banCus($_REQUEST['cus_id'], $_REQUEST['msg']);
				
				if($result){
					echo "You are ban for some time";
				}else{

					echo "something is wrong";
				}
			}
		
		}
	}
?>