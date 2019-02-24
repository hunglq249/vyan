<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Service_category_sub_1 extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
        $this->load->model('service_category_model');
		$this->load->model('service_model');
		$this->load->helper('common_helper');
        $this->author_data = handle_author_common_data();
	}

	public function index(){
        $category = $this->service_category_model->get_by_level(0);
        $category = build_array_for_dropdown($category);
        $this->data['category'] = $category;

		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $this->data['keywords'] = $keywords;
        $total_rows  = $this->service_category_model->count_search_by_level(1, $keywords);
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/service_category_sub_1/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $result = $this->service_category_model->get_all_with_pagination_search_by_level(1, 'desc', $per_page, $this->data['page'], $keywords);
        $this->data['result'] = $result;

		$this->render('admin/service_category_sub_1/index');
	}

	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $category = $this->service_category_model->get_by_level(0);
        $category = build_array_for_dropdown($category);
        unset($category[0]);
        $this->data['category'] = $category;

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('parent_id', 'Danh mục', 'required');
        $this->form_validation->set_rules('image', 'Hình ảnh', 'callback_check_file');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/service_category_sub_1/create');
        } else {
        	if ($this->input->post()) {
                if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                }
                $slug = $this->input->post('slug');
                $unique_slug = $this->service_category_model->build_unique_slug($slug);
                if(!file_exists('assets/upload/service_category_sub_1/' . $unique_slug)){
                    mkdir('assets/upload/service_category_sub_1/' . $unique_slug, 0777);
                }
                if ( !empty($_FILES['image']['name']) ) {
                    chmod('assets/upload/service_category_sub_1/' . $unique_slug, 0777);
                    $images = $this->upload_image('image', 'assets/upload/service_category_sub_1/' . $unique_slug, $_FILES['image']['name']);
                }
                $data = array(
                    'image' => $images,
                    'slug' => $unique_slug,
                    'title' => $this->input->post('title'),
                    'parent_id' => $this->input->post('parent_id'),
                    'level' => 1,
                    'meta_keywords' => $this->input->post('meta_keywords'),
                    'meta_description' => $this->input->post('meta_description'),
                    'description' => $this->input->post('description'),
                );
                $insert = $this->service_category_model->insert(array_merge($data, $this->author_data));
                if ($insert) {
                	$parent_detail = $this->service_category_model->get_by_id($this->input->post('parent_id'));
                    $data = array(
                        'node_path' => $parent_detail['node_path'] . $insert . '/'
                    );
                	$this->service_category_model->update($insert, $data);
                    chmod('assets/upload/service_category_sub_1/' . $unique_slug, 0755);
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/service_category_sub_1', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    redirect('admin/service_category_sub_1/create');
                }
            }
        }
	}

	public function detail($id){
        $detail = $this->service_category_model->get_by_id($id);
        $category = $this->service_category_model->get_by_id($detail['parent_id']);
        $detail['category'] = $category['title'];
        $this->data['detail'] = $detail;
        $this->render('admin/service_category_sub_1/detail');
    }

	public function edit($id){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $category = $this->service_category_model->get_by_level(0);
        $category = build_array_for_dropdown($category);
        unset($category[0]);
        $this->data['category'] = $category;
        $detail = $this->service_category_model->get_by_id($id);
        $this->data['detail'] = $detail;

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');

        if ($this->form_validation->run() == FALSE) {
                $this->render('admin/service_category_sub_1/edit');
            }else{
                if ($this->input->post()) {
                    if(!empty($_FILES['image']['name'])){
                        $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                    }

                    $slug = $this->input->post('slug');
                    $unique_slug = $detail['slug'];
                    if ($slug != $unique_slug) {
                        $unique_slug = $this->service_category_model->build_unique_slug($slug);
                        if(file_exists('assets/upload/service_category_sub_1/' . $detail['slug'])) {
                            chmod('assets/upload/service_category_sub_1/' . $detail['slug'], 0777);
                            rename('assets/upload/service_category_sub_1/' . $detail['slug'], 'assets/upload/service_category_sub_1/' . $unique_slug);
                        }
                    }
                    if(!file_exists('assets/upload/service_category_sub_1/' . $unique_slug)){
                        mkdir('assets/upload/service_category_sub_1/' . $unique_slug, 0777);
                    }
                    if ( !empty($_FILES['image']['name']) ) {
                        chmod('assets/upload/service_category_sub_1/' . $unique_slug, 0777);
                        $images = $this->upload_image('image', 'assets/upload/service_category_sub_1/' . $unique_slug, $_FILES['image']['name']);
                    }

                    $data = array(
                        'slug' => $unique_slug,
	                    'title' => $this->input->post('title'),
	                    'parent_id' => $this->input->post('parent_id'),
                        'level' => 1,
	                    'meta_keywords' => $this->input->post('meta_keywords'),
	                    'meta_description' => $this->input->post('meta_description'),
	                    'description' => $this->input->post('description'),
                    );
                    $parent_detail = $this->service_category_model->get_by_id($this->input->post('parent_id'));
                    $data['node_path'] = $parent_detail['node_path'] . $id . '/';
                    if ( !empty($_FILES['image']['name']) ) {
                        $data['image'] = $images;
                    }
                    $update = $this->service_category_model->update($id,array_merge($data, $this->author_data));
                    if ($update) {
                        chmod('assets/upload/service_category_sub_1/' . $unique_slug, 0755);
                        $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                        if(isset($images) && $images != $detail['image'] && file_exists('assets/upload/service_category_sub_1/'.$unique_slug.'/'.$detail['image'])){
                            unlink('assets/upload/service_category_sub_1/'.$unique_slug.'/'.$detail['image']);
                        }
                        redirect('admin/service_category_sub_1/index', 'refresh');
                    }else{
                        $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                        redirect('admin/service_category_sub_1/edit/' . $id);
                    }
                }
            }

		
	}

    public function deactive(){
        $id = $this->input->get('id');
        $detail = $this->service_category_model->get_by_id($id);
        switch ($detail['level']) {
            case 1:
                $category = $this->service_category_model->get_by_node_path($id, array(2, 3));
                break;

            case 2:
                $category = $this->service_category_model->get_by_node_path($id, array(3));
                break;
            case 3:
                $category = $this->service_category_model->get_by_node_path($id);
                break;
            default:
                
                break;
        }
        $ids = array($id);
        $data = array(
            'is_active' => 0
        );
        foreach ($category as $key => $value) {
            $ids[] = $value['id'];
        }
        foreach ($ids as $key => $value) {
            $this->service_category_model->update($value, $data);
        }
    }

    public function active(){
        $id = $this->input->get('id');
        $data = array(
            'is_active' => 1
        );
        $this->service_category_model->update($id, $data);

    }

    public function remove(){
        $id = $this->input->get('id');
        $detail = $this->service_category_model->get_by_id($id);
        $data = array(
            'is_deleted' => 1
        );
        $total = $this->service_model->count_by_category_id($id);
        if ( $total > 0 ) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => false)));
        }else{
            $update = $this->service_category_model->update($id, $data);
            if ($update) {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(HTTP_SUCCESS)
                    ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => true)));
            }
            
        } 

    }

	protected function check_img($filename, $filesize){
        $reponse = array(
            'csrf_hash' => $this->security->get_csrf_hash()
        );
        $map = strripos($filename, '.')+1;
        $fileextension = substr($filename, $map,(strlen($filename)-$map));
        if(!($fileextension == 'jpg' || $fileextension == 'jpeg' || $fileextension == 'png' || $fileextension == 'gif')  || $filesize > 1228800){
            $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
            redirect('admin/service_category_sub_1');
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