<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class file_model extends CI_Model{

    var $table = 'do_files';


 public function __construct() {
        parent::__construct(); 
        $this->load->database();
    }

    // Fetch records
    public function getData($rowno,$rowperpage,$search="") {
            
        $this->db->select('*');
        $this->db->from($this->table);

        if($search != ''){
            $this->db->like('title', $search);
            $this->db->or_like('file_name', $search);
        }

        $this->db->limit($rowperpage, $rowno);  
        $query = $this->db->get();
        
        return $query->result_array();
    }


       function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('id','desc');
        if(array_key_exists('id',$params) && !empty($params['id'])){
            $this->db->where('id',$params['id']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }


    // Select total records
    public function getrecordCount($search = '') {

        $this->db->select('count(*) as allcount');
        $this->db->from($this->table);
      
        if($search != ''){
            $this->db->like('title', $search);
            $this->db->or_like('file_name', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();
      
        return $result[0]['allcount'];
    }

}