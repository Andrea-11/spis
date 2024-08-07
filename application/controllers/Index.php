<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	 Public function __construct() { 
        parent::__construct(); 
         
        $this->load->model('User_model');
    } 

	public function index()
	{
		if($this->session->userdata('user_type')==='admin'){ 
			redirect('/admin');
	
		}else if($this->session->userdata('user_type')==='regional'){
			redirect('/regional');
	
		}else if($this->session->userdata('user_type')==='co'){
			redirect('/co');
	
		}else if($this->session->userdata('user_type')===''){
			redirect('user/new_user');
	
		}else{
		$data['region'] = $this->User_model->select_region();
		$this->load->view('templates/header');
			 $this->load->view('login',$data);
		}
		}

 
 //Select Sector
 function select_center()
 {
  if($this->input->post('region_id'))
  {
   echo $this->User_model->select_center($this->input->post('region_id'));
  }
 }

 
}
