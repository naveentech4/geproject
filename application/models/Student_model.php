<?php
defined('BASEPATH') or exit('no direct access or script allowed');

/**
 *
 */
class Student_model extends CI_model
{
  protected $table='studentdetails';
  public function get_count()
 {
   return $this->db->count_all($this->table);
 }
 public function get_students($formarray)
 {

   $this->db->where($formarray);

   $query=$this->db->get($this->table);
   return $query->result();
 }

 public function insertstud($data1){
   $res1=$this->db->insert('studentdetails',$data1);
   if($res1)
   {
     return true;
   }
   else {
     return false;
   }
 }
 public function updatestud($ID,$fromarray)
 {
   $this->db->where('ID',$ID);
   $res1=$this->db->update('studentdetails',$fromarray);
   if($res1)
   {
     return true;
   }
   else {
     return false;
   }
 }
 function getstudent($ID){
   $this->db->where('ID',$ID);
   return $this->db->get('studentdetails')->row_array();

 }
 function deletestud($id){
   $this->db->where('ID',$id);
   $this->db->delete('studentdetails');
 }

 function getcourse()
 {
   $this->db->distinct();
  $this->db->select('course');
   return $this->db->get('subjects')->result_array();
 }
 function getspecialization()
 {
   $this->db->distinct();
  $this->db->select('specialization');
   return $this->db->get('subjects')->result_array();
 }
 function getsemester(){
   $this->db->distinct();
  $this->db->select('semester');
   return $this->db->get('subjects')->result_array();

 }

}



 ?>
