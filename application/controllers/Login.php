<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model', '', TRUE);
    }

    function load() {
        
    }

    function index() {
        $this->load->view('admin/login');
    }

    function authentication() {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>', '</div>');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {
            $check = $this->login_model->checkuser($_POST['email'], $_POST['password']);
            if ($check == "DONE") {
              echo $check;
            } else {
                echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>' . $check . '</div>';
            }
        } else {
            echo validation_errors();
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(site_url());
    }

}
