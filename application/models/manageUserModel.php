<?php
		class manageUserModel extends CI_Model{
		public function getData()
		{
			$this->db->select('*');
			$this->db->from('person');
			
			$this->db->where('userType','end_user');

			$query = $this->db->get();

			return $query->result();	
			

		} 
		}
?>