<?php
defined('BASEPATH') or exit('no direct access or script allowed');

/**
 *
 */
class Admincontroller extends CI_controller
{

function index()
{
  $this->load->view('adminlogin');

}
function auth(){
  $emailid=$this->input->post('email');
  $password=$this->input->post('password');
  $fromarray=array('emailid' => $emailid,'password' => $password);
  $this->load->model('Admin_model');
  if($this->Admin_model->can_admin($fromarray))
  {
    $this->session->set_userdata('qwerty',$emailid);
    redirect(base_url().'index.php/Addsubjects');
  }
  else {
    $this->session->set_flashdata('failure','Invalid emailid or password');
    $this->load->view('adminlogin');
  }

}

function changepasswordview()
{
$this->load->view('Changepassword');
}
function changepassword()
{
  $this->from_validations->set_rules('cnpass','Current password','trim|required|min_length(5)|max_length(20)');
  $this->form_validations->set_rules('newpass');

  extract($_POST);
  $this->load->model('Admin_model');
  $this->Admin_model->cpasswordm($cnpass,$newpass,$cpass);
}



function logout()
  {
    $this->session->unset_userdata('qwerty');
    session_destroy();
    redirect(base_url().'index.php/Admincontroller');
  }


}



 ?>
