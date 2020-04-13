<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash_model extends CI_Model
{

	var $table = 'valid_per_regions';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

public function get_all_expinorder(){
	

	$this->db->from($this->table);
	$query=$this->db->get();
	return $query->result();

	}
	public function get_know_best()
	{
		$this->db->from('knowledge_share');
		$this->db->order_by("id","desc");
		$this->db->where('selected','best');
		$query=$this->db->get();
		return $query->result();
	}

	function get_date(){

	$this->db->select('now_date');	
	$this->db->from('knowledge_share');
	$query=$this->db->get();
	return $query->result();

	}

}
?>