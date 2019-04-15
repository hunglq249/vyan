<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include "class.phpmailer.php";
include "class.smtp.php";

/**
 * 
 */
class Subscribe extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
        $this->load->model('subscribe_model');
		$this->load->model('email_model');
		$this->load->helper('common_helper');
        $this->author_data = handle_author_common_data();
	}

	public function index(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $email = $this->email_model->get_by_id(1);
        $this->data['email'] = $email;

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('body', 'Nội dung', 'required');


        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post()) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'body' => $this->input->post('body'),
                );
                $update = $this->email_model->update(1,array_merge($data, $this->author_data));
                if ($update) {
                    $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                    redirect('admin/subscribe/index', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                    redirect('admin/subscribe/index', 'refresh');
                }
            }
        }

		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $this->data['keywords'] = $keywords;
        $total_rows  = $this->subscribe_model->count_search_table_subscribe($keywords);
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/subscribe/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $result = $this->subscribe_model->get_all_with_pagination_search_table_subscribe('desc', $per_page, $this->data['page'], $keywords);
        

        $this->data['result'] = $result;
		$this->render('admin/subscribe/index');
	}

	public function remove(){
        $id = $this->input->get('id');
        $detail = $this->subscribe_model->get_by_id($id);
        $data = array(
            'is_deleted' => 1
        );
        $update = $this->subscribe_model->update($id, $data);
        if ($update) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => true)));
        }
    }

    public function send_email_all(){
        $email_content = $this->email_model->get_by_id(1);

        $ids = $this->input->get('ids');
        $email = $this->subscribe_model->get_by_multiple_ids($ids);
        foreach ($email as $key => $value) {
            $this->send_mail($email_content, $value['email']);
        }
        return true;
    }


    public function send_mail($data, $email) {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // set mailer to use SMTP
        $mail->Host = "smtp.gmail.com"; // specify main and backup server
        $mail->Port = 465; // set the port to use
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->SMTPSecure = 'ssl';
        $mail->Username = "nghemalao@gmail.com"; // your SMTP username or your gmail username
        $mail->Password = "ghozqjiyuhyaocmx"; // your SMTP password or your gmail password
        $from = "nghemalao@gmail.com"; // Reply to this email
        $to = $email; // Recipients email ID
        $name = 'WEBMAIL'; // Recipient's name
        $mail->From = $from;
        $mail->FromName = $name; // Name to indicate where the email came from when the recepient received
        $mail->AddAddress($to, $name);
        $mail->CharSet = 'UTF-8';
        $mail->WordWrap = 50; // set word wrap
        $mail->IsHTML(true); // send as HTML
        $mail->Subject = "Mail từ Vyan.vn";

        $mail->Body = $this->email_template($data); //HTML Body

        // $mail->SMTPDebug = 2;

        if(!$mail->Send()){
            return false;
        } else {
            return true;
        }
    }

    public function email_template($data){
        $message = '<html><body>';
        $message .= '<p>'. $data['title'] .'</p>';
        $message .= '<p>'. $data['description'] .'</p>';
        $message .= $data['body'];
        $message .= "</body></html>";

        return $message;
    }
}
