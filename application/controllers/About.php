<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Public_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('about_model');
        $this->load->model('about_category_model');
    }

    /**
     * [index description]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public function index($slug){
    	$detail = $this->about_model->get_by_slug($slug);
        if ( !empty($detail) ) {
            $category = $this->about_category_model->get_by_id($detail['category_id']);
            $related = $this->about_model->get_related($detail['category_id'], $detail['id']);
            $this->data['detail'] = $detail;
            $this->data['category'] = $category;
            $this->data['related'] = $related;
            $this->render('about_detail_view');
        }else{
            redirect('/','refresh');
        }
    }

    /**
     * [list description]
     * @return [type] [description]
     */
    public function list($slug){
        $detail = $this->about_category_model->get_by_slug($slug);
        if ( !empty($detail) ) {
            $this->data['detail'] = $detail;
            $total_rows  = $this->about_model->count_by_category_id_when_active($detail['id']);
            $this->load->library('pagination');
            $config = array();
            $base_url = base_url('about/list/' . $slug);
            $per_page = 10;
            $uri_segment = 4;
            foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
                $config[$key] = $value;
            }
            $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $this->pagination->initialize($config);
            $this->data['page_links'] = $this->pagination->create_links();
            $result = $this->about_model->get_by_category_id_with_pagination_search($detail['id'], $per_page, $this->data['page']);
            $this->data['result'] = $result;
            $this->render('about_list_view');
        }else{
            redirect('/','refresh');
        }
    }

    public function list_all(){
        $total_rows  = $this->about_model->count_search(1);
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('about/list_all');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $result = $this->about_model->get_all_with_pagination_search(1, 'desc', $per_page, $this->data['page']);
        $this->data['result'] = $result;
        $this->render('about_list_all_view');
    }
}
