<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Push extends CI_Controller {

   public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('import_model');
             
        }

function index()
  {

    $data['title']="TT PUSH";
    $data['sub_title']="CURRENT TT";
    $data['push_controller'] = "tt_push";
    $data['logo']="huawei.png";
    $data['row_number']=$this->import_model->all_rows();

    $this->load->view('Templets/admintemplet/header',$data);
    $this->load->view('admin/tt_push_view',$data);
    $this->load->view('Templets/footer');


  }

public function tt_push(){

      $config = array(
        'upload_path' => FCPATH.'upload/excel_bulk/tt/',
        'allowed_types' => '*'
    );
    $this->load->library('upload',$config);

    
    if ( ! $this->upload->do_upload('file'))
                {
            
            $this->session->set_flashdata("upload Failed",$this->upload->display_errors());
               
                }


    if ($this->upload->do_upload('file')){
        $data=$this->upload->data();
        @chmod($data['full_path'], 0777);

        $this->load->library('spreadsheet_excel_reader');
        $this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

        $this->spreadsheet_excel_reader->read($data['full_path']);
        $sheets = $this->spreadsheet_excel_reader->sheets[0];
        error_reporting(0);

          $data_excel= array();
            for ($i = 2; $i <= $sheets['numRows']; $i++) {
              if ($sheets['cells'][$i][4] == '') break;
              
              $titlesub = substr($sheets['cells'][$i][1],0, 30)." ...";

              
              $data_excel[$i - 1]['job'] = $sheets['cells'][$i][4];
              $data_excel[$i - 1]['title'] = $titlesub;
              $data_excel[$i - 1]['handler'] = $sheets['cells'][$i][5];
              $data_excel[$i - 1]['alarm_occ_time'] = date("Y-m-d H:i:s",strtotime($sheets['cells'][$i][12]));

            }
            $data = array(
              'time' =>  date("Y-m-d H:i:s",strtotime("1 hour"))
            );

            $this->import_model->upl_time($data);
            $this->import_model->push($data_excel,$table);

            $this->session->set_flashdata("upload Success","File Upload Successfully");
            @unlink($data['full_path']);
           
    }
            redirect('cofree/push');
  }

   public function download(){
 
            //load download helper
            $this->load->helper('download');

            //file path
            $file = 'upload/excel_bulk/sample/tt_sample.xls';
            
            //download file from directory
            force_download($file, NULL);

    }

   public function truncate(){

    $this->import_model->truncate_tt();
    echo json_encode(array("status" => TRUE));

  }




}
