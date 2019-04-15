<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Subscribe_model extends Single_model{
	
	/**
	 * [$table description]
	 * @var string
	 */
	public $table = 'subscribe';

	function __construct(){
		parent::__construct();
	}

	public function count_search_table_subscribe($keywords = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->group_start();
        $this->db->like('name', $keywords);
        $this->db->or_like('phone', $keywords);
        $this->db->or_like('email', $keywords);
        $this->db->group_end();

        return $result = $this->db->get()->num_rows();
    }


	public function get_all_with_pagination_search_table_subscribe($order = 'desc', $limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->group_start();
        $this->db->like('name', $keywords);
        $this->db->or_like('phone', $keywords);
        $this->db->or_like('email', $keywords);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        $this->db->order_by('id', $order);

        return $result = $this->db->get()->result_array();
    }
}