<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {


	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
			if($this->session->userdata('is_logged_in')==False){
                redirect("Login");
            }
	 		$this->load->model('import_model','imp_mod');


	 	}
	
	public function index()
	{
		
		$data['title']="Reservation";

			$this->load->view('Templets/admintemplet/header',$data);
			$this->load->view('admin/reservation_view');
			$this->load->view('Templets/footer');
	
		}

		public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->imp_mod->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $site) {
			$no++;
			$row = array();
			if ($site->attendance == 0) {$row[] = "<i class='fas fa-user text-green'></i>";}else{$row[] = "<i class='fas fa-user-check text-red'></i>";}
			$row[] = $site->show_title;
			$row[] = $site->show_genrs;
			$row[] = $site->full_name;
			$row[] = $site->mobile_no;
			$row[] = $site->seat_info;
			$row[] = $site->payment_date;
			$row[] = $site->ticket_no;



			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_res('."'".$site->idr."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
				
			 
			$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_res('."'".$site->idr."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->imp_mod->count_all(),
						"recordsFiltered" => $this->imp_mod->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

		public function ajax_edit($id)
		{
			$data = $this->imp_mod->get_by_id($id);
			echo json_encode($data);
		}

		public function ne_update()
	{
		 $this->_validate();
			$data = array(

					'full_name' => $this->input->post('full_name'),
					'mobile_no' => $this->input->post('mobile_no'),
					'seat_info' => $this->input->post('seat_info'),
					'payment_date' => $this->input->post('payment_date'),
					'ticket_no' => $this->input->post('ticket_no'),
					'attendance' => $this->input->post('attendance')

				);
		$this->imp_mod->update(array('idr' => $this->input->post('idr')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ne_delete($id)
	{
		$this->imp_mod->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('full_name') == '')
		{
			$data['inputerror'][] = 'full_name';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('mobile_no') == '')
		{
			$data['inputerror'][] = 'mobile_no';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('seat_info') == '')
		{
			$data['inputerror'][] = 'seat_info';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('payment_date') == '')
		{
			$data['inputerror'][] = 'payment_date';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('ticket_no') == '')
		{
			$data['inputerror'][] = 'ticket_no';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('attendance') == '')
		{
			$data['inputerror'][] = 'attendance';
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