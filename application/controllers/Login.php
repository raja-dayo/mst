<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login Extends Ci_controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->load->model("LoginModel",'Login');
		}
		public function index()
		{	
			echo "sdhfj";
			die;
			$this->load->view("login/login");
		}

		public function admin_login(){

			$this->load->view("admin/login");
		}
		public function admin_login_process()
		{
			
			$result=$this->Login->login($_REQUEST['email']);
			
			if($result)
			{
				if(password_verify($_REQUEST['password'], $result[0]['password']) && $_REQUEST['email']==$result[0]['email'])
				{
					$_SESSION['data']['admin']=$result[0];
						
					return redirect('admin/dashboard');						
				}
				else
				{
					//echo "Invalid email or password";

					$this->session->set_flashdata('msg',"Invalid email or password");
                	
                	$this->session->set_flashdata('class',"warning");

                	return redirect('447563084792');
				}	
			}
			else
			{
				
				$this->session->set_flashdata('msg',"Invalid email or password");
            	
            	$this->session->set_flashdata('class',"warning");
				
				return redirect('447563084792');
			}
		}
		public function login_process()
		{
		
		
			//$result=$this->Login->cus_login($_REQUEST['email']);
			//echo $_REQUEST['email'];


			$result=$this->Login->cus_login_new($_REQUEST['email']);
			
			
			if($result)
			{
				if($_REQUEST['password']==$result[0]['cus_pass'] && $_REQUEST['email']==$result[0]['cus_email'])
				{
					$_SESSION['data']=$result[0];
						

					$_SESSION['data']['customer']=$_SESSION['data'];

					return redirect('');
					
				}
				else
				{
					
					$this->session->set_flashdata('msg',"Invalid email or password");
                	
                	$this->session->set_flashdata('class',"warning");

                	return redirect('login');
				}	
			}
			else
			{
				
				$this->session->set_flashdata('msg',"Invalid email or password");
               
                $this->session->set_flashdata('class',"warning");
				
				return redirect('login');
			}
		}

		public function logout()
		{
			unset($_SESSION['data']);

			return redirect('login');
		}

		
		/*
		public function test(){

			$result =$this->db->query("select umeta_id,user_id, meta_value
						from wp_usermeta
						where meta_key='billing_state'");

			$result=$result->result_array();

			echo "<pre>";
			print_r($result);
			die;
			foreach ($result as $key => $add) {
				
				$data=array(

					"cus_state" =>$add['meta_value'],
					//"b_add"	 =>$add['meta_value']	
				);

				$this->db->where('cus_id',$add['user_id']);
				$flag=$this->db->update('cus_meta',$data);
					
			}

			if($flag){
				echo "sb sai aa";
			}else{

				echo "ghalat aa";
			}

		}*/
	}

?>