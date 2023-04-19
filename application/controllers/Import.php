<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {
    // construct
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Import_model', 'import');

    }

    public function index() {
      if($this->session->userdata('qwerty')!='')
		{
      $this->load->model('Getmodel');
    	$data['courses']=$this->Getmodel->getcourse();
    	$data['specializations']=$this->Getmodel->getspecialization();
    	$data['semesters']=$this->Getmodel->getsemester();
        $this->load->view('adminmenu2',$data);
        }
		else
		 {
			redirect(base_url().'index.php/Admincontroller');

		}
    }

    public function importFile(){
      if($this->session->userdata('qwerty')!='')
		{

      if ($this->input->post('submit')) {
                $path = 'uploads/';
                require_once "././Classes/PHPExcel.php";
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'xlsx|xls|csv';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('uploadFile')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                if(empty($error)){
                  if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;

                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $flag = true;
                    $i=0;
                    foreach ($allDataInSheet as $value) {
                      if($flag){
                        $flag =false;
                        continue;
                      }
                      $inserdata[$i]['Rollnumber'] = $value['A'];
                      $inserdata[$i]['Aadharnumber'] = $value['B'];
                      $inserdata[$i]['Course'] = $this->input->post('course');
                      $inserdata[$i]['Semester'] = $this->input->post('semester');
                        $inserdata[$i]['Specialization'] = $this->input->post('specialization');
                      $i++;
                    }
                    $result = $this->import->importData($inserdata);
                    if($result){
                      echo "Imported successfully";
                    }else{
                      echo "ERROR !";
                    }

              } catch (Exception $e) {
                   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                            . '": ' .$e->getMessage());
                }
              }else{
                  echo $error['error'];
                }


        }
        $this->load->view('adminmenu2');
        }
		else
		 {
			redirect(base_url().'index.php/Admincontroller');

		}
    }
}
?>
