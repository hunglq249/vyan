<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends Public_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('library_model');
        $this->image_library = array('title' => 'Hình ảnh', 'slug' => 'hinh-anh', 'type' => 1 ,'meta_keywords' =>'Thư viện hình ảnh', 'meta_description' => 'Thư viện hình ảnh', 'description' => 'Hình ảnh');
        $this->video_library = array('title' => 'Video', 'slug' => 'video', 'type' => 2 , 'meta_keywords' =>'Thư viện video', 'meta_description' => 'Thư viện video', 'description' => 'Video');
    }

    /**
     * [index description]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    // 2 tham số trên url
    public function index($slug_category,$slug){
        if($slug_category != 'hinh-anh' && $slug_category != 'video'){
            redirect('/','refresh');
        }
        $detail = $this->library_model->get_by_slug($slug);
        if ( !empty($detail) ) {
            $related = $this->library_model->get_related_library($detail['type'], $detail['id']);
            $this->data['detail'] = $detail;
            $this->data['metakeywords'] = $detail['meta_keywords'];
            $this->data['metadescription'] = $detail['meta_description'];
            $this->data['category'] = ($detail['type'] == 1) ?  $this->image_library : $this->video_library;
            $this->data['related'] = $related;
            $this->render('library_detail_view');
        }else{
            redirect('/','refresh');
        }
    }
    /**
     * [list description]
     * @return [type] [description]
     */
    public function list($slug){
        if($slug == 'hinh-anh'){
            $detail = $this->image_library;
        }elseif ($slug == 'video') {
            $detail = $this->video_library;
        }else{
            redirect('/','refresh');
        }
        $this->data['metakeywords'] = $detail['meta_keywords'];
        $this->data['metadescription'] = $detail['meta_description'];
        if ( !empty($detail) ) {

            $this->data['detail'] = $detail;
            $total_rows  = $this->library_model->count_by_type_when_active_library($detail['type']);
            $this->load->library('pagination');
            $config = array();
            $base_url = base_url('library/list/' . $slug);
            $per_page = 10;
            $uri_segment = 4;
            foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
                $config[$key] = $value;
            }
            $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $this->pagination->initialize($config);
            $this->data['page_links'] = $this->pagination->create_links();
            $result = $this->library_model->get_by_type_with_pagination_search($detail['type'], $per_page, $this->data['page']);
            $this->data['result'] = $result;
            $this->render('library_list_view');
        }else{
            redirect('/','refresh');
        }
    }

    public function list_all(){
        $this->data['metakeywords'] = 'Học viện Vyan';
        $this->data['metadescription'] = 'Học viện vyan';
        $total_rows  = $this->library_model->count_search(1);
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('library/list_all');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $result = $this->library_model->get_all_with_pagination_search(1, 'desc', $per_page, $this->data['page']);
        $this->data['result'] = $result;
        $this->render('library_list_all_view');
    }
}
