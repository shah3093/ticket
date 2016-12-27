<?php

class Home extends MY_Site {

    function __construct() {
        parent::__construct();
        $this->load->model('site_model', '', TRUE);
    }

    function load() {
        
    }

    function index() {

        ///////....
        $this->data['events'] = $this->site_model->get_events();
        /////......

        $this->data['slidernumber'] = $this->common_model->get_num_rows('slider');
        $this->data['sliders'] = $this->common_model->get_all_data('slider');
        $this->data['content_page'] = 'site/home';
        $this->load->view('site/template', $this->data);
    }
    
    function matchview($eventid){
        $this->data["matches"] = $this->site_model->get_matchschdules($eventid);
    }

}
