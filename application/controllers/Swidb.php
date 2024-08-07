<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Swidb extends CI_Controller {

     public function __construct()
     {
      parent::__construct();
      $this->load->model('Swidb_model');
      $this->load->library('form_validation');
      $this->load->library('upload');
      }


// ==================================================================
// =========================== INDEX ================================
// ================================================================== 
public function index()
{
  if($this->session->userdata('user_type')=='swidb'){

      $data['ta_notif'] = $this->Swidb_model->ta_notif_model();
      $data['notification'] = $this->Swidb_model->notif_model();

   $this->load->view('templates/header');  
   $this->load->view('templates/navigation', $data);  
   $this->load->view('Swidb/index');
   $this->load->view('templates/footer');  
  
   }else{

      redirect($route);

   }

} 


// ==================================================================
// ===                    CAP BUILD PLAN TABLE                   ====
// ================================================================== 
public function idcb_plan_table()
{
    if ($this->session->userdata('user_type') == 'swidb') {
        
        // Load view
        // $data['form_data'] = $this->input->post();
        $data['notification'] = $this->Swidb_model->notif_model();
        $data['ta_notif'] = $this->Swidb_model->ta_notif_model();
        $data['cb_plan_table'] = $this->Swidb_model->cb_plan_table_model();

        $this->load->view('templates/header');
        $this->load->view('templates/navigation', $data);
        $this->load->view('Swidb/idcb_plan_table', $data);
        $this->load->view('templates/footer');
    } else {
        redirect($route);
    }
}


// =================================================================
// ===>                       TA REQUEST                        <===
// =================================================================
public function ta_request_table()
{
    if ($this->session->userdata('user_type') == 'swidb') {

         $data['form_data'] = $this->input->post();
         $data['notification'] = $this->Swidb_model->notif_model();
         $data['ta_notif'] = $this->Swidb_model->ta_notif_model();
         $data['office_list'] = $this->Swidb_model->fetch_office_model();
         $data['ta_request_table'] = $this->Swidb_model->ta_request_table_model();

      $this->load->view('templates/header');
      $this->load->view('templates/navigation', $data);
      $this->load->view('Swidb/ta_request_table', $data);
      $this->load->view('templates/footer');
    } else {
  
      redirect($route);

    }
}





 }?>