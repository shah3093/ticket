<?php

class Home extends MY_Admin {

    function __construct() {
        parent::__construct();
    }
    
    function load(){
        
    }
    function index(){
        $this->data['content_page'] ='admin/index';
        $this->load->view('admin/template',$this->data);
    }
}