<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Import_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function importData($data) {

            $res = $this->db->insert_batch('studentdetails',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }

        }
        public function insertsub($data1){
          $res1=$this->db->insert('subjects',$data1);
          if($res1)
          {
            return true;
          }
          else {
            return false;
          }
        }
        public function updatesub($ID,$fromarray)
        {
          $this->db->where('ID',$ID);
          $this->db->update('subjects',$fromarray);
        }

    }
?>
