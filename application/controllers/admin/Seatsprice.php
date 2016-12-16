<?php

class Seatsprice extends MY_Admin {

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
            "script/seatsprice.js"
        );
        $this->data['content_page'] = 'admin/seatsprice/index';
        $this->load->view('admin/template', $this->data);
    }

    function listing() {
        $this->data['results'] = $this->seats_model->get_all_seatprice();
        $this->load->view("admin/seatsprice/listing", $this->data);
    }

    function formview($id = null) {
        $this->data['seats'] = $this->common_model->get_all_data("seats_type");
        $this->data['events'] = $this->common_model->get_all_data("eventtype");
        if ($id) {
            $this->data['result'] = $this->common_model->get_data('seatsprice','*',array('id'=>$id));
            $this->load->view("admin/seatsprice/edit", $this->data);
        } else {
            $this->load->view("admin/seatsprice/add", $this->data);
        }
    }

    function addformdb($id = null) {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>', '</div>');

        $this->form_validation->set_rules('Price[eventtype_id]', 'Event', 'required');
        $this->form_validation->set_rules('Price[seats_type_id]', 'Seats type', 'required');
        $this->form_validation->set_rules('Price[number]', 'Seat number', 'required');
        $this->form_validation->set_rules('Price[price]', 'Seat price', 'required');

        if ($this->form_validation->run()) {

            if ($id) {
                $data = $_POST["Price"];
                $this->common_model->update("seatsprice", $data, ['id' => $id]);
                echo "DONE";
            } else {
                $data = $_POST["Price"];
                $this->common_model->insert("seatsprice", $data);
                echo "DONE";
            }
        } else {
            echo validation_errors();
        }
    }

    public function delete($id) {
        $this->common_model->delete("seatsprice", ["id" => $id]);
    }

}
