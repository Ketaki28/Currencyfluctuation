<?php 
		class deleteCurrencyModel extends CI_Model{
			function row_delete($cnameDelete){
				$sql = $this->db->query("select currencyName from currencydetails");
        		if($sql){
				$this->db->where('currencyName', $cnameDelete);
				$this->db->delete('currencydetails');

			}
				$data ="select itemID from item where currName='$cnameDelete'";
				echo $data;
				$sql1 = $this->db->query($data);
				$row = $sql1 ->result();
				
        		foreach ($row as $s){
        			$data2 = "select itemID from tradeitems where itemID='$s->itemID'";
        			echo $data2;
        			$sql3 = $this->db->query($data2);
					$row2 = $sql3 ->result();
					
        		foreach ($row2 as $s2){
				$this->db->where('itemID', $s2 ->itemID);
				$this->db->delete('tradeitems');
				}
				$this->db->where('itemID', $s ->itemID);
				$this->db->delete('item');
			}
				
			
				$sql2 = $this->db->query("select cName from currency");
        		if($sql2){
				$this->db->where('cName', $cnameDelete);
				$this->db->delete('currency');
			}
			}

			function row_edit($cnameDelete1,$data){
				$this->db->where('currencyName', $cnameDelete1);
				$this->db->update('currencydetails',$data);
				
			}
		}
		?>