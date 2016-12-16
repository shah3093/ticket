<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Admin extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->data['title'] = "Ticket Booking Managment";
         $this->load->model('common_model', '', TRUE);
        $this->logincheck();
    }

    public function logincheck() {
        $admin = $this->session->userdata('user_type');
        if ($admin != 'admin') {
            redirect(site_url('Login'));
        }
    }

}
