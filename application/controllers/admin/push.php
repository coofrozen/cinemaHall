<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Push extends CI_Controller {

   public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('import_model');
             
        }

function index()
  {

    $data['title']="RESERVATION UPLOAD";
    $data['sub_title']="RESERVATION";
    $data['push_controller'] = "r_push";
    $data['logo']="favi.png";
    $data['row_number']=$this->import_model->all_rows();


    if($this->session->userdata('is_logged_in')==True){
        $this->load->view('Templets/admintemplet/header',$data);
        $this->load->view('admin/r_push_view');
        $this->load->view('Templets/footer');
    }   
    else redirect("Login");

    
  }


public function r_push(){

      $config = array(
        'upload_path' => FCPATH.'upload/excel_bulk/reservation_list/',
        'allowed_types' => 'csv'
    );
    $this->load->library('upload',$config);
    
    if ( ! $this->upload->do_upload('file'))
                {
            $this->session->set_flashdata("upload Failed",$this->upload->display_errors());
                }


    if ($this->upload->do_upload('file')){

        $file = $_FILES['file']['tmp_name'];
              $handle = fopen($file, "r");
              
              if ($handle) {
                  $c = 0;//


              while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
              {
                $full_name = $filesop[0];
                $mobile_no = $filesop[1];
                $seat_info = $filesop[2];
                $payment_date = $filesop[3];
                $ticket_no = $filesop[4];
                $show_identifier  = $filesop[5];
                if($c<>0){          //SKIP THE FIRST ROW
                      $this->import_model->push($full_name,$mobile_no,$seat_info,$payment_date,$ticket_no,$show_identifier);
                }
                $c = $c + 1;
              }
              $this->session->set_flashdata("upload Success","File Upload Successfully");
            } 
            else {
            $this->session->set_flashdata("upload Failed","unable to read file");
            }  
    }
            redirect('Admin/push');
  }

   public function download(){
 
            //load download helper
            $this->load->helper('download');

            //file path
            $file = 'upload/excel_bulk/sample/reservation_sample.csv';
            
            //download file from directory
            force_download($file, NULL);

    }

}
