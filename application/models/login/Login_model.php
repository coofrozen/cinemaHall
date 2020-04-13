<?php

class Login_model extends CI_Model {


	var $table = "user_login";


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


    /**
    * Validate the login's data with the database
    * @param string $username
    * @param string $password
    * @return void
    */

    /*Check Login*/
   	function validate($username, $password)
	{
		$this->db->where('status',1);
		$this->db->where('password', $password);
		$this->db->where('username', $username);
		$query = $this->db->get($this->table);
		return $query->result();	
	}

	/*Get Session values */
		
	function get_id($username, $password)
	{
		
		$this->db->where('password', $password);
		$this->db->where('username', $username);	
		return $this->db->get($this->table)->result();
				
	}
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}
		
}