<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
    function __construct() {
        parent::__construct();  
        
    }


// USER TYPE
public function user_list_data_model() { 
    return $this->db
                ->select('*')
                ->from('tbl_users')
                ->join('lib_region', 'tbl_users.region_id = lib_region.region_id')
                ->get()
                ->result();
}

// Update User Type
public function update_usertype_model($dataxss){
    $this->db->set($dataxss)
             ->where('user_id',$dataxss['user_id'])
             ->update('tbl_users');
             return true;
  }

// Capacity Building Data Table
function cb_plan_table_model(){
    $this->db->select( '*' ); 
    $this->db->from  ('tbl_cb_plan');
    $this->db->join  ('lib_office', 'lib_office.office_id = tbl_cb_plan.office_id' , 'left');
    $query = $this->db->get();    
    return $query->result();
}


// Retrieve IDCB Plan Data 
public function edit_cb_plan_model($cb_plan_id){ 
    $this->db->select ( '*' ); 
    $this->db->from ('tbl_cb_plan');
    $this->db->where('cb_plan_id', $cb_plan_id);
    $query = $this->db->get();
    return $query->result();
} 

// Update IDCB Plan Data
public function update_data_cb_plan_model($cb_plan_id, $dataEditxss)
{
    $this->db->where('cb_plan_id', $cb_plan_id)
             ->update('tbl_cb_plan', $dataEditxss);
    return true;
}


// Delete IDCB Plan Data
public function delete_data_cb_plan_model($cb_plan_id){
    $this->db->where('cb_plan_id', $cb_plan_id);
    $this->db->delete('tbl_cb_plan');
    return true;
    }
// =====================================================

// IDCB ACCOMPLISHMENT TABLE
function cb_accomplishment_table_model(){
    $this->db->select( '*' ); 
    $this->db->from  ('tbl_cb_accomplishment');
    $this->db->join  ('lib_office', 'lib_office.office_id = tbl_cb_accomplishment.office_id' , 'left');
    $query = $this->db->get();    
    return $query->result();
}

// Insert IDCB ACCOMPLISHMENT Data
public function insert_cb_accomp_model($dataAddxss){
    $this->db->insert('tbl_cb_accomplishment', $dataAddxss); 
    return true;
    }

// Retrieve IDCB ACCOMPLISHMENT Data 
public function edit_cb_accomp_model($cb_plan_id){ 
    $this->db->select ( '*' ); 
    $this->db->from ('tbl_cb_accomplishment');
    $this->db->where('cb_plan_id', $cb_plan_id);
    $query = $this->db->get();
    return $query->result();
} 

// Update IDCB ACCOMPLISHMENT Data
public function update_data_cb_accomp_model($dataEditxss) {
    $this->db->where('cb_plan_id', $dataEditxss['cb_plan_id'])
             ->update('tbl_cb_accomplishment', $dataEditxss);
    return true;
}

// Delete IDCB ACCOMPLISHMENT Data
public function delete_data_cb_accomp_model($cb_plan_id){
    $this->db->where('cb_plan_id', $cb_plan_id);
    $this->db->delete('tbl_cb_accomplishment');
    return true;
}

// DSWD OFFICES
function fetch_office_model(){
    $this->db->order_by("office_id", "ASC");
    $query = $this->db->get("lib_office");
    return $query->result();
}

// DSWD OBS/FIELD OFFICE
function fetch_obs_fos_model($office_id){
    $this->db->where('office_id', $office_id);
    $this->db->order_by('obs_fos_name', 'ASC');    
    $query = $this->db->get('lib_obs_fos');
    foreach($query->result() as $row)
    {
        $output .= '<option value="'.$row->obs_fos_name.'">'.$row->obs_fos_name.'</option>';
    }
    return $output;
}

public function getActivityTitle($params = array()){ 
    $this->db->select('*'); 
    $this->db->from('tbl_cb_plan'); 
     
    if(array_key_exists("conditions", $params)){ 
        foreach($params['conditions'] as $key => $val){ 
            $this->db->where($key, $val); 
        } 
    } 
     
    if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
        $result = $this->db->count_all_results(); 
    }else{ 
        if(array_key_exists("cb_activity_title", $params) || $params['returnType'] == 'single'){ 
            if(!empty($params['cb_activity_title'])){ 
                $this->db->where('cb_activity_title', $params['cb_activity_title']); 
            } 
            $query = $this->db->get(); 
            $result = $query->row_array(); 
        }else{ 
            $this->db->order_by('cb_activity_title', 'desc'); 
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                $this->db->limit($params['limit'],$params['start']); 
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                $this->db->limit($params['limit']); 
            } 
             
            $query = $this->db->get(); 
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
        } 
    } 
     
    return $result; 
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

// TA Notification
public function ta_notif_model(){ 
    $this->db->select ( '*' ); 
    $this->db->from ('tbl_ta_request');
    $this->db->where ('ta_status', '1');
    $query = $this->db->get();
    return $query->result();
}

// Calendar Add Event
public function insert_swadcap_model($dataAddxss){
    $this->db->insert('tbl_swadcap_calendar', $dataAddxss); 
    return true;
    }
    

 
 


}?>

