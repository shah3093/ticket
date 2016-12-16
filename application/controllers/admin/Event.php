<?php

class Event extends MY_Admin {

    function __construct() {
        parent::__construct();
        $this->load->model('event_model', '', TRUE);
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
            "script/event.js"
        );
        $this->data['content_page'] = 'admin/event/index';
        $this->load->view('admin/template', $this->data);
    }

    function listing() {
        $this->data['results'] = $this->event_model->get_all_data();
        $this->load->view("admin/event/listing", $this->data);
    }

    function formview($id = null) {
        $this->data["sports"] = $this->common_model->get_all_data("sportstype");
        if ($id) {
            $this->data['result'] = $this->event_model->get_data($id);
            $condition = array(
                "table_name" => "'eventtype'",
                "table_key" => "'id'",
                "table_key_id" => $id
            );
            $this->data['images'] = $this->common_model->get_all_data("images", "*", $condition);
            $this->load->view("admin/event/edit", $this->data);
        } else {
            $this->load->view("admin/event/add", $this->data);
        }
    }

    function addformdb($id = null) {
        $i = 1;
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>', '</div>');

        $this->form_validation->set_rules('Event[name]', 'Event name', 'required');
        $this->form_validation->set_rules('Event[sports_type_id]', 'Sports type', 'required');

        if ($this->form_validation->run()) {

            $config['upload_path'] = './asset/image';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '4048';
            $config['overwrite'] = TRUE;
            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($id) {
                $data = $_POST["Event"];
                $this->common_model->update("eventtype", $data, ['id' => $id]);
                if (isset($_POST["Image"])) {
                    $imgdata = $_POST["Image"];

                    foreach ($imgdata as $key => $data) {
                        if ($this->upload->do_upload('img_' . $key)) {
                            $image_data = $this->upload->data();
                            $newname = 'event_' . time() . ++$i . $image_data['file_ext'];
                            rename($image_data['full_path'], $image_data['file_path'] . $newname);
                            $_POST['Image']['name'] = $newname;

                            $imgdata = array(
                                'table_name' => "eventtype",
                                'table_key' => "id",
                                'table_key_id' => $id,
                                'name' => $newname,
                                'caption' => $data['caption']
                            );
                            $this->common_model->insert("images", $imgdata);
                        }
                    }
                }
                echo "DONE";
            } else {
                $data = $_POST["Event"];
                $lastid = $this->common_model->insert("eventtype", $data);

                $imgdata = $_POST["Image"];

                foreach ($imgdata as $key => $data) {
                    if ($this->upload->do_upload('img_' . $key)) {
                        $image_data = $this->upload->data();
                        $newname = 'event_' . time() . ++$i . $image_data['file_ext'];
                        rename($image_data['full_path'], $image_data['file_path'] . $newname);
                        $_POST['Image']['name'] = $newname;

                        $imgdata = array(
                            'table_name' => "eventtype",
                            'table_key' => "id",
                            'table_key_id' => $lastid,
                            'name' => $newname,
                            'caption' => $data['caption']
                        );
                        $this->common_model->insert("images", $imgdata);
                    }
                }

                echo "DONE";
            }
        } else {
            echo validation_errors();
        }
    }

    public function delete($id) {
        $condition = array(
            'table_name' => "'eventtype'",
            'table_key' => "'id'",
            'table_key_id' => $id
        );
        $results = $this->common_model->get_all_data("images", "*", $condition);
        foreach ($results as $result) {
            $data = $this->common_model->get_data("images", '*', ["id" => $result->id]);
            if ($data->name != null) {
                $path = "./asset/image/" . $data->name;
                @unlink($path);
            }
            $this->common_model->delete("images", ["id" => $id]);
        }
        $this->common_model->delete("eventtype", ["id" => $id]);
    }

    public function imgeform($cnt) {
        $data["cnt"] = $cnt;
        $this->load->view("admin/event/imgeform", $data);
    }

    public function deleteimage($id) {
        $result = $this->common_model->get_data("images", '*', ["id" => $id]);
        if ($result->name != null) {
            $path = "./asset/image/" . $result->name;
            @unlink($path);
        }
        $this->common_model->delete("images", ["id" => $id]);
    }

}
