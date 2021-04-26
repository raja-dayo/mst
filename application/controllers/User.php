<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends Ci_Controller{

		public function __construct(){

			parent::__construct();

			$this->load->library('cart');

			$this->load->model("ShopModel",'Shop');

			$this->load->model("LoginModel",'Login');

			$this->load->model("UserModel",'User');

			$this->load->helper('form');

			$this->load->helper('string');

			$this->load->library('email');
			
			$data=$this->Shop->metaTag(basename($_SERVER['REQUEST_URI']));

			//$page_data=$this->Shop->page_data(basename($_SERVER['REQUEST_URI']));
			
			$this->session->set_flashdata('metatag', $data);

			//$this->session->set_flashdata('page_data', $page_data);

			$data['products']=$this->Shop->get_product();
			
			$data['categories']=$this->Shop->get_category();

			$data['posts']=$this->Shop->get_post();

			//$data['pages']=$this->Shop->all_pages();

			for ($i=0; $i <count($data['categories']) ; $i++) { 
				
				foreach ($data['products'] as $key => $pro) {
					
					if($data['categories'][$i]['cat_id']==$pro['cat_id'])
					{
						$data['categories'][$i]['products'][$key]['pro_id']=$pro['pro_id'];
						$data['categories'][$i]['products'][$key]['pro_name']=$pro['pro_name'];
						$data['categories'][$i]['products'][$key]['pro_d_link']=$pro['pro_main'];
						$data['categories'][$i]['products'][$key]['pro_full_name']=$pro['pro_full_name'];
						$data['categories'][$i]['products'][$key]['pro_is_brand']=$pro['pro_is_brand'];
						$data['categories'][$i]['products'][$key]['pro_link']=$pro['pro_link'];

					}  	
				}  
			}

			$_SESSION['data']['links']=$data['categories'];
			//$_SESSION['data']['posts']=$data['posts'];
			//$_SESSION['data']['pages']=$data['pages'];

			if(!isset($_SESSION['data']['customer'])){

				return redirect('login');
			}
		}

		/*public function index(){

			return redirect();
		}*/

		public function order(){

			$data["result"]=$this->Shop->get_customer_order($_SESSION['data']['user']['u_id']);

			$this->load->view("page/customer_order",$data);//
		
		}
		public function my_acount(){

			//echo "<pre>";
			//print_r($_SESSION['data']['customer']);

			//die;
			
			$data['country']=$this->Shop->get_country();
			
			$this->load->view("customer/welcome",$data);
		}

		public function updateProfile(){

			//echo "<pre>";
			//print_r($_POST);
			//die;
			$data=array(

				
				'cus_fname'				=>$_REQUEST['FirstName'],
				'cus_lname'				=>$_REQUEST['LastName'],
				'cus_pass'				=>$_REQUEST['password'],
				'cus_email'				=>$_REQUEST['Email'],
				'cus_phone'				=>$_REQUEST['number'],
				'cus_add'				=>$_REQUEST['Address'],
				'cus_city'				=>$_REQUEST['city'],
				'cus_state'				=>$_REQUEST['state'],
				'cus_country'			=>$_REQUEST['country'],
				'cus_zipcode'			=>$_REQUEST['p_code'],
				'cus_update_on'			=>date('Y-m-d H:i:s', time()),
			);

			$result=$this->User->update_profile($data,$_REQUEST['cus_id']);
			
			if($result){

				//echo "sai aa";
				//die;
				
				$_SESSION['data']['customer']=$data;

				$_SESSION['data']['customer']['cus_id']=$_REQUEST['cus_id'];
				
				return redirect('user/my_acount');
			}else{

				echo "something wrong";
			}
		}
		
	}
?>