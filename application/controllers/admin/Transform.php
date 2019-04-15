<?php

/**
 * 
 */
class Transform extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('transform_model');
		$this->load->helper('common_helper');
        $this->author_data = handle_author_common_data();
	}

	public function index(){
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $this->data['keywords'] = $keywords;
        $total_rows  = $this->transform_model->count_search($keywords);
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/transform/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $result = $this->transform_model->get_all_with_pagination_search('','desc', $per_page, $this->data['page'], $keywords);
        $this->data['result'] = $result;
		$this->render('admin/transform/index');
	}

	public function detail($id){
        $detail = $this->transform_model->get_by_id($id);
        $this->data['detail'] = $detail;
        $this->render('admin/transform/detail');
    }

	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Họ tên', 'required');
//        $this->form_validation->set_rules('age', 'Tuổi', 'required|numeric|max_length[3]');
        $this->form_validation->set_rules('service', 'Dịch vụ', 'required');
        $this->form_validation->set_rules('title_basic', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_advanced', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('is_active', 'Trạng thái', 'required');
        $this->form_validation->set_rules('image_before', 'Hình ảnh trước của khách hàng', 'callback_check_imgae_before');
        $this->form_validation->set_rules('image_after', 'Hình ảnh sau của khách hàng', 'callback_check_imgae_after');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/transform/create');
        } else {
        	if ($this->input->post()) {
        		$slug = $this->input->post('slug');
                $unique_slug = $this->transform_model->build_unique_slug($slug);
        		if(!empty($_FILES['image_before']['name'])){
                    $this->check_img($_FILES['image_before']['name'], $_FILES['image_before']['size']);
                }

                if(!empty($_FILES['image_after']['name'])){
                    $this->check_img($_FILES['image_after']['name'], $_FILES['image_after']['size']);
                }

                if(!file_exists('assets/upload/transform/image_before')){
                    mkdir('assets/upload/transform/image_before', 0777);
                }

                if(!file_exists('assets/upload/transform/image_after')){
                    mkdir('assets/upload/transform/image_after', 0777);
                }

                if ( !empty($_FILES['image_before']['name']) ) {
                    chmod('assets/upload/transform/image_before', 0777);
                    $image_before = $this->upload_image('image_before', 'assets/upload/transform/image_before', $_FILES['image_before']['name']);
                }

                if ( !empty($_FILES['image_after']['name']) ) {
                    chmod('assets/upload/transform/image_after', 0777);
                    $image_after = $this->upload_image('image_after', 'assets/upload/transform/image_after', $_FILES['image_after']['name']);
                }

                $data = array(
                	'name' => $this->input->post('name'),
                	'service' => $this->input->post('service'),
                	'age' => 0,
                    'image_before' => $image_before,
                    'image_after' => $image_after,
                    'slug' => $unique_slug,
                    'title_basic' => $this->input->post('title_basic'),
                    'description_basic' => $this->input->post('description_basic'),
                    'body_basic' => $this->input->post('body_basic'),
                    'title_advanced' => $this->input->post('title_advanced'),
                    'description_advanced' => $this->input->post('description_advanced'),
                    'body_advanced' => $this->input->post('body_advanced'),
                    'is_active' => $this->input->post('is_active'),
                    'meta_keywords' => $this->input->post('meta_keywords'),
                    'meta_description' => $this->input->post('meta_description'),
                );
                $insert = $this->transform_model->insert(array_merge($data, $this->author_data));
                if ($insert) {
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/transform', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    redirect('admin/transform/create');
                }
        	}
        }
	}

	public function edit($id){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->transform_model->get_by_id($id);
        $this->data['detail'] = $detail;

        $this->form_validation->set_rules('name', 'Họ tên', 'required');
//        $this->form_validation->set_rules('age', 'Tuổi', 'required|numeric|max_length[3]');
        $this->form_validation->set_rules('service', 'Dịch vụ', 'required');
        $this->form_validation->set_rules('title_basic', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_advanced', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('is_active', 'Trạng thái', 'required');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/transform/edit');
        } else {
        	if ($this->input->post()) {
        		$slug = $this->input->post('slug');
                $unique_slug = $this->transform_model->build_unique_slug($slug);
        		if(!empty($_FILES['image_before']['name'])){
                    $this->check_img($_FILES['image_before']['name'], $_FILES['image_before']['size']);
                }

                if(!empty($_FILES['image_after']['name'])){
                    $this->check_img($_FILES['image_after']['name'], $_FILES['image_after']['size']);
                }

                if(!file_exists('assets/upload/transform/image_before')){
                    mkdir('assets/upload/transform/image_before', 0777);
                }

                if(!file_exists('assets/upload/transform/image_after')){
                    mkdir('assets/upload/transform/image_after', 0777);
                }

                if ( !empty($_FILES['image_before']['name']) ) {
                    chmod('assets/upload/transform/image_before', 0777);
                    $image_before = $this->upload_image('image_before', 'assets/upload/transform/image_before', $_FILES['image_before']['name']);
                }

                if ( !empty($_FILES['image_after']['name']) ) {
                    chmod('assets/upload/transform/image_after', 0777);
                    $image_after = $this->upload_image('image_after', 'assets/upload/transform/image_after', $_FILES['image_after']['name']);
                }

                $data = array(
                	'name' => $this->input->post('name'),
                	'service' => $this->input->post('service'),
                	'age' => 0,
                    'slug' => $unique_slug,
                    'title_basic' => $this->input->post('title_basic'),
                    'description_basic' => $this->input->post('description_basic'),
                    'body_basic' => $this->input->post('body_basic'),
                    'title_advanced' => $this->input->post('title_advanced'),
                    'description_advanced' => $this->input->post('description_advanced'),
                    'body_advanced' => $this->input->post('body_advanced'),
                    'is_active' => $this->input->post('is_active'),
                    'meta_keywords' => $this->input->post('meta_keywords'),
                    'meta_description' => $this->input->post('meta_description'),
                );

                if ( !empty($_FILES['image_before']['name']) ) {
                    $data['image_before'] = $image_before;
                }

                if ( !empty($_FILES['image_after']['name']) ) {
                    $data['image_after'] = $image_after;
                }

                $update = $this->transform_model->update($id,array_merge($data, $this->author_data));
                if ($update) {
                    $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                    if( isset($image_before) && $image_before != $detail['image_before'] && file_exists('assets/upload/transform/image_before/' . $detail['image_before']) && is_file('assets/upload/transform/image_before/' . $detail['image_before']) ){
                        unlink('assets/upload/transform/image_before/' . $detail['image_before']);
                    }

                    if( isset($image_after) && $image_after != $detail['image_after'] && file_exists('assets/upload/transform/image_after/' . $detail['image_after']) && is_file('assets/upload/transform/image_after/' . $detail['image_after']) ){
                        unlink('assets/upload/transform/image_after/' . $detail['image_after']);
                    }
                    redirect('admin/transform/index', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                    redirect('admin/transform/edit/' . $id);
                }
        	}
        }
	}

	public function active(){
		$id = $this->input->get('id');
        $detail = $this->transform_model->get_by_id($id);
        $data = array(
            'is_active' => 1
        );
        $update = $this->transform_model->update($id, $data);
        if ($update) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => true)));
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(HTTP_BAD_REQUEST)
            ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST,'message' => 'Bạn không thể kích hoạt bài viết này')));
	}

	public function deactive(){
        $id = $this->input->get('id');
        $detail = $this->transform_model->get_by_id($id);
        $data = array(
            'is_active' => 0
        );
        $update = $this->transform_model->update($id, $data);
        if ($update) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => true)));
        }
    }

	public function check_imgae_before(){
        $this->form_validation->set_message(__FUNCTION__, 'Vui lòng chọn hình ảnh trước của khách hàng.');
        if (!empty($_FILES['image_before']['name'][0])) {
            return true;
        }
        return false;
    }

    public function check_imgae_after(){
        $this->form_validation->set_message(__FUNCTION__, 'Vui lòng chọn hình ảnh sau của khách hàng.');
        if (!empty($_FILES['image_after']['name'][0])) {
            return true;
        }
        return false;
    }

    protected function check_img($filename, $filesize){
        $reponse = array(
            'csrf_hash' => $this->security->get_csrf_hash()
        );
        $map = strripos($filename, '.')+1;
        $fileextension = substr($filename, $map,(strlen($filename)-$map));
        if(!($fileextension == 'jpg' || $fileextension == 'jpeg' || $fileextension == 'png' || $fileextension == 'gif')  || $filesize > 1228800){
            $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
            redirect('admin/transform');
        }
    }
}