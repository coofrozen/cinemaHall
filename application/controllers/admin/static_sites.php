<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Static_sites extends CI_Controller {


	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('sites_model');
	 		$this->load->model('self_model','self');
	 		$this->load->model('unread_model','unread');


	 	}
	
	public function index()
	{
			$personId = $this->session->userdata('id');
		
		$data['unreadTotal'] =  $this->unread->count_all_unread($personId);
		$data['recordsTotal'] =  $this->self->count_all_self($personId);
		
		$data['regions']=$this->sites_model->get_regions();
		$data['tepcircles']=$this->sites_model->get_tepcircles();
		$data['powertypes']=$this->sites_model->get_powertypes();
		$data['title']="Sites";

		if($this->session->userdata('staff_is_logged_in')==True){
		$this->load->view('Templets/stafftemplet/header',$data);
		}
		else if($this->session->userdata('super_is_logged_in')==True){
		$this->load->view('Templets/supertemplet/header',$data);
		}
		else if($this->session->userdata('man_is_logged_in')==True){
		$this->load->view('Templets/mantemplet/header',$data);
		$this->load->view('other/sites_view',$data);

		}
		else if($this->session->userdata('is_logged_in')==True){
		$this->load->view('Templets/admintemplet/header',$data);
		$this->load->view('admin/sites_view',$data);

		}		

		$this->load->view('Templets/footer');


		}

		public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->sites_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $site) {
			$no++;
			$row = array();
			if($this->session->userdata('is_logged_in')==True){
			$row[] = '<input type="checkbox" class="data-check" value="'.$site->id.'">';
			}	
			$row[] = '<td class="bg-success">'.$site->site_ID.'<td>';
			$row[] = $site->Site_Name;
			$row[] = $site->power_type;
			$row[] = $site->region_name;
			$row[] = $site->SLocation;
			$row[] = $site->Area;
			$row[] = $site->Site_Type;
			$row[] = $site->masked;
			$row[] = $site->Total_No_TRX;
			$row[] = $site->Total_no_cell;
			$row[] = $site->Tep_circle;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_site('."'".$site->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
				
				if($this->session->userdata('is_logged_in')==True){
			 
			$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_site('."'".$site->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
				}
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->sites_model->count_all(),
						"recordsFiltered" => $this->sites_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

		

		public function ne_add()
	{
				 $this->_validate();
			$data = array(

					'site_ID' => $this->input->post('site_ID'),
					'Site_Name' => $this->input->post('Site_Name'),
					'power_type' => $this->input->post('power_type'),
					'Region' => $this->input->post('Region'),
					'SLocation' => $this->input->post('SLocation'),
					'Area' => $this->input->post('Area'),
					'Site_Type' => $this->input->post('Site_Type'),
					'masked' => $this->input->post('masked'),
					'Total_No_TRX' => $this->input->post('Total_No_TRX'),
					'Total_no_cell' => $this->input->post('Total_no_cell'),
					'Tep_circle' => $this->input->post('Tep_circle')


				);
		$this->sites_model->ne_add($data);
		echo json_encode(array("status" => TRUE));
	}
		public function ajax_edit($id)
		{
			$data = $this->sites_model->get_by_id($id);
			echo json_encode($data);
		}

		public function ne_update()
	{
		 $this->_validate();
			$data = array(

					'site_ID' => $this->input->post('site_ID'),
					'Site_Name' => $this->input->post('Site_Name'),
					'power_type' => $this->input->post('power_type'),
					'Region' => $this->input->post('Region'),
					'SLocation' => $this->input->post('SLocation'),
					'Area' => $this->input->post('Area'),
					'Site_Type' => $this->input->post('Site_Type'),
					'masked' => $this->input->post('masked'),
					'Total_No_TRX' => $this->input->post('Total_No_TRX'),
					'Total_no_cell' => $this->input->post('Total_no_cell'),
					'Tep_circle' => $this->input->post('Tep_circle')

				);
		$this->sites_model->ne_update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ne_delete($id)
	{
		$this->sites_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_bulk_delete()
	{
		$list_id = $this->input->post('id');
		foreach ($list_id as $id) {
			$this->sites_model->delete_by_id($id);
		}
		echo json_encode(array("status" => TRUE));
	}
	
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('site_ID') == '')
		{
			$data['inputerror'][] = 'site_ID';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('Site_Name') == '')
		{
			$data['inputerror'][] = 'Site_Name';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('power_type') == '')
		{
			$data['inputerror'][] = 'power_type';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('Region') == '')
		{
			$data['inputerror'][] = 'Region';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('SLocation') == '')
		{
			$data['inputerror'][] = 'SLocation';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('Area') == '')
		{
			$data['inputerror'][] = 'Area';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('Site_Type') == '')
		{
			$data['inputerror'][] = 'Site_Type';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('masked') == '')
		{
			$data['inputerror'][] = 'masked';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('Total_No_TRX') == '')
		{
			$data['inputerror'][] = 'Total_No_TRX';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('Total_no_cell') == '')
		{
			$data['inputerror'][] = 'Total_no_cell';
			$data['error_string'][] = 'Field is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('Tep_circle') == '')
		{
			$data['inputerror'][] = 'Tep_circle';
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