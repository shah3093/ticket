<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Site extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->data['title'] = "Online ticket";
        $this->load->model('common_model', '', TRUE);
    }

}
