<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends Public_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('message_model');
        $this->load->helper('date_helper');
    }

    /**
     * [index description]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public function register(){
        foreach ($_POST['data'] as $key => $value) {
            $form[$value['name']] = $value['value'];
        }
        $data = array(
            'title' => $form['register_name'],
            'phone' => $form['register_phone'],
            'email' => $form['register_email'],
            'content' => $form['register_message'],
            'created_at' => now(),
        );
        $insert = $this->message_model->insert($data);
        if ($insert) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => true)));
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(HTTP_BAD_REQUEST)
            ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST,'message' => 'Đăng ký thất bại')));
    }
}
