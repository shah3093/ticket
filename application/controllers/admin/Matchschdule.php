<?php

class Matchschdule extends MY_Admin {

    function __construct() {
        parent::__construct();
        $this->load->model('matchschdule_model', '', TRUE);
    }

    function load() {
        
    }

    function index() {

        $this->data['additional_csss'] = array(
            "plugins/datatables/dataTables.bootstrap.css",
            "plugins/datepicker/datepicker3.css",
            "plugins/timepicker/bootstrap-timepicker.min.css"
        );
        $this->data['additional_jss'] = array(
            "plugins/datatables/jquery.dataTables.min.js",
            "plugins/datatables/dataTables.bootstrap.min.js",
            "plugins/datepicker/bootstrap-datepicker.js",
            "plugins/timepicker/bootstrap-timepicker.min.js",
            "script/matchschdule.js"
        );
        $this->data['content_page'] = 'admin/matchschdule/index';
        $this->load->view('admin/template', $this->data);
    }

    function listing() {
        $this->data['results'] = $this->matchschdule_model->get_all_data();
        $this->load->view("admin/matchschdule/listing", $this->data);
    }

    function formview($id = null) {
        $this->data['events'] = $this->common_model->get_all_data('eventtype');
        $this->data['venues'] = $this->common_model->get_all_data('venue');
        if ($id) {
            $this->data['result'] = $this->common_model->get_data("matchschdule", "*", ["id" => $id]);
            $cond = array(
                'table_name' => "'matchschdule'",
                'table_key' => "'id'",
                'table_key_id' => $id
            );
            $result = $this->data['images'] = $this->common_model->get_all_data("images", "*", $cond);
            $this->load->view("admin/matchschdule/edit", $this->data);
        } else {
            $this->load->view("admin/matchschdule/add", $this->data);
        }
    }

    function addformdb($id = null) {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>', '</div>');

        $this->form_validation->set_rules('Schdule[eventtype_id]', 'Event name', 'required');
        $this->form_validation->set_rules('Schdule[venu_id]', 'Venue name', 'required');
        $this->form_validation->set_rules('Schdule[title]', 'Title', 'required');
        $this->form_validation->set_rules('Schdule[avilablestartdate]', 'Avilable start date', 'required');
        $this->form_validation->set_rules('Schdule[avilablendndate]', 'Avilable end date', 'required');
        $this->form_validation->set_rules('Schdule[matchdate]', 'Match date', 'required');
        $this->form_validation->set_rules('Schdule[matchtime]', 'Match time', 'required');


        if ($this->form_validation->run()) {
            $i = 0;

            $config['upload_path'] = './asset/image';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '4048';
            $config['overwrite'] = TRUE;
            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($id) {
                $_POST["Schdule"]["matchtime"] = date("H:i:s", strtotime($_POST["Schdule"]["matchtime"]));
                $data = $_POST["Schdule"];
                $this->common_model->update("matchschdule", $data, ['id' => $id]);

                if (isset($_POST["Image"])) {
                    $imgdata = $_POST["Image"];

                    foreach ($imgdata as $key => $data) {
                        if ($this->upload->do_upload('img_' . $key)) {
                            $image_data = $this->upload->data();
                            $newname = 'schdule_' . time() . ++$i . $image_data['file_ext'];
                            rename($image_data['full_path'], $image_data['file_path'] . $newname);

                            $imgdata = array(
                                'table_name' => "matchschdule",
                                'table_key' => "id",
                                'table_key_id' => $id,
                                'name' => $newname,
                                'caption' => isset($data['caption']) ? $data['caption'] : ''
                            );
                            $this->common_model->insert("images", $imgdata);
                        }
                    }
                }

                echo "DONE";
            } else {
                $_POST["Schdule"]["matchtime"] = date("H:i:s", strtotime($_POST["Schdule"]["matchtime"]));
                $data = $_POST["Schdule"];
                $schduleid = $this->common_model->insert("matchschdule", $data);

                if (isset($_POST["Image"])) {
                    $imgdata = $_POST["Image"];

                    foreach ($imgdata as $key => $data) {
                        if ($this->upload->do_upload('img_' . $key)) {
                            $image_data = $this->upload->data();
                            $newname = 'schdule_' . time() . ++$i . $image_data['file_ext'];
                            rename($image_data['full_path'], $image_data['file_path'] . $newname);

                            $imgdata = array(
                                'table_name' => "matchschdule",
                                'table_key' => "id",
                                'table_key_id' => $schduleid,
                                'name' => $newname,
                                'caption' => isset($data['caption']) ? $data['caption'] : ''
                            );
                            $this->common_model->insert("images", $imgdata);
                        }
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
            'table_name' => "'matchschdule'",
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
        $this->common_model->delete("matchschdule", ["id" => $id]);
    }

    public function imgeform($cnt) {
        $this->data['cnt'] = $cnt;
        $this->load->view('admin/matchschdule/imgeform', $this->data);
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
