<?php

class newUserModel extends CI_Model{
function insert_data($data){
	$this->db->insert("person",$data);
}
}
?>