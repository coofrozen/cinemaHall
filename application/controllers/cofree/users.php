<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('users_model','users');

			
	 	}
	
	public function index()
	{
		$personId = $this->session->userdata('id');

		$data['profile_pic']=$this->users->get_profile_pic();
		$data['title']="users";


		if($this->session->userdata('is_logged_in')==True){
		$this->load->view('Templets/admintemplet/header',$data);
		$this->load->view('admin/users_view');
		$this->load->view('Templets/footer');

		}	
		else{
			redirect("home");
		}	


	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->users->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->name;
			$row[] = $person->username;
			$row[] = $person->type;
			if ($person->status == "1") {$row[] = "Active";}else{$row[] = "InActive";}
			$row[] = $person->email;
			$row[] = $person->phoneNo;
			$row[] = $person->date_created;
			$row[] = $person->date_updated;


			if($person->photo)
				$row[] = '<a href="'.base_url('upload/'.$person->photo).'" target="_blank"><i class="glyphicon glyphicon-paperclip"></i></a>';
			else
				$row[] = '(No photo)';

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->users->count_all(),
						"recordsFiltered" => $this->users->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->users->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$this->_check_availity();

		$user_name = "ethio".$this->input->post('oracle_id');
		
		$data = array(

					'username' => $user_name,
					'password' => sha1($user_name),
					'type' => $this->input->post('type'),
					'status' => $this->input->post('status'),
					'name' => $this->input->post('fullname'),
					'oracle_id' => $this->input->post('oracle_id'),
					'email' => $this->input->post('email'),
					'phoneNo' => $this->input->post('phoneNo'),
					'date_created' => date("y-m-d")
			);

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			$data['photo'] = $upload;
		}

		$insert = $this->users->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$this->_check_availity_update();

	$user_name = "ethio".$this->input->post('oracle_id');

		$data = array(

					'username' => $user_name,
					'password' => sha1($user_name),
					'type' => $this->input->post('type'),
					'status' => $this->input->post('status'),
					'name' => $this->input->post('fullname'),
					'oracle_id' => $this->input->post('oracle_id'),
					'email' => $this->input->post('email'),
					'phoneNo' => $this->input->post('phoneNo'),
					'date_updated' => date("y-m-d")
			);

		if($this->input->post('remove_photo')) // if remove photo checked
		{
			if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$person = $this->users->get_by_id($this->input->post('id'));
			if(file_exists('upload/'.$person->photo) && $person->photo)
				unlink('upload/'.$person->photo);

			$data['photo'] = $upload;
		}

		$this->users->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$person = $this->users->get_by_id($id);
		if(file_exists('upload/'.$person->photo) && $person->photo)
			unlink('upload/'.$person->photo);
		
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _check_availity(){
		$user_id = $this->input->post('oracle_id');
		$availabile = $this->users->check_id_availablity($user_id);
		if (count($availabile)>0) {
			$data['inputerror'][] = 'oracle_id';
			$data['error_string'][] = 'A duplicate user id encountered';
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
			}

	}

	private function _check_availity_update(){
		$user_id = $this->input->post('oracle_id');
		$row_id = $this->input->post('id');
		$availabile = $this->users->check_id_availablity_update($user_id,$row_id);
		if (count($availabile)>0) {
			$data['inputerror'][] = 'oracle_id';
			$data['error_string'][] = 'A duplicate user id encountered';
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
			}
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('type') == '')
		{
			$data['inputerror'][] = 'type';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('status') == '')
		{
			$data['inputerror'][] = 'status';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('fullname') == '')
		{
			$data['inputerror'][] = 'fullname';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('oracle_id') == '')
		{
			$data['inputerror'][] = 'oracle_id';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('phoneNo') == '')
		{
			$data['inputerror'][] = 'phoneNo';
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