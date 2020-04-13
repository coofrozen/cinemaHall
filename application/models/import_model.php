<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_model extends CI_Model
{

	var $table = 'tt_history';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


// start to return number of rows

public function all_rows()
	{	
	$query = $this->db->get($this->table);
	return $query->num_rows();
	}


// pop of the table

public function push($data_excel)
	{
	$this->db->insert_batch($this->table,$data_excel);
	}

// start to truncate
public function truncate_tt()
	{	
	$this->db->truncate($this->table);
	}


public function upl_time($data){

		$this->db->insert("upl_time", $data);
		return $this->db->insert_id();		
	}

public function get_regions(){
				 $this->db->order_by("Region_Name");
		$query = $this->db->get("pure_regions");
		return $query->result();
	}

	public function get_tt_data(){
	
	$query = $this->db->query("select SUBSTR(rpt_staff_performance_tmp.current_handle_org,1,3) as new_job,
sum(case when sysdate - rpt_staff_performance_tmp.arrivel_date between 0 and 2 then 1 else 0 end)as gt2d,
sum(case when sysdate - rpt_staff_performance_tmp.arrivel_date between 2 and 3 then 1 else 0 end)as gt2d,
sum(case when sysdate - rpt_staff_performance_tmp.arrivel_date between 3 and 5 then 1 else 0 end)as gt3d,
sum(case when sysdate - rpt_staff_performance_tmp.arrivel_date > 5 then 1 else 0 end)as gt3d,
count(sysdate - rpt_staff_performance_tmp.arrivel_date)as Total_no_tt
from rpt_staff_performance_tmp  
where current_handle_org like 'SMC%'
or current_handle_org like 'NOC%'
or current_handle_org like 'FAN%'
or current_handle_org like 'O&M%'
or current_handle_org like 'CS%'
or current_handle_org like 'ENG%'
group by SUBSTR(rpt_staff_performance_tmp.current_handle_org,1,3);" );

	return $query->result();
	}
	

}