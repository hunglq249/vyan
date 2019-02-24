<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model('banner_model');

	}

    public function index(){
        $this->data['banner'] = $this->banner_model->get_by_all_when_active();
        $this->render('homepage_view');
    }
}
