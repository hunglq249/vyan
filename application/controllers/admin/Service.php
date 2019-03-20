<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Service extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('service_model');
		$this->load->model('service_category_model');
		$this->load->helper('common_helper');
        $this->author_data = handle_author_common_data();
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index(){
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $this->data['keywords'] = $keywords;
        $total_rows  = $this->service_model->count_search('', $keywords);
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/service/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $result = $this->service_model->get_all_with_pagination_search('', 'desc', $per_page, $this->data['page'], $keywords);
        
        foreach ($result as $key => $value) {
        	$node_path = $value['node_path'];
            $node_path = explode('/', $node_path);
            $category_0 = $this->service_category_model->get_by_id($node_path[0]);
            $category_1 = $this->service_category_model->get_by_id($node_path[1]);
            $result[$key]['category_0'] = $category_0['title'];
            $result[$key]['category_1'] = $category_1['title'];
        }
        $this->data['result'] = $result;
		$this->render('admin/service/index');
	}

	public function detail($id){
        $detail = $this->service_model->get_by_id($id);
        
        $node_path = $detail['node_path'];
        $node_path = explode('/', $node_path);
        $category_0 = $this->service_category_model->get_by_id($node_path[0]);
        $category_1 = $this->service_category_model->get_by_id($node_path[1]);
        $detail['category_0'] = $category_0['title'];
        $detail['category_1'] = $category_1['title'];
        $tag = $detail['tag'];
        $tag = json_decode($tag);
        $detail['tag'] = $tag;
        $this->data['detail'] = $detail;
        $this->render('admin/service/detail');
    }

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $category = $this->service_category_model->get_by_level(0);
        foreach ($category as $key => $value) {
            $sub = $this->service_category_model->get_by_parent_id_when_active($value['id']);

            $sub = build_array_for_dropdown($sub);
            $category[$key]['sub'] = $sub;
        }
        $this->data['category'] = $category;
        
        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('parent_id', 'Danh mục', 'required');
        $this->form_validation->set_rules('image', 'Hình ảnh', 'callback_check_file');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/service/create');
        } else {
        	if ($this->input->post()) {
                if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                }
                $slug = $this->input->post('slug');
                $unique_slug = $this->service_model->build_unique_slug($slug);
                if(!file_exists('assets/upload/service/' . $unique_slug)){
                    mkdir('assets/upload/service/' . $unique_slug, 0777);
                }
                if ( !empty($_FILES['image']['name']) ) {
                    chmod('assets/upload/service/' . $unique_slug, 0777);
                    $images = $this->upload_image('image', 'assets/upload/service/' . $unique_slug, $_FILES['image']['name']);
                }
                $tag = $this->input->post('tag');
                if ( !empty($tag) && strpos($tag, ',') ) {
                	$tag = explode(',', $tag);
                	$tag = json_encode($tag);
                	
                }else{
                	$tag = json_encode(array($tag));
                }
                $parent = $this->service_category_model->get_by_id($this->input->post('parent_id'));
                $root = $this->service_category_model->get_by_id($parent['parent_id']);
                $node_path = $root['id'] . '/' .$this->input->post('parent_id');
                $data = array(
                    'image' => $images,
                    'slug' => $unique_slug,
                    'title' => $this->input->post('title'),
                    'category_id' => $this->input->post('parent_id'),
                    'node_path' => $node_path,
                    'tag' => $tag,
                    'meta_keywords' => $this->input->post('meta_keywords'),
                    'meta_description' => $this->input->post('meta_description'),
                    'iframe' => $this->input->post('iframe'),
                    'description' => $this->input->post('description'),
                    'body' => $this->input->post('body'),
                );
                $insert = $this->service_model->insert(array_merge($data, $this->author_data));
                if ($insert) {
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/service', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    redirect('admin/service/create');
                }
            }
        }
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit($id){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->service_model->get_by_id($id);
        if(empty($detail) || !is_numeric($id)){
            $this->session->set_flashdata('message_error', MESSAGE_ISSET_ERROR);
            redirect('admin/service');
        }
        $category = $this->service_category_model->get_by_level(0);
        foreach ($category as $key => $value) {
            $sub = $this->service_category_model->get_by_parent_id_when_active($value['id']);

            $sub = build_array_for_dropdown($sub);
            $category[$key]['sub'] = $sub;
        }
        $this->data['category'] = $category;
        $tag = $detail['tag'];
        $tag = json_decode($tag);
        $detail['tag'] = implode(',', $tag);
        $this->data['detail'] = $detail;


        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('parent_id', 'Danh mục', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/service/edit');
        }else{
            if ($this->input->post()) {
                if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                }

                $slug = $this->input->post('slug');
                $unique_slug = $detail['slug'];
                if ($slug != $unique_slug) {
                    $unique_slug = $this->service_model->build_unique_slug($slug);
                    if(file_exists('assets/upload/service/' . $detail['slug'])) {
                        chmod('assets/upload/service/' . $detail['slug'], 0777);
                        rename('assets/upload/service/' . $detail['slug'], 'assets/upload/service/' . $unique_slug);
                    }
                }
                if(!file_exists('assets/upload/service/' . $unique_slug)){
                    mkdir('assets/upload/service/' . $unique_slug, 0777);
                }
                if ( !empty($_FILES['image']['name']) ) {
                    chmod('assets/upload/service/' . $unique_slug, 0777);
                    $images = $this->upload_image('image', 'assets/upload/service/' . $unique_slug, $_FILES['image']['name']);
                }
                $tag = $this->input->post('tag');
                if ( !empty($tag) && strpos($tag, ',') ) {
                	$tag = explode(',', $tag);
                	$tag = json_encode($tag);
                	
                }else{
                	$tag = json_encode(array($tag));
                }
                $parent = $this->service_category_model->get_by_id($this->input->post('parent_id'));
                $root = $this->service_category_model->get_by_id($parent['parent_id']);
                $node_path = $root['id'] . '/' .$this->input->post('parent_id');
                $data = array(
                    'slug' => $unique_slug,
                    'title' => $this->input->post('title'),
                    'category_id' => $this->input->post('parent_id'),
                    'node_path' => $node_path,
                    'tag' => $tag,
                    'meta_keywords' => $this->input->post('meta_keywords'),
                    'meta_description' => $this->input->post('meta_description'),
                    'iframe' => $this->input->post('iframe'),
                    'description' => $this->input->post('description'),
                    'body' => $this->input->post('body'),
                );
                if ( !empty($_FILES['image']['name']) ) {
                    $data['image'] = $images;
                }
                $update = $this->service_model->update($id,array_merge($data, $this->author_data));
                if ($update) {
                    $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                    if(isset($images) && $images != $detail['image'] && file_exists('assets/upload/service/'.$unique_slug.'/'.$detail['image'])){
                        unlink('assets/upload/service/'.$unique_slug.'/'.$detail['image']);
                    }
                    redirect('admin/service/index', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                    redirect('admin/service/edit/' . $id);
                }
            }
        }
	}


    public function deactive(){
        $id = $this->input->get('id');
        $detail = $this->service_model->get_by_id($id);
        $data = array(
            'is_active' => 0
        );
        $update = $this->service_model->update($id, $data);
        if ($update) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => true)));
        }
    }

    public function active(){
        $id = $this->input->get('id');
        $data = array(
            'is_active' => 1
        );
        $update = $this->service_model->update($id, $data);
        if ($update) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => true)));
        }

    }

    public function remove(){
        $id = $this->input->get('id');
        $detail = $this->service_model->get_by_id($id);
        $data = array(
            'is_deleted' => 1
        );
        $update = $this->service_model->update($id, $data);
        if ($update) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => true)));
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
            redirect('admin/service');
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