<?php 


class Admin_model extends CI_model 
{


     function can_admin($fromarray)
   {
     $this->db->where($fromarray);
     $query=$this->db->get('admin');
     if($query->num_rows()>0)
     {
       return true;
     }
     else {
       return false;

     }
   }
    
}





?>