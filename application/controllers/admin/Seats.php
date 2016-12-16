<?php

class Seats extends MY_Admin {

    function __construct() {
        parent::__construct();
        $this->load->model('seats_model', '', TRUE);
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
            "script/seats.js"
        );
        $this->data['content_page'] = 'admin/seats/index';
        $this->load->view('admin/template', $this->data);
    }

    function listing() {
        $this->data['results'] = $this->seats_model->get_all_data();
        $this->load->view("admin/seats/listing", $this->data);
    }

    function formview($id = null) {
        $this->data['venues'] = $this->common_model->get_all_data("venue");
        if ($id) {
            $this->data['result'] = $this->seats_model->get_data($id);
            $this->load->view("admin/seats/edit", $this->data);
        } else {
            $this->load->view("admin/seats/add", $this->data);
        }
    }

    function addformdb($id = null) {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>', '</div>');

        $this->form_validation->set_rules('Seat[name]', 'Seat name', 'required');
        $this->form_validation->set_rules('Seat[venue_id]', 'Venue name', 'required');

        if ($this->form_validation->run()) {

            if ($id) {
                $data = $_POST["Seat"];
                $this->common_model->update("seats_type", $data, ['id' => $id]);
                echo "DONE";
            } else {
                $data = $_POST["Seat"];
                $this->common_model->insert("seats_type", $data);
                echo "DONE";
            }
        } else {
            echo validation_errors();
        }
    }

    public function delete($id) {
        $this->common_model->delete("seats_type", ["id" => $id]);
    }

}
