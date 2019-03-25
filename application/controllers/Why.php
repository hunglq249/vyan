<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Why extends Public_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('why_model');
    }

    /**
     * [index description]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public function index($slug){
    	$detail = $this->why_model->get_by_slug($slug);
        if ( !empty($detail) ) {
            $this->data['detail'] = $detail;
            $this->data['related'] = $this->why_model->get_related_not_category($detail['id']);
            $this->render('why_detail_view');
        }else{
            redirect('/','refresh');
        }
    }
}
