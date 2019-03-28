<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Academy_model extends Single_model{
	
	/**
	 * [$table description]
	 * @var string
	 */
	public $table = 'academy';

	function __construct(){
		parent::__construct();
	}
    public function get_all_with_pagination_search($is_active = '',$order = 'desc', $limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select($this->table.'.*, academy_category.title as category_title, academy_category.slug as category_slug');
        $this->db->from($this->table);
        $this->db->join('academy_category','academy.category_id = academy_category.id');
        $this->db->like($this->table.'.title', $keywords);
        $this->db->where($this->table.'.is_deleted', 0);
        if ( !empty($is_active) ) {
            $this->db->where($this->table.'.is_active', $is_active);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by($this->table.'.id', $order);

        return $result = $this->db->get()->result_array();
    }
}