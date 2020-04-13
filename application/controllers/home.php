<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

   public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');

        }

    function index()
    {

        $personId = $this->session->userdata('id');
        
        $data['title']="Home";

        $this->load->view('Templets/simpletemplet/header',$data);
        $this->load->view('other/dash');     
        $this->load->view('Templets/footer');
    }


}
?>