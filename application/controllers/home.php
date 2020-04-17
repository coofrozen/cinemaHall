<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            if($this->session->userdata('staff_is_logged_in')==False){
                redirect("Login");
            }
            $this->load->model('import_model','reservs');
            $this->load->model('show_model','shows');
             
        }

    function index()
    {

        
        $data['title']="Home";
        $data['reserve_count'] = $this->reservs->count_all();
        $data['shows_count'] = $this->shows->count_all();


        $this->load->view('Templets/simpletemplet/header',$data);
        $this->load->view('other/dash');     
        $this->load->view('Templets/footer');
    }


}
?>