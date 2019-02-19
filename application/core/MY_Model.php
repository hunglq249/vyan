<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    public $table = '';
    public $table_lang = '';

    function __construct() {
        parent::__construct();
        $this->table_lang = $this->table . '_lang';
    }

    /**
     * [build_unique_slug description]
     * @param  [type] $slug [description]
     * @param  [type] $id   [description]
     * @return [type]       [description]
     */
    public function build_unique_slug($slug, $id = null){
        $count = 0;
        $temp_slug = $slug;
        while(true) {
            $this->db->select('id');
            $this->db->where('slug', $temp_slug);
            if($id != null){
                $this->db->where('id !=', $id);
            }
            $query = $this->db->get($this->table);
            if ($query->num_rows() == 0) break;
            $temp_slug = $slug . '-' . (++$count);
        }
        return $temp_slug;
    }

    /**
     * [insert description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    function insert($data) {
        $this->db->set($data)->insert($this->table);

        if ($this->db->affected_rows() == 1) {
            return $this->db->insert_id();
        }
        return false;
    }

    /**
     * [update description]
     * @param  [type] $id   [description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function update($id, $data){
         $this->db->where('id', $id);

        return $this->db->update($this->table, $data);
    }
}


/*=========================================
=            Multiple Language            =
=========================================*/

class Multiple_model extends MY_Model {


    function __construct() {
        parent::__construct();
        $this->load->model('about_model');
        $this->table_lang = $this->table . '_lang';
    }

    /**
     * @param $data
     * @return mixed
     */
    function insert_with_language($data){
        return $this->db->insert_batch($this->table_lang, $data);
    }

    /**
     * [get_all_with_pagination_search description]
     * @param  string $order    [description]
     * @param  string $lang     [description]
     * @param  [type] $limit    [description]
     * @param  [type] $start    [description]
     * @param  string $keywords [description]
     * @return [type]           [description]
     */
    public function get_all_with_pagination_search($order = 'desc',$lang = '', $limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select($this->table .'.*, '. $this->table_lang .'.title');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->like($this->table_lang .'.title', $keywords);
        $this->db->where($this->table .'.is_deleted', 0);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->limit($limit, $start);
        $this->db->group_by($this->table_lang .'.'. $this->table .'_id');
        $this->db->order_by($this->table .".id", $order);

        return $result = $this->db->get()->result_array();
    }

    /**
     * [get_all_with_pagination_and_sort_search description]
     * @param  string $order    [description]
     * @param  string $lang     [description]
     * @param  [type] $limit    [description]
     * @param  [type] $start    [description]
     * @param  string $keywords [description]
     * @return [type]           [description]
     */
    public function get_all_with_pagination_and_sort_search($order = 'desc',$lang = '', $limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select($this->table .'.*, '. $this->table_lang .'.title');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->like($this->table_lang .'.title', $keywords);
        $this->db->where($this->table .'.is_deleted', 0);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->limit($limit, $start);
        $this->db->group_by($this->table_lang .'.'. $this->table .'_id');
        $this->db->order_by($this->table .".sort", $order);

        return $result = $this->db->get()->result_array();
    }

    /**
     * [get_all_when_active description]
     * @param  string $order [description]
     * @param  string $lang  [description]
     * @return [type]        [description]
     */
    public function get_all_when_active($order = 'desc',$lang = '') {
        $this->db->select($this->table .'.*, '. $this->table_lang .'.title');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_active', 0);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->group_by($this->table_lang .'.'. $this->table .'_id');
        $this->db->order_by($this->table .".sort", $order);

        return $result = $this->db->get()->result_array();
    }

    /**
     * [get_all_with_pagination_and_special_join_category description]
     * @param  string $order    [description]
     * @param  string $lang     [description]
     * @param  [type] $limit    [description]
     * @param  [type] $start    [description]
     * @param  string $keywords [description]
     * @return [type]           [description]
     */
    public function get_all_with_pagination_and_special_join_category($order = 'desc',$lang = '', $limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select($this->table .'.*, '. $this->table_lang .'.*, '. $this->table .'_category_lang.title as '. $this->table .'_category_title');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->join($this->table .'_category_lang', ''. $this->table .'_category_lang.'. $this->table .'_category_id = '. $this->table .'.'. $this->table .'_category_id');
        $this->db->like($this->table_lang .'.title', $keywords);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_active', 0);
        $this->db->where($this->table .'.isspecial', 1);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
            $this->db->where($this->table .'_category_lang.language', $lang);
        }
        $this->db->limit($limit, $start);
        $this->db->group_by($this->table_lang .'.'. $this->table .'_id');

