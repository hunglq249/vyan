<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends Public_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('subscribe_model');
        $this->load->helper('date');
    }

    public function register(){
        $request = $this->input->post();
        $data = array(
            'name' => $request['register_name'],
            'phone' => $request['register_phone'],
            'email' => $request['register_email'],
            'message' => $request['register_message'],
            'created_at' => now(),
        );

        $insert = $this->subscribe_model->insert($data);
        if ($insert) {
            $reponse = array(
                'status' => HTTP_SUCCESS,
                'result' => true,
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode($reponse));
        }
        return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_BAD_REQUEST)
                ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST, 'result' => false)));
    }
}
