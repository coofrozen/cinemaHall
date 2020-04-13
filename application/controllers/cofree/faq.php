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
    $personId = $this->session->userdata('id');
    

    $data['title']="FAQ";
    $data['faq']=$this->faq_model->get_all_faq();

    if($this->session->userdata('is_logged_in')==True){
    $this->load->view('Templets/admintemplet/header',$data);
    $this->load->view('admin/faq_view',$data);
    $this->load->view('Templets/footer');
    }
    else{
      reditect("home");
    }
    


    }
  public function faq_add()
    { 
    
      $data = array(

          'question' => ucfirst($this->input->post('Question')),
          'description' => ucfirst($this->input->post('Description')),

        );
      $insert = $this->faq_model->faq_add($data);
      echo json_encode(array("status" => TRUE));
    }
    public function ajax_edit($id)
    {
      $data = $this->faq_model->get_by_id($id);

      echo json_encode($data);
    }

    public function faq_update()
  {
   $data = array(

          'question' => ucfirst($this->input->post('Question')),
          'description' => ucfirst($this->input->post('Description')),
          
        );
    $this->faq_model->faq_update(array('id' => $this->input->post('id')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function faq_delete($id)
  {
    $this->faq_model->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
  }
}
?>