        return $result = $this->db->get()->result_array();
    }

    /**
     * [get_all_with_pagination_and_search_by_parent_id description]
     * @param  [type] $parent_id [description]
     * @param  string $order     [description]
     * @param  string $lang      [description]
     * @param  [type] $limit     [description]
     * @param  [type] $start     [description]
     * @param  string $keywords  [description]
     * @return [type]            [description]
     */
    public function get_all_with_pagination_and_search_by_parent_id($parent_id,$order = 'desc',$lang = '', $limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select($this->table .'.*, '. $this->table_lang .'.title');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->like($this->table_lang .'.title', $keywords);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.parent_id', $parent_id);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->limit($limit, $start);
        $this->db->group_by($this->table_lang .'.'. $this->table .'_id');
        $this->db->order_by($this->table .".sort", $order);

        return $result = $this->db->get()->result_array();
    }

    /**
     * [count_search description]
     * @param  string $lang    [description]
     * @param  string $keyword [description]
     * @return [type]          [description]
     */
    public function count_search($lang = '',$keyword = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->like($this->table_lang .'.title', $keyword);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->group_by($this->table_lang .'.'.$this->table.'_id');
        $this->db->where($this->table .'.is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }


    /**
     * [get_by_id description]
     * @param  [type] $id     [description]
     * @param  array  $select [description]
     * @param  string $lang   [description]
     * @return [type]         [description]
     */
    public function get_by_id($id, $select = array(), $lang = '') {
        $this->db->query('SET SESSION group_concat_max_len = 10000000');
        $this->db->select($this->table .'.*');
        if(in_array('title', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_title');
        }
        if(in_array('description', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_description');
        }
        if(in_array('content', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_content');
        }
        if(in_array('metakeywords', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metakeywords ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_metakeywords');
        }
        if(in_array('metadescription', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metadescription ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_metadescription');
        }
        if($select == null){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_title');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_description');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_content');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metakeywords ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_metakeywords');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metadescription ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_metadescription');
        }
        
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id', 'left');
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.id', $id);
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }

    /**
     * [get_by_id_wo_lang description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function get_by_id_wo_lang($id){
        $this->db->from($this->table);
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    /**
     * [common_update description]
     * @param  [type] $id   [description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function common_update($id, $data) {
        $this->db->where('id', $id);

        return $this->db->update($this->table, $data);
    }

    /**
     * [multiple_update_by_ids description]
     * @param  array  $ids  [description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function multiple_update_by_ids($ids = array(), $data) {
        $this->db->where_in('id', $ids);

        return $this->db->update($this->table, $data);
    }

    public function multiple_update_by_category_ids($category_ids = array(), $data) {
        $this->db->where_in($this->table .'_category_id', $category_ids);

        return $this->db->update($this->table, $data);
    }

    /**
     * [count_active description]
     * @return [type] [description]
     */
    public function count_active(){
        $query = $this->db->from($this->table)->where('is_active', 1)->get();
        return $query->num_rows();
    }

    /**
     * [get_by_multiple_ids description]
     * @param  array  $id   [description]
     * @param  string $lang [description]
     * @return [type]       [description]
     */
    public function get_by_multiple_ids($id = array(), $lang = '') {
        $this->db->query('SET SESSION group_concat_max_len = 10000000');
        $this->db->select($this->table .'.*, '.$this->table_lang .'.*');
        
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id', 'left');
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where_in($this->table .'.'. $this->table .'_category_id', $id);
        
        return $this->db->get()->result_array();
    }

    /**
     * [update_with_language description]
     * @param  [type] $id       [description]
     * @param  [type] $language [description]
     * @param  [type] $data     [description]
     * @return [type]           [description]
     */
    function update_with_language($id, $language,  $data){
        $this->db->where($this->table .'_id', $id);
        $this->db->where('language', $language);
        return $this->db->update($this->table_lang, $data);
    }

    /**
     * [get_total_by_parent_id description]
     * @param  [type] $parent_id [description]
     * @return [type]            [description]
     */
    public function get_total_by_parent_id($parent_id){
        $this->db->where(['parent_id' =>  $parent_id, 'is_deleted' => 0]);
        return $this->db->count_all_results($this->table);
    }

    /**
     * [find_rows description]
     * @param  array  $data [description]
     * @return [type]       [description]
     */
    public function find_rows($data=array()){
        $this->db->where($data);
        return $this->db->count_all_results($this->table);
    }

    /**
     * [find description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function find($id){
        $this->db->where(array('id' => $id,'is_deleted' => 0));
        return $this->db->get($this->table)->row_array();
    }
}

/*=====  End of Multiple Language  ======*/



/*=======================================
=            Single Language            =
=======================================*/

class Single_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }


    /**
     * [get_all_with_pagination_search description]
     * @param  string $order    [description]
     * @param  [type] $limit    [description]
     * @param  [type] $start    [description]
     * @param  string $keywords [description]
     * @return [type]           [description]
     */
    public function get_all_with_pagination_search($order = 'desc', $limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('title', $keywords);
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', $order);

        return $result = $this->db->get()->result_array();
    }

    /**
     * [get_all_when_active description]
     * @param  string $order [description]
     * @return [type]        [description]
     */
    public function get_all_when_active($order = 'desc') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 0);
        $this->db->order_by('id', $order);

        return $result = $this->db->get()->result_array();
    }

    /**
     * [count_search description]
     * @param  string $keyword [description]
     * @return [type]          [description]
     */
    public function count_search($keyword = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('title', $keyword);
        $this->db->where('is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

    /**
     * [get_by_id description]
     * @param  string $id [description]
     * @return [type]     [description]
     */
    public function get_by_id($id=''){
        $this->db->from($this->table);
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    /**
     * [count_active description]
     * @return [type] [description]
     */
    public function count_active(){
        $this->db->from($this->table);
        $this->db->where('is_active', 1);
        $this->db->get();
        return $this->db->num_rows();
    }


    public function get_by_parent_id_when_active($parent_id, $order = 'desc'){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 0);
        if(is_numeric($parent_id)){
            $this->db->where('parent_id', $parent_id);
        }
        
        $this->db->order_by("id", $order);

        return $result = $this->db->get()->result_array();
    }

    public function get_by_node_path($id, $level = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        if ( !empty($level) ) {
            $this->db->where_in('level', $level);
        }
        $this->db->like('node_path', '/' . $id . '/');

        return $result = $this->db->get()->result_array();
    }

    public function count_by_node_path($id, $level = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        if ( !empty($level) ) {
            $this->db->where_in('level', $level);
        }
        $this->db->like('node_path', '/' . $id . '/');

        return $result = $this->db->get()->num_rows();
    }
    
    public function get_by_node_path_when_active($id, $level = array()){
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where('is_deleted', 0);
            $this->db->where('is_active', 0);
            if ( !empty($level) ) {
                $this->db->where_in('level', $level);
            }
            $this->db->like('node_path', '/' . $id . '/');

            return $result = $this->db->get()->result_array();
        }

    /*================================
    =            Muntiple Ids            =
    ================================*/
    
    /**
     * [get_by_multiple_ids description]
     * @param  array  $ids [description]
     * @return [type]      [description]
     */
    public function get_by_multiple_ids($ids = array()) {
        $this->db->select('*');
        
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where_in('id', $ids);
        
        return $this->db->get()->result_array();
    }

    public function update_multiple_by_ids($ids = array(), $data) {
        $this->db->where_in('id', $ids);

        return $this->db->update_batch($this->table, $data, 'status');
    }

    public function insert_multiple_by_ids($data){
        $this->db->set($data);
        return $this->db->insert_batch($this->table);
    }
    
    /*=====  End of Muntiple Ids ======*/

    /*=============================
    =            Level            =
    =============================*/
    
    /**
     * [get_by_level description]
     * @param  [type] $level [description]
     * @return [type]        [description]
     */
    public function get_by_level($level){
        $this->db->select('*');
        
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('level', $level);
        
        return $this->db->get()->result_array();
    }

    /**
     * [get_all_with_pagination_search_by_level description]
     * @param  [type] $level    [description]
     * @param  string $order    [description]
     * @param  [type] $limit    [description]
     * @param  [type] $start    [description]
     * @param  string $keywords [description]
     * @return [type]           [description]
     */
    public function get_all_with_pagination_search_by_level($level, $order = 'desc', $limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('title', $keywords);
        $this->db->where('is_deleted', 0);
        $this->db->where('level', $level);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', $order);

        return $result = $this->db->get()->result_array();
    }

    /**
     * [count_search_by_level description]
     * @param  [type] $level   [description]
     * @param  string $keyword [description]
     * @return [type]          [description]
     */
    public function count_search_by_level($level, $keyword = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('title', $keyword);
        $this->db->where('is_deleted', 0);
        $this->db->where('level', $level);

        return $result = $this->db->get()->num_rows();
    }
    
    /*=====  End of Level  ======*/
    
}

/*=====  End of Single Language  ======*/


