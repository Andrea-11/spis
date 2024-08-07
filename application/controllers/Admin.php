<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Admin extends CI_Controller {

     public function __construct()
     {
      parent::__construct();
      $this->load->model('Admin_model');
      $this->load->library('form_validation');
      $this->load->library('upload');
      }


// ==================================================================
// =========================== INDEX ================================
// ================================================================== 
public function index()
{
  if($this->session->userdata('user_type')=='admin'){

      // $data['notification'] = $this->Admin_model->notif_model();
      // $data['ta_notif'] = $this->Admin_model->ta_notif_model();

   $this->load->view('templates/header');
   $this->load->view('templates/navigation');
   $this->load->view('admin/index');
   $this->load->view('templates/footer');
  
   }else{
      $route = 'checkpoint';
      redirect($route);

   }

} 


// ==================================================================
// =========================== SEARCH USER ACCOUNT ==================
// ================================================================== 
public function search()
{
   if($this->session->userdata('user_type')=='admin'){

         $data['notification'] = $this->Main_model->notif_model();
         // $data['ta_notif'] = $this->Main_model->ta_notif_model();
         $data['client_list'] = $this->Main_model->client_list_model();

      $this->load->view('templates/header');  
      $this->load->view('templates/navigation', $data);  
      $this->load->view('admin/search', $data);
      $this->load->view('templates/footer');  

   }else{
      $route = 'checkpoint';
      redirect($route);

   }
} 

// ===============================================================
// ================== NEW USER ACCOUNT ===========================
// ===============================================================
public function new_account()
{
   if($this->session->userdata('user_type')=='admin'){

         $data['user_list'] = $this->Admin_model->user_list_data_model();	
         $data['notification'] = $this->Admin_model->notif_model();
         // $data['ta_notif'] = $this->Admin_model->ta_notif_model();

      $this->load->view('templates/header');
      $this->load->view('templates/navigation', $data);
      $this->load->view('Admin/new_account', $data);
      $this->load->view('templates/footer');

   }else{

      redirect($route);

   }
}


// ==================================================================
// ================== DELETE NEW USER ACCOUNT =======================
// ==================================================================
public function delete_new_user($id)
{
   if($this->session->userdata('user_type')=='admin'){

      if($this->Admin_model->delete_new_user_model($id))
         {
            $this->session->set_flashdata('success', 'Deleted Successfully!');
         }
      else
         {
            $this->session->set_flashdata('error', "Error!");
         }
      Redirect('/admin/new_account', false);

   }else{

      redirect($route);

   }
 }

 
 // ==================================================================
 // ================== RETRIEVED ALL EXISTING USERS ==================
 // ==================================================================
 public function all_users()
 {
   if($this->session->userdata('user_type')=='admin'){
   
      $data['user_list'] = $this->Admin_model->user_list_data_model();
      $data['notification'] = $this->Admin_model->notif_model();
      // $data['ta_notif'] = $this->Admin_model->ta_notif_model();
 
     $this->load->view('templates/header');
     $this->load->view('templates/navigation', $data);
     $this->load->view('admin/all_users', $data);
     $this->load->view('templates/footer');
     
   }else{

     Redirect($route);
   }
 }

 
 // ==================================================================
 // ================== UPDATE User Type on Existing User =============
 // ==================================================================
 public function update_user_type() 
 {   
   
   if($this->session->userdata('user_type')=='admin'){
         
         $data = array
      (
         'id' => $this->input->post('id'),
         'user_type' => $this->input->post('user_type'),
         'status' => $this->input->post('status'),
      );
         
      $dataxss = $this->security->xss_clean($data);
   
      if ($this->Admin_model->update_usertype_model($dataxss))
      {
         $this->session->set_flashdata('success', 'Updated Successfully!!');
      }
      else
      {
         $this->session->set_flashdata('error', "Error!");
      }
      Redirect('/admin/new_account', false);
        
      }else{
   
      redirect($route);

      }
 }

 
 // ==================================================================
 // ================== DELETE EXISTING USER ==========================
 // ==================================================================
 public function delete_users($id)
 {
   if($this->session->userdata('user_type')=='admin'){
      
      if($this->Admin_model->delete_users_model($id))
      {
      $this->session->set_flashdata('success', 'Deleted Successfully!');
      }
      else
      {
      $this->session->set_flashdata('error', "Error!");
      }
      Redirect('/admin/all_users', false);
        
   }else{

      redirect($route);

   }
 }


// ==================================================================
// ======================== Update/Edit =============================
// ==================================================================
public function idcb_plan_edit($cb_plan_id) {
    if($this->session->userdata('user_type') == 'admin') {
        // Load form validation library if not already loaded
        $this->load->library('form_validation');

        if ($this->input->post('idcbPlanSubmitEdit')) {
            // Form validation rules
            $this->form_validation->set_rules('cb_activity_title', 'Activity Title', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Data to update
                $dataEdit = array(

            'cb_plan_id' => $this->input->post('cb_plan_id'),
            'office_id' => $this->input->post('office_id'),
            'obs_fos_name' => $this->input->post('obs_fos_name'),
            'cb_activity_objective' => $this->input->post('cb_activity_objective'),
            'cb_activity_title' => $this->input->post('cb_activity_title'),
            'cb_start_date' => $this->input->post('cb_start_date'),
            'cb_end_date' => $this->input->post('cb_end_date'),
            'cb_venue' => $this->input->post('cb_venue'),
            'cb_co_target_pax' => $this->input->post('cb_co_target_pax'),
            'cb_fo_target_pax' => $this->input->post('cb_fo_target_pax'),
            'cb_center_target_pax' => $this->input->post('cb_center_target_pax'),
            'cb_lgu_target_pax' => $this->input->post('cb_lgu_target_pax'),
            'cb_lswdo_target_pax' => $this->input->post('cb_lswdo_target_pax'),
            'cb_ngo_target_pax' => $this->input->post('cb_ngo_target_pax'),
            'cb_nga_target_pax' => $this->input->post('cb_nga_target_pax'),
            'cb_org_target_pax' => $this->input->post('cb_org_target_pax'),
            'cb_bene_target_pax' => $this->input->post('cb_bene_target_pax'),
            'cb_other_target_pax' => $this->input->post('cb_other_target_pax'),
            'cb_fund_source' => $this->input->post('cb_fund_source'),
            'cb_fund_source_others' => $this->input->post('cb_fund_source_others'),
            'cb_expected_output' => $this->input->post('cb_expected_output'),
            'cb_alloted_budget' => $this->input->post('cb_alloted_budget'),
            'remarks' => $this->input->post('remarks'), 
            'encoded_by' => $this->session->user_id
         );

      $dataEditxss = $this->security->xss_clean($dataEdit);
      $this->Admin_model->update_data_cb_plan_model($dataEditxss);
      $this->session->set_flashdata('success', 'Data Successfully Added!');
      redirect('admin/idcb_plan_table');
         }
      }

      $data['form_data'] = $this->input->post();
      $data['user_type'] = $this->session->userdata('user_type');
      $data['notification'] = $this->Admin_model->notif_model();
      // $data['ta_notif'] = $this->Admin_model->ta_notif_model();
      $data['office_list'] = $this->Admin_model->fetch_office_model();
      $data['edit_cb_plan_list'] = $this->Admin_model->edit_cb_plan_model($cb_plan_id);

      $this->load->view('templates/header');
      $this->load->view('templates/navigation', $data, $data);
      $this->load->view('admin/idcb_plan_edit', $data);
      $this->load->view('templates/footer');
   } else {

      redirect($route);
   }
}

// ==================================================================
// ======================== DELETE DATA IDCB PLAN ===================
// ==================================================================
public function delete_data_idcb_plan($cb_plan_id)
{
   if($this->session->userdata('user_type')=='admin'){

      if($this->Admin_model->delete_data_cb_plan_model($cb_plan_id)){
         $this->session->set_flashdata('success', 'Deleted Successfully!');
      }else{ 
         $this->session->set_flashdata('error', "Error!");
      }
      Redirect('/admin/idcb_plan_table', false);

   }else{

      redirect($route);

   }
}






} ?>

