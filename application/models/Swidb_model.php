<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Swidb_model extends CI_Model 
{
    function __construct() {
        parent::__construct();  
        
    }

// Notification for New User
public function notif_model(){ 
    $this->db->select ( '*' ); 
    $this->db->from ('tbl_users');
    $this->db->where ('status', '1');
    $query = $this->db->get();
    return $query->result();
} 


// TA Notification
public function ta_notif_model(){ 
    $this->db->select ( '*' ); 
    $this->db->from ('tbl_ta_request');
    $this->db->where ('ta_status', '1');
    $query = $this->db->get();
    return $query->result();
}

// TA Request  Table
function ta_request_table_model(){
    $this->db->select( '*' ); 
    $this->db->from  ('tbl_ta_request');
    $this->db->join  ('lib_office', 'lib_office.office_id = tbl_ta_request.office_id' , 'left');
    $query = $this->db->get();    
    return $query->result();
}

// TA Add Request
public function insert_ta_request_model($dataAddxss){
    $this->db->insert('tbl_ta_request', $dataAddxss); 
    return true;
    }

// DSWD OFFICES
function fetch_office_model(){
    $this->db->order_by("office_id", "ASC");
    $query = $this->db->get("lib_office");
    return $query->result();
}

// Capacity Building Data Table
function cb_plan_table_model(){
    $this->db->select( '*' ); 
    $this->db->from  ('tbl_cb_plan');
    $this->db->join  ('lib_office', 'lib_office.office_id = tbl_cb_plan.office_id' , 'left');
    $query = $this->db->get();    
    return $query->result();
}


  
  }?>