<?php 

/**
* 
*/
class Doctor extends Admin_Controller{
	private $request_language_template = array(
        'title', 'description'
    );
    private $author_data = array();

	function __construct(){
		parent::__construct();
		$this->load->model('doctor_model');

        $this->load->helper('common_helper');
        $this->author_data = handle_author_common_data();
	}

    public function index(){
        $keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $this->data['keywords'] = $keywords;
        $total_rows  = $this->doctor_model->count_doctor_search('', $keywords);
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/doctor/index');
        $per_page = 100;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $result = $this->doctor_model->fetch_all_active_doctor_search('', 'desc', $per_page, $this->data['page'], $keywords);

        $this->data['result'] = $result;

        $this->render('admin/doctor/index');
    }

    /**
     * [create description]
     * @return [type] [description]
     */
	public function create(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Họ tên', 'required');
        $this->form_validation->set_rules('image', 'Hình ảnh', 'callback_check_file');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/doctor/create');
        } else {
            if ($this->input->post()) {
                if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                }
                if(!file_exists('assets/upload/doctor/')){
                    mkdir('assets/upload/doctor/', 0777);
                }
                $images = $this->upload_image('image', 'assets/upload/doctor/', $_FILES['image']['name']);
                $data = array(
                    'image' => $images,
                    'name' => $this->input->post('name'),
                    'title' => $this->input->post('title'),
                    'biography' => $this->input->post('biography'),
                );
                $insert = $this->doctor_model->insert(array_merge($data, $this->author_data));
                if ($insert) {
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/doctor', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    redirect('admin/doctor/create');
                }
            }
        }
	}

    public function detail($id){
        $detail = $this->doctor_model->get_by_id($id);
        $this->data['detail'] = $detail;
        $this->render('admin/doctor/detail');
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->doctor_model->get_by_id($id);
        if(empty($detail) || !is_numeric($id)){
            $this->session->set_flashdata('message_error', MESSAGE_ISSET_ERROR);
            redirect('admin/doctor');
        }
        $this->data['detail'] = $detail;


        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/doctor/edit');
        }else{
            if ($this->input->post()) {
                if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                }

                if(!file_exists('assets/upload/doctor')){
                    mkdir('assets/upload/doctor/', 0777);
                }
                if ( !empty($_FILES['image']['name']) ) {
                    $images = $this->upload_image('image', 'assets/upload/doctor', $_FILES['image']['name']);
                }
                $data = array(
                    'name' => $this->input->post('name'),
                    'title' => $this->input->post('title'),
                    'biography' => $this->input->post('biography'),
                );
                if ( !empty($_FILES['image']['name']) ) {
                    $data['image'] = $images;
                }
                $update = $this->doctor_model->update($id,array_merge($data, $this->author_data));
                if ($update) {
                    $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                    if(isset($images) && $images != $detail['image'] && file_exists('assets/upload/doctor/' . $detail['image'])){
                        unlink('assets/upload/doctor/' . $detail['image']);
                    }
                    redirect('admin/doctor/index', 'refresh');
                }else{
                    $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                    redirect('admin/doctor/edit/' . $id);
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
        $detail = $this->doctor_model->get_by_id($id);
        $data = array(
            'is_active' => 0
        );
        $update = $this->doctor_model->update($id, $data);
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
        $update = $this->doctor_model->update($id, $data);
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
        $detail = $this->doctor_model->get_by_id($id);
        $data = array(
            'is_deleted' => 1
        );
        $update = $this->doctor_model->update($id, $data);
        if ($update) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'result' => true)));
        }

    }


    /**
     * [build_parent_title description]
     * @param  [type] $parent_id [description]
     * @return [type]            [description]
     */
    protected function build_parent_title($parent_id){
        $sub = $this->product_category_model->get_by_id($parent_id, array('title'));

        if($parent_id != 0){
            $title = explode('|||', $sub['product_category_title']);
            $sub['title_en'] = $title[0];
            $sub['title_vi'] = $title[1];

            $title = $sub['title_vi'];
        }else{
            $title = 'Danh mục gốc';
        }
        return $title;
    }
    protected function check_img($filename, $filesize){
        $reponse = array(
            'csrf_hash' => $this->security->get_csrf_hash()
        );
        $map = strripos($filename, '.')+1;
        $fileextension = substr($filename, $map,(strlen($filename)-$map));
        if(!($fileextension == 'jpg' || $fileextension == 'jpeg' || $fileextension == 'png' || $fileextension == 'gif')  || $filesize > 1228800){
            $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
            redirect('admin/doctor');
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