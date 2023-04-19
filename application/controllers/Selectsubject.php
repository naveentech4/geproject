<?php
defined('BASEPATH') OR exit('no direct script allowed');
/**
 *
 */
class Selectsubject extends CI_Controller
{

  function index()
  {
    if($this->session->userdata('rollnumber') != '')
    {
      $this->load->helper('array');
      $rollnumber=$this->session->userdata('rollnumber');
      $this->load->model('Getmodel');
      $checkselected=$this->Getmodel->checkselect($rollnumber);
      if($checkselected==false)
      {
      $student=$this->Getmodel->Getusersubjects($rollnumber);
      $data=array();
      $data['user']=$student;
      $check=array('course'=> element('Course',$data['user'][0]),'semester' => element('Semester',$data['user'][0]),'specialization' => element('Specialization',$data['user'][0]));
        $this->load->model('Subject_model');
        $result=$this->Subject_model->publishcheck($check);
        if($result==1)  
        {
          $student1=$this->Getmodel->getuser($rollnumber);
          $this->session->set_userdata('rollnumber',$student1[0]['Rollnumber']);
          $this->session->set_userdata('course',$student1[0]['Course']);
          $this->session->set_userdata('semester',$student1[0]['Semester']);
          $this->session->set_userdata('specialization',$student1[0]['Specialization']);
          $data1=array();
        $data1['user1']=$student1;
        $data1['nosubject']=1;
          $this->load->view('Subjectselect',$data1);
        }
        else
        {
        $this->load->model('Getmodel');
        $data1['user1']=$this->Getmodel->getstudent($rollnumber);
        $data1['nosubject']=null;
        $this->load->view('Subjectselect',$data1);
      }

  }
  else
  {
        $data1['user1']=$this->Getmodel->getstudent($rollnumber);
        $data1['nosubject']=2;
        $data1['selectedsubject']=$this->Getmodel->getselectedsubject($rollnumber);
        $this->load->view('Subjectselect',$data1);

  }
}
    else {
      
      redirect(base_url().'index.php/LoginController');

    }
  }
function subjectselect($id)
{
  if($this->session->userdata('rollnumber')!='')
    {
    $rollnumber=$this->session->userdata('rollnumber');
  if($id!='')
  {
    $this->load->model('Selectsub_model');
    $valid=$this->Selectsub_model->validsubject($id);
    if($valid==true)
    {

  $this->load->model('Getmodel');
   $checkselected=$this->Getmodel->checkselect($rollnumber);
   if($checkselected==false)
   {
    
  $this->load->model('Selectsub_model');
  $chkseats=$this->Selectsub_model->chksubseats($id);
  if($chkseats==true)
  {
    $uptseats=$this->Selectsub_model->updateseats($id);
    if($uptseats==true)
    {
       $idrollnumber=$this->session->userdata('rollnumber');
          $idcourse=$this->session->userdata('course');
          $idSemester=$this->session->userdata('semester');
          $idSpecialization=$this->session->userdata('specialization');
      $studentarray=array('rollnumber' =>$idrollnumber,'course' => $idcourse,'specialization' => $idSpecialization,'semester' => $idSemester,'subjectid' => $id );
      $checkins=$this->Selectsub_model->studinsert($studentarray);
      if($checkins==true)
      {
        $this->session->unset_userdata('rollnumber');
    $this->session->set_flashdata('inserted','You have successfully selected subject, Please re-login to view your subject');
    redirect(base_url().'index.php/LoginController');
      }
    }
  }
  else
  {
    $this->session->set_flashdata('noseats','There is no seats available in the selected subjet! Please select another subject');
    redirect(base_url().'index.php/Selectsubject');
  }
}
else {
   $this->session->unset_userdata('rollnumber');
    $this->session->set_flashdata('inserted','You have already selected subject! Re-login to view your subject');
    redirect(base_url().'index.php/LoginController');
}
    }
    else {
$this->session->unset_userdata('rollnumber');
    $this->session->set_flashdata('inserted','something went wrong! please contact administrator');
    redirect(base_url().'index.php/LoginController');
    }
}
else {
   $this->session->unset_userdata('rollnumber');
    $this->session->set_flashdata('inserted','Something went wrong');
    redirect(base_url().'index.php/LoginController');
}
}
else {
   redirect(base_url().'index.php/LoginController');
}
}
  function logout(){
    $this->session->unset_userdata('rollnumber');
    session_destroy();
    redirect(base_url().'index.php/LoginController');
  }
}




 ?>
