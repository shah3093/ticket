<?php

class Site_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_events() {
        return $this->db->select("eventtype.*,sportstype.name AS sportsname")
                        ->from("eventtype")
                        ->join("sportstype", "eventtype.sports_type_id=sportstype.id")
                        ->join("matchschdule", "eventtype.id=matchschdule.eventtype_id")
                        ->where('matchschdule.avilablendndate >=', date("Y-m-d"))
                        ->where('matchschdule.avilablestartdate <=', date("Y-m-d"))
                        ->get()->result();
    }

    function get_matchschdules($eventid) {
        return $this->db->select("matchschdule.*")
                ->from("matchschdule")
                ->join("eventtype", "matchschdule.eventtype_id = eventtype.id")
                ->where("eventtype.id", $eventid)
                ->where('matchschdule.avilablendndate >=', date("Y-m-d"))
                ->where('matchschdule.avilablestartdate <=', date("Y-m-d"))
                ->get()->result();
    }

}
