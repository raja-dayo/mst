<?php

	
	class UserModel extends CI_model{

		public function update_profile($data,$id){

			$this->db->where('cus_id',$id);

			$result=$this->db->update('customers',$data);
			
			return ($result ? true: false);
		}

		function cus_reviews($cus_id){

			$this->db->where('cus_id',$cus_id);
			$result=$this->db->get('reviews');
			return $result->result_array();
		}
	}

?>