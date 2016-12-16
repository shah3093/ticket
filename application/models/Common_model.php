<?php

class Common_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($table, $data, $condition = null) {

        if ($condition !== null) {
            $this->db->where($condition, null, false);
        }

        if (!$this->db->insert($table, $data)) {
            return $this->db->_error_message();
        }

        return $this->db->insert_id();
    }

    public function update($table, $data, $condition) {

        if (!$this->db->where($condition, null, false)
                        ->update($table, $data)) {
            return $this->db->_error_message();
        }

        return true;
    }

    public function delete($table, $condition) {

        if (!$this->db->where($condition, null, false)
                        ->delete($table)) {
            return $this->db->_error_message();
        }

        return true;
    }

    public function get_all_data($table, $select = "*", $condition = null, $limit = null, $offset = 0) {

        if ($condition !== null) {
            $this->db->where($condition, null, false);
        }

        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }

        $results = $this->db->select($select)->get($table)->result();

        return $results;
    }

    public function get_data($table, $select = "*", $condition = null) {
        if ($condition !== null) {
            $this->db->where($condition, null, false);
        }
        $results = $this->db->select($select)->get($table)->row();
        return $results;
    }

    public function get_num_rows($table, $select = "*", $condition = null) {
        if ($condition !== null) {
            $this->db->where($condition, null, false);
        }
        $results = $this->db->select($select)->get($table)->num_rows();
        return $results;
    }

}
