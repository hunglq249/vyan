<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $data = array();
    protected $author_info = array();
    protected $page_languages = array('vi', 'en');
    protected $langAbbreviation = 'vi';

    function __construct() {
        parent::__construct();

        $this->data['page_title'] = 'Template';
        $this->data['before_head'] = '';
        $this->data['before_body'] = '';
    }

    protected function render($the_view = NULL, $template = 'master') {
        if ($template == 'json' || $this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        } else {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
            $this->load->view('templates/' . $template . '_view', $this->data);
        }
    }

    protected function pagination_config($base_url, $total_rows, $per_page, $uri_segment) {
        $config['base_url'] = $base_url;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = $uri_segment;
        $config['prev_link'] = 'Prev';
        $config['next_link'] = 'Next';
        $config['total_rows'] = $total_rows;
        $config['reuse_query_string'] = true;
        return $config;
    }

    function return_api($status, $message='', $data = null,$isExisted= true){
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($status)
            ->set_output(json_encode(array('status' => $status,'message' => $message , 'reponse' => $data, 'isExisted' => $isExisted)));
    }

}

class Admin_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->data['page_languages'] = array('vi' => 'Tiếng Việt', 'en' => 'English');

        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('admin/user/login', 'refresh');
        }
        $this->data['user_email'] = $this->ion_auth->user()->row()->username;
        $this->data['username'] = $this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name;
        $this->data['page_title'] = 'Administrator area';

        // Set timezone
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        // Insert author informations to database when insert, update or delete
        $this->author_info = array(
            'created_at' => date('Y-m-d H:i:s', now()),
            'created_by' => $this->ion_auth->user()->row()->username,
            'updated_at' => date('Y-m-d H:i:s', now()),
            'updated_by' => $this->ion_auth->user()->row()->username
        );
    }

    /**
     * [render description]
     * @param  [type] $the_view [description]
     * @param  string $template [description]
     * @return [type]           [description]
     */
    protected function render($the_view = NULL, $template = 'admin_master') {
        parent::render($the_view, $template);
    }

    /**
     * [upload_image description]
     * @param  [type] $image_input_id [description]
     * @param  string $upload_path    [description]
     * @param  string $image_name     [description]
     * @return [type]                 [description]
     */
    protected function upload_image($image_input_id ,$upload_path = '', $image_name = '' ) {
        $image = '';
        if (!empty($image_name)) {
            $config = $this->config_file($upload_path);
            $config['file_name'] = $image_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload($image_input_id)) {
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];
            }
        }

        return $image;
    }

    /**
     * [upload_multiple_image description]
     * @param  string $upload_path [description]
     * @param  string $file_name   [description]
     * @return [type]              [description]
     */
    protected function upload_multiple_image($upload_path = '', $file_name = '') {
        $config = $this->config_file($upload_path);

        $image = '';
        $file = $_FILES[$file_name];
        $count = count($file['name']);
        $image_list = array();
        $config_thumb = array();

        for ($i = 0; $i < $count; $i++) {

            $_FILES['userfile']['name'] = $file['name'][$i];
            $_FILES['userfile']['type'] = $file['type'][$i];
            $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];
            $_FILES['userfile']['error'] = $file['error'][$i];
            $_FILES['userfile']['size'] = $file['size'][$i];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload()) {
                $data = $this->upload->data();
                $image_list[] = $data['file_name'];
                $image = $data['file_name'];
                
            }
        }
        return $image_list;
    }

    /**
     * [config_file description]
     * @param  string $upload_path [description]
     * @return [type]              [description]
     */
    function config_file($upload_path = '') {
        $config = array();
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1200';
        $config['encrypt_name'] = TRUE;
       // $config['max_width']     = '1028';
       // $config['max_height']    = '1028';
        return $config;
    }

    /**
     * [return_api description]
     * @param  [type]  $status    [description]
     * @param  string  $message   [description]
     * @param  [type]  $data      [description]
     * @param  boolean $isExisted [description]
     * @return [type]             [description]
     */
    function return_api($status, $message='', $data = null,$isExisted= true){
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($status)
            ->set_output(json_encode(array('status' => $status,'message' => $message , 'reponse' => $data, 'isExisted' => $isExisted)));
    }
}

