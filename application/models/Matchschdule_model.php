<?php

class Matchschdule_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_data() {
        return $result = $this->db->select("matchschdule.*,eventtype.name AS eventname,venue.name AS venuename")
                        ->from("matchschdule")
                        ->join("eventtype", "matchschdule.eventtype_id = eventtype.id")
                        ->join("venue", "matchschdule.venu_id = venue.id")
                        ->order_by('matchschdule.id', 'desc')
                        ->get()->result();
    }

}
