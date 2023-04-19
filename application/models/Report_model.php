<?php


class Report_model extends CI_model
{
    function getselectedsub($formarray)
    {
        $this->db->select('subjectselected.Timestamp,subjects.subjectname,subjectselected.rollnumber,subjectselected.course,subjectselected.specialization,subjectselected.semester');
        $this->db->from('subjectselected');
        $this->db->join('subjects','subjects.ID=subjectselected.subjectid','left');
        $this->db->where($formarray);
      return $this->db->get()->result_array();
    }
   function getsubjects()
   {
     $this->db->select('DISTINCT(subjectname)');
     $this->db->from('subjects');
     return $this->db->get()->result_array();
   }
   function getelectivesubject($subjectname)
   {
     $sql='select subjects.subjectname,subjectselected.rollnumber,subjectselected.course,subjectselected.specialization,subjectselected.semester,subjectselected.Timestamp from subjectselected left join subjects on subjectselected.subjectid=subjects.ID where subjects.subjectname=?';
     return $this->db->query($sql,array($subjectname))->result_array();

   }



}




?>