<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostDetail extends Public_Controller {
    public function __construct(){
        parent::__construct();

    }

    public function index(){
        $this->render('post_detail_view');
    }
}
