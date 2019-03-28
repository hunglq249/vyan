<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Public_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('news_model');
    }

    /**
     * [index description]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public function index($slug){
    	$detail = $this->news_model->get_by_slug($slug);
        $this->data['metakeywords'] = $detail['meta_keywords'];
        $this->data['metadescription'] = $detail['meta_description'];
        if ( !empty($detail) ) {
            $related = $this->news_model->get_related_not_category($detail['id']);
            $this->data['detail'] = $detail;
            $this->data['related'] = $related;
            $this->render('news_detail_view');
        }else{
            redirect('/','refresh');
        }
    }

    public function list_all(){
        $this->data['metakeywords'] = 'Bài viết';
        $this->data['metadescription'] = 'Bài viết';
        $total_rows  = $this->news_model->count_search(1);
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('news/list_all');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $result = $this->news_model->get_all_with_pagination_search(1, 'desc', $per_page, $this->data['page']);
        $this->data['result'] = $result;
        $this->render('news_list_all_view');
    }
}
