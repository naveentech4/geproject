<?php
/**
 * 
 */
class Selectsub_model extends CI_model
{
	
	function chksubseats($id)
	{
    $this->db->select('remainingseats');
    $this->db->where('ID',$id);
    $this->db->from('subjects');
    $ava=$this->db->get()->result();
    $seatscount=$ava[0]->remainingseats;
    if($seatscount>0)
    {
    	return true;
    }
    else
    {
    	return false;
    }    
}

function updateseats($id)
{
	$this->db->set('remainingseats', 'remainingseats-1', FALSE);
$this->db->where('ID', $id);
$checkup=$this->db->update('subjects');
return $checkup;
}
function studinsert($studarray)
{
    return $this->db->insert('subjectselected',$studarray);
}

function validsubject($id)
{
$coursec=$this->session->userdata('course');
$semesterc=$this->session->userdata('semester');
$specializationc=$this->session->userdata('specialization');
$checkarray=array('ID'=> $id,'course' => $coursec,'specialization' => $specializationc,'semester'=>$semesterc);
$this->db->select('count(*) as res');
$this->db->from('subjects');
$this->db->where($checkarray);
$res=$this->db->get()->result_array();
if($res[0]['res']==1)
{
 return true;
}
else {
return false;
    
}
}

}
 ?>