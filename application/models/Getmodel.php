<?php
defined('BASEPATH') or exit('no direct script allowed');

/**
 *
 */
class Getmodel extends CI_model
{
protected $table='subjects';
  function getuser($rollnumber)
  {
  $query='SELECT sub.ID,sub.totalseats,sub.remainingseats,sub.subjectname,std.Rollnumber,std.Course,std.Semester,std.Specialization from studentdetails std RIGHT join subjects sub on std.Course=sub.course and std.Specialization=sub.specialization and std.Semester=sub.semester where rollnumber=?';
  return $row=$this->db->query($query,array($rollnumber))->result_array();

  }
  function Getusersubjects($rollnumber)
  {
    $query='SELECT Course,
    Semester,Specialization FROM studentdetails where Rollnumber=?';
    return $row=$this->db->query($query,array($rollnumber))->result_array();
  }
  public function get_count()
 {
   return $this->db->count_all($this->table);
 }
 public function get_subjects($limit,$start)
 {
   $this->db->limit($limit,$start);
   $query=$this->db->get($this->table);
   return $query->result();
 }
  function deletesub($id){
    $this->db->where('ID',$id);
    $this->db->delete('subjects');
  }
  function getsubject($ID){
    $this->db->where('ID',$ID);
    return $this->db->get('subjects')->row_array();

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
  function getstudent($rollnumber){
    $this->db->where('Rollnumber',$rollnumber);
   return $this->db->get('studentdetails')->result_array();

  }
  function getpublilshsub()
  {
  return  $this->db->get('published')->result_array();
    }

    function checkselect($rollnumber)
    {
        $this->db->select('count(*) as res');
        $this->db->where('rollnumber',$rollnumber);
        $this->db->from('subjectselected');
        $query=$this->db->get()->result_array();
        if($query[0]['res']>=1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function getselectedsubject($rollnumber)
    {
      $sql='SELECT subjects.subjectname,subjectselected.rollnumber,subjectselected.course,subjectselected.specialization,subjectselected.semester from subjectselected left join subjects on subjects.ID=subjectselected.subjectid where rollnumber=?';
      return $row=$this->db->query($sql,array($rollnumber))->result_array();
    }

}



 ?>
