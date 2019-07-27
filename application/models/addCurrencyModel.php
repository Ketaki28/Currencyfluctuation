<?php
	class addCurrencyModel extends CI_Model{
		function insert_data($data)
		{
			$this->db->insert("currency",$data);
		}
		function insert_data1($data1)
		{
			$this->db->insert("currencydetails",$data1);
		}
	} 
?>