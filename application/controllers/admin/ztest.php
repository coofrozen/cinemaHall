<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

              $this->load->model('self_model','self');
              $this->load->model('unread_model','unread');    

          /*session checks */ 
          if($this->session->userdata('is_logged_in')==False){
                redirect("Login");
          }

    }

    Public function index()
    {

      $personId = $this->session->userdata('id');
      
      $data['unreadTotal'] =  $this->unread->count_all_unread($personId);
      $data['recordsTotal'] =  $this->self->count_all_self($personId);

      $data['title']="session";

      $this->load->view('Templets/admintemplet/header',$data);
    	$this->load->view('admin/unit_test');
      $this->load->view('Templets/footer');
    }

}
           
