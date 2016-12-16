<?php

class Venue extends MY_Admin {

    function __construct() {
        parent::__construct();
    }

    function load() {
        
    }

    function index() {

        $this->data['additional_csss'] = array(
            "plugins/datatables/dataTables.bootstrap.css"
        );
        $this->data['additional_jss'] = array(
            "plugins/datatables/jquery.dataTables.min.js",
            "plugins/datatables/dataTables.bootstrap.min.js",
            "script/venue.js"
        );
        $this->data['content_page'] = 'admin/venue/index';
        $this->load->view('admin/template', $this->data);
    }

    function listing() {
        $this->data['results'] = $this->common_model->get_all_data("venue");
        $this->load->view("admin/venue/listing", $this->data);
    }

    function formview($id = null) {
        if ($id) {
            $this->data['result'] = $this->common_model->get_data("venue", "*", ["id" => $id]);
            $this->load->view("admin/venue/edit", $this->data);
        } else {
            $this->load->view("admin/venue/add");
        }
    }

    function addformdb($id = null) {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>', '</div>');

        $this->form_validation->set_rules('Venue[name]', 'Venue name', 'required');

        if ($this->form_validation->run()) {

            if ($id) {
                $data = $_POST["Venue"];
                $this->common_model->update("venue", $data, ['id' => $id]);
                echo "DONE";
            } else {
                $data = $_POST["Venue"];
                $this->common_model->insert("venue", $data);
                echo "DONE";
            }
        } else {
            echo validation_errors();
        }
    }

    public function delete($id) {
        $this->common_model->delete("venue", ["id" => $id]);
    }

}
