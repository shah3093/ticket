<?php

class Slider extends MY_Admin {

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
            "script/slider.js"
        );
        $this->data['content_page'] = 'admin/slider/index';
        $this->load->view('admin/template', $this->data);
    }

    function listing() {
        $this->data['results'] = $this->common_model->get_all_data("slider");
        $this->load->view("admin/slider/listing", $this->data);
    }

    function formview($id = null) {
        if ($id) {
            $this->data['result'] = $this->common_model->get_data("slider", "*", ["id" => $id]);
            $this->load->view("admin/slider/edit", $this->data);
        } else {
            $this->load->view("admin/slider/add");
        }
    }

    function addformdb($id = null) {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>', '</div>');

        $this->form_validation->set_rules('Image[caption]', 'Caption', 'required');

        if ($this->form_validation->run()) {

            //////.....For Image........///////////
            $config['upload_path'] = './asset/image';
            $config['allowed_types'] = '*';
            $config['max_size'] = '4048';
            $config['overwrite'] = TRUE;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img')) {
                $image_data = $this->upload->data();
                $newname = 'slider_' . time() . $image_data['file_ext'];
                rename($image_data['full_path'], $image_data['file_path'] . $newname);
                $this->image_resize_fn($newname);
                $_POST['Image']['name'] = $newname;
            }
            /////......For Image....///////////////


            if ($id) {
                if (isset($newname)) {
                    $result = $this->common_model->get_data('slider', '*', ['id' => $id]);
                    if ($result->name != null) {
                        $path = "./asset/image/" . $result->name;
                        @unlink($path);
                    }
                }
                $data = $_POST["Image"];
                $this->common_model->update("slider", $data, ['id' => $id]);
                echo "DONE";
            } else {
                if (isset($newname)) {
                    $data = $_POST["Image"];
                    $this->common_model->insert("slider", $data);
                    echo "DONE";
                } else {
                    echo $this->upload->display_errors();
                }
            }
        } else {
            echo validation_errors();
        }
    }

    public function delete($id) {
        $result = $this->common_model->get_data('slider', '*', ['id' => $id]);
        if ($result->name != null) {
            $path = "./asset/image/" . $result->name;
            @unlink($path);
        }
        $this->common_model->delete("slider", ["id" => $id]);
    }

    function image_resize_fn($img) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './template/image/' . $img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 1500;
        $config['height'] = 500;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
        return NULL;
    }

}
