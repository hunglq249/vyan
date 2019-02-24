<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Service_category extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('service_category_model');
		$this->load->helper('common_helper');
        $this->author_data = handle_author_common_data();
	}

	public function index(){
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $this->data['keywords'] = $keywords;
        $total_rows  = $this->service_category_model->count_search_by_level(0, $keywords);
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/service_category/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $result = $this->service_category_model->get_all_with_pagination_search_by_level(0, 'desc', $per_page, $this->data['page'], $keywords);
        $this->data['result'] = $result;

		$this->render('admin/service_category/index');
	}

	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('image', 'Hình ảnh', 'callback_check_file');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/service_category/create');
        } else {
        	if ($this->input->post()) {
                if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                }
                $slug = $this->input->post('slug');
                $unique_slug = $this->service_category_model->build_unique_slug($slug);
                if(!file_exists('assets/upload/service_category/' . $unique_slug)){
                    mkdir('assets/upload/service_category/' . $unique_slug, 0777);
                }
                if ( !empty($_FILES['image']['name']) ) {
                    chmod('assets/upload/service_category/' . $unique_slug, 0777);
                    $images = $this->upload_image('image', 'assets/upload/service_category/' . $unique_slug, $_FILES['image']['name']);
                }
                $data = array(
                    'image' => $images,
                    'slug' => $unique_slug,
                    'title' => $this->input->post('title'),
                    'parent_id' => 0,
                    'level' => 0,
                    'meta_keywords' => $this->input->post('meta_keywords'),
                    'meta_description' => $this->input->post('meta_description'),
                    'description' => $this->input->post('description'),
                );
                $insert = $this->service_category_model->insert(array_merge($data, $this->author_data));
                if ($insert) {
                	$data = array(
                		'node_path' => '0/' . $insert . '/'
                	);
                	$this->service_category_model->update($insert, $data);
                    chmod('assets/upload/service_category/' . $unique_slug, 0755);
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/service_category', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    redirect('admin/service_category/create');
                }
            }
        }
	}

	public function detail($id){
        $detail = $this->service_category_model->get_by_id($id);
        $this->data['detail'] = $detail;
        $this->render('admin/service_category/detail');
    }

	public function edit($id){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->service_category_model->get_by_id($id);
        $this->data['detail'] = $detail;

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/service_category/edit');
        }else{
            if ($this->input->post()) {
                if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                }

                $slug = $this->input->post('slug');
                $unique_slug = $detail['slug'];
                if ($slug != $unique_slug) {
                    $unique_slug = $this->service_category_model->build_unique_slug($slug);
                    if(file_exists('assets/upload/service_category/' . $detail['slug'])) {
                        chmod('assets/upload/service_category/' . $detail['slug'], 0777);
                        rename('assets/upload/service_category/' . $detail['slug'], 'assets/upload/service_category/' . $unique_slug);
                    }
                }
                if(!file_exists('assets/upload/service_category/' . $unique_slug)){
                    mkdir('assets/upload/service_category/' . $unique_slug, 0777);
                }
                if ( !empty($_FILES['image']['name']) ) {
                    chmod('assets/upload/service_category/' . $unique_slug, 0777);
                    $images = $this->upload_image('image', 'assets/upload/service_category/' . $unique_slug, $_FILES['image']['name']);
                }

                $data = array(
                    'slug' => $unique_slug,
                    'title' => $this->input->post('title'),
                    'parent_id' => 0,
                    'level' => 0,
                    'meta_keywords' => $this->input->post('meta_keywords'),
                    'meta_description' => $this->input->post('meta_description'),
                    'description' => $this->input->post('description'),
                );
                if ( !empty($_FILES['image']['name']) ) {
                    $data['image'] = $images;
                }
                $update = $this->service_category_model->update($id,array_merge($data, $this->author_data));
                if ($update) {
                    chmod('assets/upload/service_category/' . $unique_slug, 0755);
                    $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                    if(isset($images) && $images != $detail['image'] && file_exists('assets/upload/service_category/'.$unique_slug.'/'.$detail['image'])){
                        unlink('assets/upload/service_category/'.$unique_slug.'/'.$detail['image']);
                    }
                    redirect('admin/service_category/index', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                    redirect('admin/service_category/edit/' . $id);
                }
            }
        }
	}

    

	protected function check_img($filename, $filesize){
        $reponse = array(
            'csrf_hash' => $this->security->get_csrf_hash()
        );
        $map = strripos($filename, '.')+1;
        $fileextension = substr($filename, $map,(strlen($filename)-$map));
        if(!($fileextension == 'jpg' || $fileextension == 'jpeg' || $fileextension == 'png' || $fileextension == 'gif'  || $filesize > 1228800)){
            $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
            redirect('admin/service_category');
        }
    }

    public function check_file(){
        $this->form_validation->set_message(__FUNCTION__, 'Vui lòng chọn ảnh.');
        if (!empty($_FILES['image']['name'][0])) {
            return true;
        }
        return false;
    }
}