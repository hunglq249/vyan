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

    public function count_doctor_search($keyword = ''){
        $this->db->select('*')
            ->from($this->table)
            ->where('is_actived', 1)
            ->where('is_deleted', 0);

        if($keyword != ''){
            $this->db->like('name', $keyword);
        }

        return $result = $this->db->get()->num_rows();
    }

	public function fetch_all_active_doctor_search($order = 'desc', $limit = NULL, $start = NULL, $keyword = ''){
        $this->db->select('*')
            ->from($this->table)
            ->where('is_actived', 1)
            ->where('is_deleted', 0)
            ->limit($limit, $start)
            ->order_by('id', $order);

        if($keyword != ''){
            $this->db->like('name', $keyword);
        }

        return $result = $this->db->get()->result_array();
    }
}