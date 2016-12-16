<?php

class Seats_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_data($id) {
        return $result = $this->db->select("seats_type.*,venue.name AS venuename")
                        ->from("seats_type")
                        ->join("venue", "seats_type.venue_id = venue.id")
                        ->where('seats_type.id', $id)
                        ->get()->row();
    }

    public function get_all_data() {
        return $result = $this->db->select("seats_type.*,venue.name AS venuename")
                        ->from("seats_type")
                        ->join("venue", "seats_type.venue_id = venue.id")
                        ->get()->result();
    }

    public function get_all_seatprice() {
        return $result = $this->db->select("seatsprice.*,seats_type.name AS seatname,eventtype.name AS eventname")
                        ->from("seatsprice")
                        ->join("seats_type", "seatsprice.seats_type_id = seats_type.id")
                        ->join("eventtype", "seatsprice.eventtype_id = eventtype.id")
                        ->get()->result();
    }

}
