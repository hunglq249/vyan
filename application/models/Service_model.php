<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Service_model extends Single_model{
	
	/**
	 * [$table description]
	 * @var string
	 */
	public $table = 'service';

	function __construct(){
		parent::__construct();
	}
	
    public function get_all_with_pagination_search($is_active = '',$order = 'desc', $limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select($this->table.'.*, service_category.title as category_title, service_category.slug as category_slug');
        $this->db->from($this->table);
        $this->db->join('service_category','service.category_id = service_category.id');
        $this->db->like($this->table.'.title', $keywords);
        $this->db->where($this->table.'.is_deleted', 0);
        if ( !empty($is_active) ) {
            $this->db->where($this->table.'.is_active', $is_active);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by($this->table.'.id', $order);

        return $result = $this->db->get()->result_array();
    }
    public function get_all_with_is_hot($is_active = '',$order = 'desc', $limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select($this->table.'.*, service_category.title as category_title, service_category.slug as category_slug');
        $this->db->from($this->table);
        $this->db->join('service_category','service.category_id = service_category.id');
        $this->db->like($this->table.'.title', $keywords);
        $this->db->where($this->table.'.is_deleted', 0);
        $this->db->where($this->table.'.is_hot', 1);
        if ( !empty($is_active) ) {
            $this->db->where($this->table.'.is_active', $is_active);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by($this->table.'.id', $order);

        return $result = $this->db->get()->result_array();
    }
}