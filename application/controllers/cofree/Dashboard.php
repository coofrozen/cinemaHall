<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

              $this->load->model('self_model','self');
              $this->load->model('unread_model','unread');    

          /*session checks */ 

    }

    Public function index()
    {

      $personId = $this->session->userdata('id');
      
      $data['unreadTotal'] =  $this->unread->count_all_unread($personId);
      $data['recordsTotal'] =  $this->self->count_all_self($personId);

      $data['title']="session";

      $this->load->view('Templets/admintemplet/header',$data);
    	$this->load->view('admin/dashboard');
      $this->load->view('Templets/footer');
    }
    public function modal_mode(){

      $data['title']="modal";

          $data['recordsTotal'] =  $this->self->count_all_self();

      $this->load->view('Templets/admintemplet/header',$data);
      $this->load->view('modal_mode_view');
      $this->load->view('Templets/footer');

    }
}
           
