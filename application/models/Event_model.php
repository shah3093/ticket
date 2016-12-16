<?php

class Event_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

  
    public function get_data($id){
          return $result = $this->db->select("eventtype.*,sportstype.name AS sportsname")
                        ->from("eventtype")
                        ->join("sportstype", "eventtype.sports_type_id = sportstype.id")
                        ->where('eventtype.id', $id)
                        ->get()->row();
    }
    
    public function get_all_data(){
           return $result = $this->db->select("eventtype.*,sportstype.name AS sportsname")
                        ->from("eventtype")
                        ->join("sportstype", "eventtype.sports_type_id = sportstype.id")
                        ->get()->result();
    }
    

}
