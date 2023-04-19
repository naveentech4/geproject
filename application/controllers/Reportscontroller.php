<?php
   
   
   class Reportscontroller extends CI_controller 
   {

    function index()
    {
        if($this->session->userdata('qwerty')!='')
		{
        $this->load->model('Getmodel');
        $this->load->model('Report_model');
    	$data['courses']=$this->Getmodel->getcourse();
    	$data['specializations']=$this->Getmodel->getspecialization();
        $data['semesters']=$this->Getmodel->getsemester();
        $this->load->view('Reports',$data);
        }
		else
		 {
			redirect(base_url().'index.php/Admincontroller');
			
		}
    }
    function getbycourse()
    {
        if($this->session->userdata('qwerty')!='')
		{
        $this->load->model('Getmodel');
        $this->load->model('Report_model');
        extract($_POST);
        $formarray=array('subjectselected.course' => $course, 'subjectselected.specialization' => $specialization, 'subjectselected.semester' => $semester);
        $data['students']=$this->Report_model->getselectedsub($formarray);       
    	$data['courses']=$this->Getmodel->getcourse();
    	$data['specializations']=$this->Getmodel->getspecialization();
        $data['semesters']=$this->Getmodel->getsemester();
        $this->load->view('Reports',$data);
        }
		else
		 {
			redirect(base_url().'index.php/Admincontroller');
			
		}
    }

    function getbysubject()
    {
         if($this->session->userdata('qwerty')!='')
		{              
         $this->load->model('Getmodel');
        $this->load->model('Report_model');

        if($_POST){
            extract($_POST);
            $data['students']=$this->Report_model->getelectivesubject($subjectname);
        } else {
            $data['students']=array();
        }
        $data['subjects']=$this->Report_model->getsubjects();
        $this->load->view('Reportssubjects',$data);
        }
		else
		 {
			redirect(base_url().'index.php/Admincontroller');			
		}
        
    }

    public function createXLS() 
    {
         if($this->session->userdata('qwerty')!='')
		{
        $this->load->model('Report_model');
        // create file name
            $fileName = 'data-'.time().'.xlsx';  
        // load excel library
            $this->load->library('excel');
            require_once "././Classes/PHPExcel.php";    
            extract($_POST);
            $formarray=array('subjectselected.course' => $course, 'subjectselected.specialization' => $specialization, 'subjectselected.semester' => $semester);
            $data=$this->Report_model->getselectedsub($formarray);  
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            // set Header
            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Roll number');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Course');
            $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Specilaization');
            $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'semester');
            $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Selected subject');       
            $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Time Stamp');       
            // set Row
            $rowCount = 2;
            foreach ($data as $element) {
                $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['rollnumber']);
                $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['course']);
                $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['specialization']);
                $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['semester']);
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['subjectname']);
                $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['Timestamp']);
                $rowCount++;
            }
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
            $objWriter->save('Save/'.$fileName);
        // download file
            header("Content-Type: application/vnd.ms-excel");
            redirect(base_url().'Save/'.$fileName);   
            }
		else
		 {
			redirect(base_url().'index.php/Admincontroller');			
		}     
        }
         public function createXLSsubject() {
             if($this->session->userdata('qwerty')!='')
		{
        $this->load->model('Report_model');
        // create file name
            $fileName = 'data-'.time().'.xlsx';  
        // load excel library
            $this->load->library('excel');
            require_once "././Classes/PHPExcel.php";    
            extract($_POST);
          
            $data=$this->Report_model->getelectivesubject($subjectname);  
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            // set Header
            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Roll number');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Course');
            $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Specilaization');
            $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'semester');
            $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Selected subject');
            $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Time stamp');       
            // set Row
            $rowCount = 2;
            foreach ($data as $element) {
                $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['rollnumber']);
                $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['course']);
                $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['specialization']);
                $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['semester']);
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['subjectname']);
                $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['Timestamp']);
                $rowCount++;
            }
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
            $objWriter->save('Save/'.$fileName);
        // download file
            header("Content-Type: application/vnd.ms-excel");
            redirect(base_url().'Save/'.$fileName);    
            }
		else
		 {
			redirect(base_url().'index.php/Admincontroller');			
		}         
        }
         


        function reportssubjectview()
        {
            if($this->session->userdata('qwerty')!='')
		{
            $this->load->model('Report_model');
            $data['subjects']=$this->Report_model->getsubjects();
            $this->load->view('Reportssubjects',$data);
            }
		else
		 {
			redirect(base_url().'index.php/Admincontroller');			
		}      
        }


       
   }
   



?>