class Public_Controller extends MY_Controller {
    public $category_root;
    public $category_by_root_1;
    public $category_by_root_2;
    public $category_by_root_3;
    public $category_academy;
    public $category_about;
    public $category_news;
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('service_category_model');
        $this->load->model('academy_category_model');
        $this->load->model('academy_model');
        $this->load->model('about_category_model');
        $this->load->model('about_model');
        $this->load->model('news_model');
        $this->load->model('service_model');
        $this->load->model('contact_model');
        $this->load->model('library_model');
        $this->data['contact'] = $this->contact_model->get_by_id(1);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $this->langAbbreviation = $this->session->userdata('langAbbreviation') ? $this->session->userdata('langAbbreviation') : 'vi';
        if($this->langAbbreviation == 'vi' || $this->langAbbreviation == 'en' || $this->langAbbreviation == ''){
            $this->session->set_userdata('langAbbreviation', $this->langAbbreviation);
        }

        if($this->session->userdata('langAbbreviation') == 'vi'){
            $langName = 'vietnamese';
            $this->config->set_item('vietnamese', $langName);
            $this->session->set_userdata("langAbbreviation",'vi');
            $this->lang->load('vietnamese_lang', 'vietnamese');
        }

        if($this->session->userdata('langAbbreviation') == 'en' || $this->session->userdata('langAbbreviation') == ''){
            $langName = 'english';
            $this->config->set_item('language', $langName);
            $this->session->set_userdata("langAbbreviation",'en');
            $this->lang->load('english_lang', 'english');
        }

        /**
         *
         * Get Category for menu
         *
         */
        $category_root = $this->get_category_root();
        $this->category_root = $category_root;
        $this->category_by_root_1 = $this->get_category_level_and_parent(1, $category_root[0]['id']);
        $this->category_by_root_2 = $this->get_category_level_and_parent(1, $category_root[1]['id']);
        $this->category_by_root_3 = $this->get_category_level_and_parent(1, $category_root[2]['id']);

        /**
        *
        *
        *Get Category Academy for menu
        *
        */
        $this->category_academy = $this->get_menu_academy();
        $this->category_about = $this->get_menu_about();
        $this->category_news = $this->news_model->get_all_with_pagination_search(1,'desc','',0);



        /**
        *
        *
        *Get Library for menu
        *
        */
        $this->library_image = $this->library_model->get_all_with_pagination_library(1,'desc',8,0,1);
        $this->library_video = $this->library_model->get_all_with_pagination_library(1,'desc',8,0,2);
        $this->category_library = array(
            array(
                'title' => 'Hình ảnh',
                'slug' => 'hinh-anh',
                'sub' => $this->library_image
            ),
            array(
                'title' => 'Video',
                'slug' => 'video',
                'sub' => $this->library_video
            )
        );

    }

    protected function render($the_view = NULL, $template = 'master') {
        parent::render($the_view, $template);
    }

    private function get_category_root(){
        $result = $this->service_category_model->get_by_level(0);
        return $result;
    }

    private function get_category_level_and_parent($level, $parent_id){
        $result = $this->service_category_model->get_by_level_and_parent_id_when_active($level, $parent_id);
        foreach ($result as $key => $value) {
            $sub = $this->service_model->get_by_category_id_when_active($value['id']);
            $result[$key]['sub'] = $sub;
        }
        return $result;
    }

    private function get_category_by_root($parent_id){
        $result = $this->service_category_model->get_by_node_path_when_active($parent_id);
        return $result;
    }
    private function get_menu_academy(){
        $result = $this->academy_category_model->get_all_with_pagination_search(1,'desc',4,0);
        foreach ($result as $key => $value) {
            $sub = $this->academy_model->get_by_category_id_when_active($value['id']);
            $result[$key]['sub'] = $sub;
        }
        return $result;
    }
    private function get_menu_about(){
        $result = $this->about_category_model->get_all_with_pagination_search(1,'desc',4,0);
        foreach ($result as $key => $value) {
            $sub = $this->about_model->get_by_category_id_when_active($value['id']);
            $result[$key]['sub'] = $sub;
        }
        return $result;
    }
}
