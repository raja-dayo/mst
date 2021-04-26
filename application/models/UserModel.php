<?php

	
	class UserModel extends CI_model{

		public function update_profile($data,$id){

			$this->db->where('cus_id',$id);

			$result=$this->db->update('customers',$data);
			
			return ($result ? true: false);
		}
	}

?>