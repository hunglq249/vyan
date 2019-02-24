<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends Public_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('service_model');
        $this->load->model('service_category_model');
    }

    public function list(){
        $this->render('service_list_view');
    }

    public function index($slug){
    	$detail = $this->service_model->get_by_slug($slug);
    	$category = $this->service_category_model->get_by_id($detail['id']);
    	$related = $this->service_model->get_related($detail['category_id'], $detail['id']);
    	$this->data['detail'] = $detail;
    	$this->data['category'] = $category;
    	$this->data['related'] = $related;
        $this->render('service_detail_view');
    }
}
