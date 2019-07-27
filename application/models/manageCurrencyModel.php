<?php 
		class manageCurrencyModel extends CI_Model{
			public function getData()
		{
			$this->db->select('cName,country');
			$this->db->from('currency');

			$query = $this->db->get();

			return $query->result();
			

		} 

		public function delete_currency()
		{
		$this->db->where('currencyName', $data);
		$this->db->delete('currencydetails');
		$this->db->where('currName', $data);
		$this->db->delete('item');
		$this->db->where('cName', $data);
		$this->db->delete('currency');
		}
		}
 ?>