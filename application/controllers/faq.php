<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

   public function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('faq_model');
      
    }
  
  public function index()
  {
    
    $data['title']="FAQ";
    $data['faq']=$this->faq_model->get_all_faq();

    $this->load->view('Templets/simpletemplet/header',$data);
    $this->load->view('other/faq_view',$data);
    $this->load->view('Templets/footer');


    }
}
?>