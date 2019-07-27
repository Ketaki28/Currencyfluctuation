<?php 
      class deleteUserModel extends CI_Model{
         function row_delete($unameDelete){
            $this->db->where('email', $unameDelete);
            $this->db->delete('person');
            
           
         }

          function row_edit($unameDelete1,$data){
             $this->db->where('email', $unameDelete1);
             $this->db->update('person',$data);
            
         }
      }