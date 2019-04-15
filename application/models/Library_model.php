<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Library_model extends Single_model{
	
	/**
	 * [$table description]
	 * @var string
	 */
	public $table = 'library';

	function __construct(){
		parent::__construct();
	}
    public function get_all_with_pagination_library($is_active = '', $order = 'desc', $limit = NULL, $start = NULL, $type = '') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('type', $type);
        if ( !empty($is_active) ) {
            $this->db->where('is_active', $is_active);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('id', $order);

        return $result = $this->db->get()->result_array();
    }
    public function get_related_library($type, $id=''){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('type', $type);
        if ( !empty($id) ) {
            $this->db->where('id !=', $id);
        }
        $this->db->limit(3);
        return $result = $this->db->get()->result_array();
    }
    public function count_by_type_when_active_library($type){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 1);
        $this->db->where('type', $type);

        return $result = $this->db->get()->num_rows();
    }
    public function get_by_type_with_pagination_search($type, $limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 1);
        $this->db->where('type', $type);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');

        return $result = $this->db->get()->result_array();
    }
}