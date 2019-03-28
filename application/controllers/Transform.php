<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transform extends Public_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('transform_model');
    }

    /**
     * [index description]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public function index($slug){
    	$detail = $this->transform_model->get_by_slug($slug);
        if ( !empty($detail) ) {
            $this->data['detail'] = $detail;
            $this->data['metakeywords'] = $detail['meta_keywords'];
            $this->data['metadescription'] = $detail['meta_description'];
            $this->render('transform_detail_view');
        }else{
            redirect('/','refresh');
        }
    }
}
