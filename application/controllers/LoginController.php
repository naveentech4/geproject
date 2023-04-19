<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class LoginController extends CI_Controller
{
  public function index(){

    $this->load->view('Homepage');


  }
  public function login(){

    $this->form_validation->set_rules('rollnumber','Roll Number','xss_clean|trim|required|min_length[12]|max_length[12]');
    $this->form_validation->set_rules('aadharnumber','Aadhar Number','xss_clean|trim|required|min_length[12]|max_length[15]');
    if($this->form_validation->run())
    {
      $rollnumber=$this->input->post('rollnumber');
      $aadharnumber=$this->input->post('aadharnumber');
      $this->load->model('Login_model');
      if($this->Login_model->can_login($rollnumber,$aadharnumber))
      {
        $session_data=array('rollnumber' => $rollnumber);
        $this->session->set_userdata($session_data);
        redirect(base_url().'index.php/Selectsubject');

      }
      else {
        $this->session->set_flashdata('error','Invalid Rollnumber or Aadharnumber');
          redirect(base_url().'index.php/Logincontroller');
      }
    }
    else {
      $this->load->view('Homepage');
    }

}

}
 ?>
