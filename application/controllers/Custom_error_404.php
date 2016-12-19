<?php

class Custom_error_404 extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model', '', TRUE);
    }

    function index() {
        $this->load->view('site/error_404');
    }

}
