<?php

class Home extends MY_Site {

    function __construct() {
        parent::__construct();
    }
    
    function load(){
        
    }
    function index(){
        $this->data['content_page'] ='site/index';
        $this->load->view('site/template',$this->data);
    }
}