<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model('banner_model');
        $this->load->model('service_model');
	}

    public function index(){
        $this->data['banner'] = $this->banner_model->get_by_all_when_active();
	 	$list_service = $this->service_model->get_all_with_pagination_search('desc', 9, 0);
	 	$this->data['list_service'] = $list_service;
        $this->render('homepage_view');
    }
}
