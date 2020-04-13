<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tt_list extends CI_Controller {

	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
			$this->load->model('import_model');

	 	}
	
	public function index()
		{
			$data['result_tt']=$this->import_model->get_tt_data();
			
			$data['title']="TT List";

	        $this->load->view('Templets/admintemplet/header',$data);
			$this->load->view('admin/tt_list_view',$data);
			$this->load->view('Templets/footer');

		}

	}
?>