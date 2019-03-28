<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Why extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
        $this->load->model('why_model');
        $this->load->model('config_model');
		$this->load->model('commercial_model');
		$this->load->helper('common_helper');
        $this->author_data = handle_author_common_data();
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index(){
        $banner = $this->commercial_model->get_by_id(1);
        $this->data['banner'] = $banner;

		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $this->data['keywords'] = $keywords;
        $total_rows  = $this->why_model->count_search('', $keywords);
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/config/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $result = $this->why_model->get_all_with_pagination_search('', 'desc', $per_page, $this->data['page'], $keywords);

        $this->data['result'] = $result;
        $this->render('admin/why/index');
	}

	public function detail($id){
        $detail = $this->why_model->get_by_id($id);

        if(empty($detail) || !is_numeric($id)){
            $this->session->set_flashdata('message_error', MESSAGE_ISSET_ERROR);
            redirect('admin/why');
        }
        
        $this->data['detail'] = $detail;
        $this->render('admin/why/detail');
    }

	/**
     * [create description]
     * @return [type] [description]
     */
	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $icons = $this->config_model->get_by_key('icon');
        $this->data['icons_json'] = $icons['value'];
        if ($icons) {
            $icons = json_decode($icons['value'], true);
        }

        $this->data['icons'] = (array)$icons;

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('image', 'Hình ảnh', 'callback_check_file');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/why/create');
        } else {
            if ( $this->input->post() ) {
                if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                }
                $slug = $this->input->post('slug');
                $unique_slug = $this->why_model->build_unique_slug($slug);
                if(!file_exists('assets/upload/why/' . $unique_slug)){
                    mkdir('assets/upload/why/' . $unique_slug, 0777);
                }
                if ( !empty($_FILES['image']['name']) ) {
                    chmod('assets/upload/why/' . $unique_slug, 0777);
                    $images = $this->upload_image('image', 'assets/upload/why/' . $unique_slug, $_FILES['image']['name']);
                }

                $data = array(
                    'image' => $images,
                    'slug' => $unique_slug,
                    'title' => $this->input->post('title'),
                    'icon' => $this->input->post('icon'),
                    'is_active' => $this->input->post('is_active'),
                    'meta_keywords' => $this->input->post('meta_keywords'),
                    'meta_description' => $this->input->post('meta_description'),
                    'description' => $this->input->post('description'),
                    'body' => $this->input->post('body'),
                );
                $insert = $this->why_model->insert(array_merge($data, $this->author_data));
                if ($insert) {
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/why', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    redirect('admin/why/create');
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

        $detail = $this->why_model->get_by_id($id);

        if(empty($detail) || !is_numeric($id)){
            $this->session->set_flashdata('message_error', MESSAGE_ISSET_ERROR);
            redirect('admin/why');
        }
        $this->data['detail'] = $detail;

        $icons = $this->config_model->get_by_key('icon');
        $this->data['icons_json'] = $icons['value'];
        if ($icons) {
            $icons = json_decode($icons['value'], true);
        }

        $this->data['icons'] = (array)$icons;

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/why/edit');
        } else {
            if ( $this->input->post() ) {
                if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                }

                $slug = $this->input->post('slug');
                $unique_slug = $detail['slug'];
                if ($slug != $unique_slug) {
                    $unique_slug = $this->why_model->build_unique_slug($slug);
                    if(file_exists('assets/upload/why/' . $detail['slug'])) {
                        chmod('assets/upload/why/' . $detail['slug'], 0777);
                        rename('assets/upload/why/' . $detail['slug'], 'assets/upload/why/' . $unique_slug);
                    }
                }
                if(!file_exists('assets/upload/why/' . $unique_slug)){
                    mkdir('assets/upload/why/' . $unique_slug, 0777);
                }
                if ( !empty($_FILES['image']['name']) ) {
                    chmod('assets/upload/why/' . $unique_slug, 0777);
                    $images = $this->upload_image('image', 'assets/upload/why/' . $unique_slug, $_FILES['image']['name']);
                }

                $data = array(
                    'slug' => $unique_slug,
                    'title' => $this->input->post('title'),
                    'icon' => $this->input->post('icon'),
                    'is_active' => $this->input->post('is_active'),
                    'meta_keywords' => $this->input->post('meta_keywords'),
                    'meta_description' => $this->input->post('meta_description'),
                    'description' => $this->input->post('description'),
                    'body' => $this->input->post('body'),
                );
                if ( !empty($_FILES['image']['name']) ) {
                    $data['image'] = $images;
                }
                $update = $this->why_model->update($id,array_merge($data, $this->author_data));
                if ($update) {
                    $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                    if(isset($images) && $images != $detail['image'] && file_exists('assets/upload/why/'.$unique_slug.'/'.$detail['image'])){
                        unlink('assets/upload/why/'.$unique_slug.'/'.$detail['image']);
                    }
                    redirect('admin/why/index', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                    redirect('admin/why/edit/' . $id);
                }
            }
        }
    }


    /**
     * [deactive description]
     * @return [type] [description]
     */
    public function deactive(){
        $id = $this->input->get('id');
        $detail = $this->why_model->get_by_id($id);
        $data = array(
            'is_active' => 0
        );
        $update = $this->why_model->update($id, $data);
        if ($update) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => true)));
        }
    }

    /**
     * [active description]
     * @return [type] [description]
     */
    public function active(){
        $id = $this->input->get('id');
        $data = array(
            'is_active' => 1
        );
        $update = $this->why_model->update($id, $data);
        if ($update) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => true)));
        }

    }

    /**
     * [remove description]
     * @return [type] [description]
     */
    public function remove(){
        $id = $this->input->get('id');
        $detail = $this->why_model->get_by_id($id);
        $data = array(
            'is_deleted' => 1
        );
        $update = $this->why_model->update($id, $data);
        if ($update) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => true)));
        }

    }

    /**
     * [check_img description]
     * @param  [type] $filename [description]
     * @param  [type] $filesize [description]
     * @return [type]           [description]
     */
	protected function check_img($filename, $filesize){
        $reponse = array(
            'csrf_hash' => $this->security->get_csrf_hash()
        );
        $map = strripos($filename, '.')+1;
        $fileextension = substr($filename, $map,(strlen($filename)-$map));
        if(!($fileextension == 'jpg' || $fileextension == 'jpeg' || $fileextension == 'png' || $fileextension == 'gif')  || $filesize > 1228800){
            $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
            redirect('admin/why');
        }
    }

    /**
     * [check_file description]
     * @return [type] [description]
     */
    public function check_file(){
        $this->form_validation->set_message(__FUNCTION__, 'Vui lòng chọn ảnh.');
        if (!empty($_FILES['image']['name'][0])) {
            return true;
        }
        return false;
    }


    public function edit_commercial(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->commercial_model->get_by_id(1);
        $this->data['detail'] = $detail;

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/commercial/edit');
        } else {
            if ( $this->input->post() ) {
                if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                }

                if ( !empty($_FILES['image']['name']) ) {
                    if(!file_exists('assets/upload/why/commercial')) {
                        chmod('assets/upload/why/commercial', 0777);
                    }
                    $images = $this->upload_image('image', 'assets/upload/why/commercial', $_FILES['image']['name']);
                }

                $data = array(
                    'title' => $this->input->post('title'),
                    'is_active' => $this->input->post('is_active'),
                    'iframe' => $this->input->post('iframe'),
                    'description' => $this->input->post('description'),
                );
                if ( !empty($_FILES['image']['name']) ) {
                    $data['image'] = $images;
                }

                $update = $this->commercial_model->update(1, array_merge($data, $this->author_data));
                if ($update) {
                    $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                    if(isset($images) && $images != $detail['image'] && file_exists('assets/upload/why/commercial/' . $detail['image'])){
                        unlink('assets/upload/why/commercial/' . $detail['image']);
                    }
                    redirect('admin/why/index', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                    redirect('admin/commercial/edit/1');
                }
            }
        }
    }

    public function detail_commercial(){
        $detail = $this->commercial_model->get_by_id(1);

        if(empty($detail)){
            $this->session->set_flashdata('message_error', MESSAGE_ISSET_ERROR);
            redirect('admin/why');
        }
        
        $this->data['detail'] = $detail;
        $this->render('admin/commercial/detail');
    }    
}