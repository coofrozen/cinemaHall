<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shows extends CI_Controller {


   public function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      if($this->session->userdata('staff_is_logged_in')==False){
                redirect("Login");
      }
      $this->load->model('show_model','sho_mod');


    }
  
  public function index()
  {
    
    $data['title']="Shows";
    $data['show_genere']=$this->sho_mod->show_all_genrs();

      $this->load->view('Templets/simpletemplet/header',$data);
      $this->load->view('other/show_view');
      $this->load->view('Templets/footer');

    }

    public function ajax_list()
  {
    $this->load->helper('url');

    $list = $this->sho_mod->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $site) {
      $no++;
      $row = array();
      
      $row[] = $site->id;
      $row[] = $site->load_time;
      $row[] = $site->show_title;
      $row[] = $site->show_iden;
      $row[] = $site->show_genrs;
      $row[] = $site->show_start_date;
      $row[] = $site->show_end_date;


      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sho_mod->count_all(),
            "recordsFiltered" => $this->sho_mod->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }



}
?>