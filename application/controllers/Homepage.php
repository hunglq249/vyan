<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {
	public function __construct(){
		parent::__construct();
    $this->load->model('banner_model');
		$this->load->model('service_model');
        $this->load->model('doctor_model');
        $this->load->model('transform_model');
        $this->load->model('customer_model');
        $this->load->model('why_model');
        $this->load->model('commercial_model');
        $this->load->library('session');
	}

    public function index(){
        $this->data['banner'] = $this->banner_model->get_by_all_when_active();
    	$list_service = $this->service_model->get_all_with_pagination_search('','desc', 9, 0);
    	$this->data['list_service'] = $list_service;
        $this->data['doctors'] = $this->doctor_model->fetch_all_active_doctor_search();
        $this->data['transform'] = $this->transform_model->get_by_all_when_active();
        $this->data['customer'] = $this->customer_model->get_by_all_when_active();
        $this->data['why'] = $this->why_model->get_all_with_pagination_search(1, 'desc', 4);
        $this->data['commercial'] = $this->commercial_model->get_by_id(1);
        // echo '<pre>';
        // print_r($this->data['commercial']);die;
        
        $this->render('homepage_view');
	}

    public function get_intro_article(){
        $id = $this->input->get('id');
        $is_session = $this->input->get('is_session');
        if ( $is_session == 'false' ) {
            $transform_id = $this->session->userdata('transform_id');
            if ( !isset($transform_id) ) {
                $this->session->set_userdata('transform_id', $id);
            }else{
                if ( $transform_id != $id ) {
                    $transform = $this->transform_model->get_by_id($id);
                    $this->session->set_userdata('transform_id', $id);
                    if ($transform) {
                        return $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(HTTP_SUCCESS)
                            ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => $transform)));
                    }
                    return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(HTTP_BAD_REQUEST)
                    ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
                }
                return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(HTTP_SUCCESS)
                        ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => '')));
            }
        }else{
            $this->session->set_userdata('transform_id', $id);
            $transform = $this->transform_model->get_by_id($id);
                    $this->session->set_userdata('transform_id', $id);
                    if ($transform) {
                        return $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(HTTP_SUCCESS)
                            ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => $transform)));
                    }
                    return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(HTTP_BAD_REQUEST)
                    ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
        }
    }
}
