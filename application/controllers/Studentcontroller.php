<?php
defined('BASEPATH') or exit('no direct script access allowed');

/**
 *
 */
class Studentcontroller extends CI_controller
{
	public function __construct()
  {
    parent::__construct();
    $this->load->model('Student_model');
    $this->load->library('pagination');


  }
	public function index()
	{
		if($this->session->userdata('qwerty')!='')
		{
    $formarray=array('course'=>$this->input->post('course'),'specialization'=>$this->input->post('specialization'),'semester'=>$this->input->post('semester'));
$data['courses']=$this->Student_model->getcourse();
$data['specializations']=$this->Student_model->getspecialization();
$data['semesters']=$this->Student_model->getsemester();
$data['students']=$this->Student_model->get_students($formarray);
$this->load->view('adminmenu5',$data);
}
  else {

      $this->session->sess_destroy();
      redirect(base_url().'index.php/Logincontroller');
  } 
	}
	public function addstudents1(){
		if($this->session->userdata('qwerty')!='')
		{
		$this->form_validation->set_rules('Rollnumber','Rollnumber','trim|is_unique[studentdetails.Rollnumber]|required|min_length[1]|max_length[15]');
		$this->form_validation->set_rules('Course','Course','trim|required|min_length[1]|max_length[15]');
		$this->form_validation->set_rules('Specialization','Specialization','trim|required|min_length[1]|max_length[15]');
		$this->form_validation->set_rules('Semester','Semester','trim|required|min_length[1]|max_length[15]');
		$this->form_validation->set_rules('Aadharnumber','Aadharnumber','trim|required|is_unique[studentdetails.Aadharnumber]|min_length[1]|max_length[15]');
		if($this->form_validation->run())
		{
			$formarray=array();
			$formarray['Rollnumber']=$this->input->post('Rollnumber');
			$formarray['Course']=$this->input->post('Course');
			$formarray['Specialization']=$this->input->post('Specialization');
			$formarray['Semester']=$this->input->post('Semester');
			$formarray['Aadharnumber']=$this->input->post('Aadharnumber');
			$this->load->model('Student_model');
			$this->Student_model->insertstud($formarray);
			$this->session->set_flashdata('success','Student details Inserted successfully');
			redirect(base_url().'index.php/Studentcontroller');

		}
		else {

      $config=array();
  	$config['base_url']=base_url().'/index.php/Studentcontroller';
  $config['total_rows']=$this->Student_model->get_count();
  $config['per_page']=2;
  $config['uri_segment']=2;
  $this->pagination->initialize($config);
  $page=($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
  $data['links']=$this->pagination->create_links();
  $data['students']=$this->Student_model->get_students($config['per_page'],$page);
  $this->load->view('adminmenu5',$data);
		}
		}
  else 
  {

      $this->session->sess_destroy();
      redirect(base_url().'index.php/Logincontroller');
  } 
	}
	function delete($ID)
  {
	  if($this->session->userdata('qwerty')!='')
		{
      $this->load->model('Student_model');
    $this->Student_model->deletestud($ID);
	$this->session->set_flashdata('success','Record deleted successfully');
		redirect(base_url().'index.php/Studentcontroller');
		}
  else 
  {
      $this->session->sess_destroy();
      redirect(base_url().'index.php/Logincontroller');
  } 
}
function edit($ID)
{
	if($this->session->userdata('qwerty')!='')
		{
	$this->load->model('Student_model');
	$data=array();
	$data['students']=$this->Student_model->getstudent($ID);
	$this->load->view('adminmenu6',$data);
	}
  else 
  {
      $this->session->sess_destroy();
      redirect(base_url().'index.php/Logincontroller');
  } 
}
function update($ID)
{
	if($this->session->userdata('qwerty')!='')
		{

  $this->form_validation->set_rules('Course','Course','trim|required|min_length[1]|max_length[15]');
  $this->form_validation->set_rules('Specialization','Specialization','trim|required|min_length[1]|max_length[15]');
  $this->form_validation->set_rules('Semester','Semester','trim|required|min_length[1]|max_length[15]');
  $this->form_validation->set_rules('Aadharnumber','Aadharnumber','trim|required|min_length[1]|max_length[15]');
  if($this->form_validation->run())
  {
    $formarray=array();
    $formarray['Course']=$this->input->post('Course');
    $formarray['Specialization']=$this->input->post('Specialization');
    $formarray['Semester']=$this->input->post('Semester');
    $formarray['Aadharnumber']=$this->input->post('Aadharnumber');
    $this->load->model('Student_model');
		if($this->Student_model->updatestud($ID,$formarray))
    {
		$this->session->set_flashdata('success','Record updated successfully');
		redirect(base_url().'index.php/Studentcontroller');
}
else 
{
  $this->session->set_flashdata('success','Something went wrong! please try again later');
  redirect(base_url().'index.php/Studentcontroller');
}
	}
	else 
	{
    $this->load->model('Student_model');
  	$data=array();
  	$data['students']=$this->Student_model->getstudent($ID);
  	$this->load->view('adminmenu6',$data);

	}
	}
  else 
  {
      $this->session->sess_destroy();
      redirect(base_url().'index.php/Logincontroller');
  } 
}
}


 ?>
