<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shows extends CI_Controller {


   public function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('show_model','sho_mod');


    }
  
  public function index()
  {
    
    $data['title']="Shows";
    $data['show_genere']=$this->sho_mod->show_all_genrs();

    if($this->session->userdata('is_logged_in')==True){
      $this->load->view('Templets/admintemplet/header',$data);
      $this->load->view('admin/show_view');
      $this->load->view('Templets/footer');
    }   
    else redirect("Login");
    
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
      if($this->session->userdata('is_logged_in')==True){
      $row[] = '<input type="checkbox" class="data-check" value="'.$site->id.'">';
      } 
      $row[] = '<td class="bg-success">'.$site->load_time.'<td>';
      $row[] = $site->show_title;
      $row[] = $site->show_identifier;
      $row[] = $site->show_genrs;
      $row[] = $site->show_start_date;
      $row[] = $site->show_end_date;



      //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_show('."'".$site->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
        
        if($this->session->userdata('is_logged_in')==True){
       
      $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_show('."'".$site->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
        }
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

    

  public function show_add()
  {
         $this->_validate();
      $data = array(

          'show_title' => ucfirst($this->input->post('show_title')),
          'show_genrs' => $this->input->post('show_genrs'),
          'show_start_date' => $this->input->post('show_start_date'),
          'show_end_date' => $this->input->post('show_end_date')

        );
    $this->sho_mod->save($data);
    echo json_encode(array("status" => TRUE));
  }
    public function ajax_edit($id)
    {
      $data = $this->sho_mod->get_by_id($id);
      echo json_encode($data);
    }

    public function show_update()
  {
     $this->_validate();
      $data = array(

          'show_title' => ucfirst($this->input->post('show_title')),
          'show_genrs' => $this->input->post('show_genrs'),
          'show_start_date' => $this->input->post('show_start_date'),
          'show_end_date' => $this->input->post('show_end_date')

        );
    $this->sho_mod->update(array('id' => $this->input->post('id')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function show_delete($id)
  {
    $this->sho_mod->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_bulk_delete()
  {
    $list_id = $this->input->post('id');
    foreach ($list_id as $id) {
      $this->sho_mod->delete_by_id($id);
    }
    echo json_encode(array("status" => TRUE));
  }
  
  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('show_title') == '')
    {
      $data['inputerror'][] = 'show_title';
      $data['error_string'][] = 'Field is required';
      $data['status'] = FALSE;
    }

    if($this->input->post('show_genrs') == '')
    {
      $data['inputerror'][] = 'show_genrs';
      $data['error_string'][] = 'Field is required';
      $data['status'] = FALSE;
    }

   
    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }



}
?>