<?php

	class LoginModel extends Ci_Model
	{
		public function login($email)
		{
			$result=$this->db->query("select * from users where email='".$email."'");
			
			return $result->result_array();
		}

		public function cus_login($email)
		{
			$result=$this->db->query("select * from customers where cus_email='".$email."'");
			
			return $result->result_array();
		}

		public function cus_login_new($email)
		{
			$result=$this->db->query("
				SELECT * 
 				FROM customers 
 				
 				WHERE cus_email='".$email."'
			");
			
			return $result->result_array();
		}

		public function check_email($email)
		{
			$this->db->where("cus_email",$email);
			
			$result=$this->db->get("customers");
			
			return $result->result_array();
		}
		public function new_password_model($email, $pass)
		{
			$data=array(

				"cus_pass"			=>$pass,
			);

			$this->db->where("cus_email",$email);

			$result=$this->db->update("customers",$data);
			
			return ($result ? true: false);
		}
	}

?>