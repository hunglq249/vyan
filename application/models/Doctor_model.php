<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Doctor_model extends Single_model{
	
	/**
	 * [$table description]
	 * @var string
	 */
	public $table = 'doctor';

	function __construct(){
		parent::__construct();
	}

    public function count_doctor_search($is_active = '', $keyword = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        if ( !empty($is_active) ) {
            $this->db->where('is_active', 1);
        }
        $this->db->where('is_deleted', 0);

        if($keyword != ''){
            $this->db->like('name', $keyword);
        }

        return $result = $this->db->get()->num_rows();
    }

	public function fetch_all_active_doctor_search($is_active = '', $order = 'desc', $limit = NULL, $start = NULL, $keyword = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        if ( !empty($is_active) ) {
            $this->db->where('is_active', 1);
        }
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', $order);

        if($keyword != ''){
            $this->db->like('name', $keyword);
        }

        return $result = $this->db->get()->result_array();
    }
}