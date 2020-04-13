<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Structure extends CI_Controller {

   public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('structure_model','struct');

        }

    function index()
    {
        
        $data['title']="Structure";
        $data['structure']=$this->struct->get_all_struct();

        $this->load->view('Templets/simpletemplet/header',$data);
        $this->load->view('other/chart_gojs');     
        $this->load->view('Templets/footer');
    }


}
?>