<?php
defined('BASEPATH') or exit('no direct script or access allowed');

/**
 *
 */
class subject_model extends CI_model
{
function publishins($fromarray)
{
	$course=$fromarray['course'];
	$specialization=$fromarray['specialization'];
	$semester=$fromarray['semester'];
	$this->db->where('course',$course);
	$this->db->where('specialization',$specialization);
	$this->db->where('semester',$semester);
	$check=$this->db->get('published')->num_rows();
	if($check>=1)
	{
		return 2;
	}
	else
	{

		 $res=$this->db->insert('published',$fromarray);
		  if($res)
		  {
		  	return true;
		  }
		  else
		  {
		  	return false;
		  }
}
}
function publishcheck($fromarray)
{
	$this->db->select('count(*) as res');
	$this->db->from('published');
	$this->db->where($fromarray);
	$this->db->where('date < now()');
	$this->db->where('ispublish',1);
   $result=$this->db->get()->result_array();
   $check=$result[0]['res'];
 if($check)
 {
 	return true;
 }
 else
 {
 	return false;
 }
}
function deletepubl($id)
{
	$this->db->where('ID',$id);
	$res=$this->db->delete('published');
	if($res)
	{
		return true;
	}
	else {
		return false;
	}
}
}


  ?>
