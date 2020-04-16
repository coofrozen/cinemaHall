<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_model extends CI_Model
{
	var $table = 'reservations';
	var $column_order = array( 'load_time', 'full_name', 'mobile_no', 'seat_info', 'payment_date', 'ticket_no'); //set column field database for datatable orderable
	var $column_search = array('full_name','mobile_no','ticket_no'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id' => 'desc'); // default order 


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


// populate the table

public function push($full_name,$mobile_no,$seat_info,$payment_date,$ticket_no)
	{
		$query="INSERT INTO reservations (id, load_time, full_name, mobile_no, seat_info, payment_date, ticket_no) values('','','$full_name','$mobile_no','$seat_info','$payment_date','$ticket_no')";
		$this->db->query($query);
		
	}


public function upl_time($data){

		$this->db->insert("upl_time", $data);
		return $this->db->insert_id();		
}

private function _get_datatables_query()
	{
		$this->db->select();
		$this->db->from('reservations l');


		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
	

}