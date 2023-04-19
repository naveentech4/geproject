<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 /**
  *

  */
 class Login_model extends CI_model
 {

   function can_login($rollnumber,$aadharnumber)
   {
     $this->db->where('rollnumber',$rollnumber);
     $this->db->where('aadharnumber',$aadharnumber);
     $query=$this->db->get('studentdetails');
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
