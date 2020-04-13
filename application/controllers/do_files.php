<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Do_files extends CI_Controller {

	 public function __construct()
	 	{
	 		parent::__construct();
	 		$this->load->model("file_model","files");
		 	// load url helper
		 	$this->load->helper('url');
	        // Load session
	        $this->load->library('session');

	        // Load Pagination library
			$this->load->library('pagination');
	
	 	}
 public function index(){
		redirect('do_files/loadRecord');
	}

	public function loadRecord($rowno=0){

		// Search text
		$search_text = "";
		if($this->input->post('submit') != NULL ){
			$search_text = $this->input->post('search');
			$this->session->set_userdata(array("search"=>$search_text));
		}else{
			if($this->session->userdata('search') != NULL){
				$search_text = $this->session->userdata('search');
			}
		}

		// Row per page
		$rowperpage = 5;

		// Row position
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		}
      	
      	// All records count
      	$allcount = $this->files->getrecordCount($search_text);

      	// Get  records
      	$users_record = $this->files->getData($rowno,$rowperpage,$search_text);
      	
      	// Pagination Configuration
      	$config['base_url'] = base_url().'index.php/do_files/loadRecord';
      	$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
		$config['full_tag_open'] = "<ul class='pagination'>";


        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');

        
        $this->pagination->initialize($config); // model function
		// Initialize
		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $users_record;
		$data['row'] = $rowno;
		$data['search'] = $search_text;
		$data['title'] = "Files";

		// Load view
		$this->load->view('Templets/simpletemplet/header',$data);
		$this->load->view('other/files');
		$this->load->view('Templets/footer');
	}
	public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->files->getRows(array('id' => $id));
            
            //file path
            $file = 'upload/file/'.$fileInfo['file_name'];
            
            //download file from directory
            force_download($file, NULL);
        }
    }

}