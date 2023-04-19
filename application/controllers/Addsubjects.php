<?php
defined('BASEPATH') or exit('no direct script access allowed');

/**
 *
 */
class Addsubjects extends CI_controller
{
	public function __construct()
  {
    parent::__construct();
    $this->load->model('Getmodel');
    $this->load->library('pagination');


  }

	public function index()
	{

if($this->session->userdata('qwerty')!='')
{
		$config=array();
	$config['base_url']=base_url().'/index.php/Addsubjects';
$config['total_rows']=$this->Getmodel->get_count();
$config['per_page']=10;
$config['uri_segment']=2;
$this->pagination->initialize($config);
$page=($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
$data['links']=$this->pagination->create_links();
$data['subjects']=$this->Getmodel->get_subjects($config['per_page'],$page);
$this->load->view('adminmenu3',$data);
}
else {
	redirect(base_url().'index.php/Admincontroller');
}
	}
	public function addsubject1(){
		if($this->session->userdata('qwerty')!='')
		{
		$this->form_validation->set_rules('course','course','trim|required|min_length[1]|max_length[15]');
		$this->form_validation->set_rules('specialization','specialization','trim|required|min_length[1]|max_length[15]');
		$this->form_validation->set_rules('semester','semester','trim|required|min_length[1]|max_length[15]');
		$this->form_validation->set_rules('subjectname','subjectname','trim|required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('subjecid','subjecid','trim|required|is_unique[subjects.subjectid]|min_length[1]|max_length[15]');
		$this->form_validation->set_rules('total','total','trim|required|min_length[1]|max_length[15]');
		if($this->form_validation->run())
		{
			$formarray=array();
			$formarray['course']=$this->input->post('course');
			$formarray['specialization']=$this->input->post('specialization');
			$formarray['semester']=$this->input->post('semester');
			$formarray['subjectname']=$this->input->post('subjectname');
			$formarray['subjectid']=$this->input->post('subjecid');
			$formarray['totalseats']=$this->input->post('total');
			$formarray['remainingseats']=$this->input->post('total');
			$this->load->model('Import_model');
			$this->Import_model->insertsub($formarray);
			$this->session->set_flashdata('success','Subject Inserted successfully');
			redirect(base_url().'index.php/Addsubjects');

		}
		else {
			$config=array();
		$config['base_url']=base_url().'/index.php/Addsubjects';
	$config['total_rows']=$this->Getmodel->get_count();
	$config['per_page']=10;
	$config['uri_segment']=2;
	$this->pagination->initialize($config);
	$page=($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	$data['links']=$this->pagination->create_links();
	$data['subjects']=$this->Getmodel->get_subjects($config['per_page'],$page);
	$this->load->view('adminmenu3',$data);
		}
	}
	else {
		redirect(base_url().'index.php/Admincontroller');

	}
}
	function delete($ID)
  {
	  if($this->session->userdata('qwerty')!='')
		{
      $this->load->model('Getmodel');
        $this->Getmodel->deletesub($ID);
				$this->session->set_flashdata('success','Record deletd successfully');
		redirect(base_url().'index.php/Addsubjects/index');
		}
		else {
			redirect(base_url().'index.php/Admincontroller');

		}
}
function edit($ID)
{
	if($this->session->userdata('qwerty')!='')
		{
	$this->load->model('Getmodel');
	$data=array();
	$data['subject']=$this->Getmodel->getsubject($ID);
	$this->load->view('adminmenu4',$data);
		}
		else {
			redirect(base_url().'index.php/Admincontroller');

		}
}
function update($ID)
{
	if($this->session->userdata('qwerty')!='')
		{
	$this->form_validation->set_rules('course','course','trim|required|min_length[1]|max_length[15]');
	$this->form_validation->set_rules('specialization','specialization','trim|required|min_length[1]|max_length[15]');
	$this->form_validation->set_rules('semester','semester','trim|required|min_length[1]|max_length[15]');
	$this->form_validation->set_rules('subjectname','subjectname','trim|required|min_length[1]|max_length[15]');
	$this->form_validation->set_rules('subjectid','subjectid','trim|required|min_length[1]|max_length[15]');
	$this->form_validation->set_rules('totalseats','total','trim|required|min_length[1]|max_length[15]');
	if($this->form_validation->run())
	{
		$formarray=array();
		$formarray['course']=$this->input->post('course');
		$formarray['specialization']=$this->input->post('specialization');
		$formarray['semester']=$this->input->post('semester');
		$formarray['subjectname']=$this->input->post('subjectname');
		$formarray['subjectid']=$this->input->post('subjectid');
		$formarray['totalseats']=$this->input->post('totalseats');

		$this->load->model('Import_model');
		$this->Import_model->updatesub($ID,$formarray);
		$this->session->set_flashdata('success','Record updated successfully');
		redirect(base_url().'index.php/Addsubjects');


	}
	else {
		$this->load->model('Getmodel');
		$data=array();
		$data['subject']=$this->Getmodel->getsubject($ID);
		$this->load->view('adminmenu4',$data);
	}
	}
		else {
			redirect(base_url().'index.php/Admincontroller');

		}
}
function getpublilsh(){
	if($this->session->userdata('qwerty')!='')
		{
	$data=array();
	$this->load->model('Getmodel');
	$data['courses']=$this->Getmodel->getcourse();
	$data['specializations']=$this->Getmodel->getspecialization();
	$data['semesters']=$this->Getmodel->getsemester();
	$this->load->view('adminmenu7',$data);
	}
		else {
			redirect(base_url().'index.php/Admincontroller');

		}
}
function publish(){
	if($this->session->userdata('qwerty')!='')
		{
	$fromarray=array('course' => $this->input->post('course'),'specialization' => $this->input->post('specialization'), 'semester' => $this->input->post('semester'),'date' => $this->input->post('publishdate'),'ispublish' => 1);
	$this->load->model('Subject_model');
    $res=$this->Subject_model->publishins($fromarray);

    if($res==1)
    {
       $this->session->set_flashdata('success','Subject published successfully');
       redirect(base_url().'index.php/Addsubjects/getpublilsh');
    }
    elseif($res==2)
    {
       $this->session->set_flashdata('failure','Subject already published');
       redirect(base_url().'index.php/Addsubjects/getpublilsh');
    }
    else
    {
    	$this->session->set_flashdata('failure','Something went wrong');
       redirect(base_url().'index.php/Addsubjects/getpublilsh');
	}
	}
		else
		 {
			redirect(base_url().'index.php/Admincontroller');

		}

}
function getpublishview(){
	if($this->session->userdata('qwerty')!='')
		{
	$this->load->model('Getmodel');
	$data['published']=$this->Getmodel->getpublilshsub();
	$this->load->view('Publishcrud',$data);
	}
		else
		 {
			redirect(base_url().'index.php/Admincontroller');

		}
}
function deletepubl($id)
{
	if($this->session->userdata('qwerty')!='')
		{
	$this->load->model('Subject_model');
	$res=$this->Subject_model->deletepubl($id);
	if($res)
	{
		$this->session->set_flashdata('success','Subjected Unpublished successfully');
		redirect(base_url().'index.php/Addsubjects/getpublishview');
	}
	else {
		$this->session->set_flashdata('failure','Something went wrong please try again later');
		redirect(base_url().'index.php/Addsubjects/getpublishview');
	}
	}
		else
		 {
			redirect(base_url().'index.php/Admincontroller');

		}
}

}


 ?>
