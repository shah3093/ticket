<?php

class Login_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkuser($email, $password) {
        $error_str = "Email or Password incorrect";
        $result = $this->db->select("users.*,user_types.type")
                        ->from("users")
                        ->join("user_types", "users.user_type_id = user_types.id")
                        ->where('users.email', $email)
                        ->where('users.password', md5($password))
                        ->get()->row();
        if ($result) {
            $data = array(
                "user_type" => $result->type,
                "user_name" => $result->name,
                "user_id" => $result->id
            );
            $this->session->set_userdata($data);
            $error_str = "DONE";
        }
        return $error_str;
    }

}
