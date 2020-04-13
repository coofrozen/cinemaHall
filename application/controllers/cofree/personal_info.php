<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_info extends CI_Controller {

public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('users_model');

			

	 	}
	
	public function index()
	{
		$personId = $this->session->userdata('id');
		
		$data['title']="Personal Info";

		if($this->session->userdata('staff_is_logged_in')==True){
		$this->load->view('Templets/stafftemplet/header',$data);
		}
		else if($this->session->userdata('super_is_logged_in')==True){
		$this->load->view('Templets/supertemplet/header',$data);
		}
		else if($this->session->userdata('man_is_logged_in')==True){
		$this->load->view('Templets/mantemplet/header',$data);
		$this->load->view('other/personal_info',$data);

		}
		else if($this->session->userdata('is_logged_in')==True){
		$this->load->view('Templets/admintemplet/header',$data);
		$this->load->view('admin/personal_info',$data);
		}
		
		$this->load->view('Templets/footer');

		}
	
		public function ajax_edit($id)
		{
			$data = $this->users_model->get_by_id($id);

			echo json_encode($data);
		}




		public function password_update()
	{
		$oldpass = sha1($this->input->post('oldpass'));
		$newpass = $this->input->post('newpass');
		$confpass = $this->input->post('confirmpass');

		if ($confpass != $newpass) {
			alert('password Does not match');
		}
		else if ($oldpass != $this->users_model->get_pass()) {
			alert('Wrong password');
		}
			$data = array(

					'password' => sha1($this->input->post('newpass')),
					'date_updated' => date("y-m-d"),

				);
		$this->users_model->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}


}
?>