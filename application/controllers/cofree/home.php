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

        if($this->session->userdata('is_logged_in')==True){
            $this->load->view('Templets/admintemplet/header',$data);
            $this->load->view('admin/dash');   
        }
        else{
            redirect("home");
        }
 
        $this->load->view('Templets/footer');
        }
    


}
?>