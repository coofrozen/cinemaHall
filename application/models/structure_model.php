<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Structure_model extends CI_Model
{

	var $table = 'nosm_struct';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


public function get_all_struct()
{

$this->db->from($this->table);
$query=$this->db->get();
return $query->result();
}

//////////////////////////////////////////////////////////////////////////////


}
