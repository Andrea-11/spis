<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	Public function __construct() { 
		parent::__construct(); 
			
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->load->helper('security');
} 

	public function login(){

		$this->load->view('templates/header');  
		$this->load->view('login');

}

//Session  
public function authenticate(){

	$username = $this->input->post('username',TRUE);
	$password = md5($this->input->post('password',TRUE));
	$validate = $this->User_model->validate($username,$password);

	if($validate->num_rows() > 0){
	
	// if($validate->num_rows() > 0 ){
		$data  = $validate->row_array();
		$user_id = $data['user_id'];
		$region_id = $data['region_id'];
		$province_id = $data['province_id'];
		$city_id = $data['city_id'];
		$brgy_id = $data['brgy_id'];
		$username  = $data['username'];
		$user_type = $data['user_type'];
		$first_name = $data['first_name'];
		$middle_name = $data['middle_name'];
		$last_name = $data['last_name'];
		$sex = $data['sex'];
		$user_email = $data['user_email'];
		$sesdata = array(
			
		'user_id'     	=> $user_id,
		'region_id'     => $region_id,
		'province_id'   => $province_id,
		'province_id'   => $province_id,
		'city_id'     	=> $city_id,
		'brgy_id'     	=> $brgy_id,
		'username'     	=> $username,
		'user_type'     => $user_type,
		'first_name'    => $first_name,
		'middle_name'   => $middle_name,
		'last_name'     => $last_name,
		'sex'     			=> $sex,
		'user_email'		=> $user_email,
		'logged_in' 		=> TRUE
		);
		$this->session->set_userdata($sesdata);
		$isLoggedIn = $this->session->id;
			
//Login User Type

			if($user_type == 'admin'){

				echo $this->session->set_flashdata('success','Welcome Back!');
					
				redirect('/admin');

			}else if ($user_type == 'fo'){
				
				echo $this->session->set_flashdata('success','Welcome Back!');

				redirect('/fo');

			}else if ($user_type == 'co'){
				
				echo $this->session->set_flashdata('success','Welcome Back!');

				redirect('/co');
		
			}else if ($user_type == ''){
				redirect('user/new_user');
			}


	}elseif($validate->num_rows() == false){
		echo $this->session->set_flashdata('error','Wrong Username or Password!.');
		redirect('user/login?error=1');
	}
}

//Logout	  
	  public function logout(){
		session_destroy();
		redirect($route);
	}

//Registration
public function registration()
{ 
	$userData = array(); 

	if(isset($_POST['signupSubmit'])){ 

		$this->form_validation->set_rules('user_email', 'Email', 'required|callback_email_check'); 
		$this->form_validation->set_rules('username', 'Username', 'required|callback_user_check'); 
		$this->form_validation->set_rules('password', 'password', 'required|callback_password_strong'); 
		$this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]'); 

			$userData = array( 
				'region_id' => strip_tags($this->input->post('region_id')), 
				'province_id' => strip_tags($this->input->post('province_id')), 
				'city_id' => strip_tags($this->input->post('city_id')), 
				'brgy_id' => strip_tags($this->input->post('brgy_id')), 
				'dswd_id' => strip_tags($this->input->post('dswd_id')), 
				'first_name' => strip_tags($this->input->post('first_name')), 
				'middle_name' => strip_tags($this->input->post('middle_name')), 
				'last_name' => strip_tags($this->input->post('last_name')), 
				'ext_name' => strip_tags($this->input->post('ext_name')), 
				'sex' => strip_tags($this->input->post('sex')), 
				'user_email' => strip_tags($this->input->post('user_email')), 
				'username' => strip_tags($this->input->post('username')), 
				'password' => md5($this->input->post('password')),
				'status' => '1'
			); 

		$userDataxss = $this->security->xss_clean($userData);
		if($this->form_validation->run() == true){ 
			$insert = $this->User_model->registermodel($userDataxss); 
			if($insert){ 
			echo $this->session->set_flashdata('success_register', 'Your account registration has been successful. For security purposes, Your account is pending and for review by our staff before activation. This usally takes less than an a hour!'); 
				redirect('user/login'); 
			}else{ 
				$data['error_msg'] = 'Some problems occured, please try again.'; 
				
			} 
			}else{ 
			$this->session->set_flashdata('gcaptcha_error', 'Sorry Google Recaptcha Unsuccessful!!');
				
			} 
	} 

	$data['user'] = $userData; 
	$data['region'] = $this->User_model->select_region();
	$this->load->view('templates/header'); 
	$this->load->view('register', $data); 
	$this->load->view('templates/footer'); 
   } 

   
// Existing Username check during validation 
public function user_check($str){ 
	$con = array( 
		'returnType' => 'count', 
		'conditions' => array( 
		'username' => $str 
		) 
	); 
	$checkUser = $this->User_model->getUser($con); 
	if($checkUser > 0){ 
		$this->form_validation->set_message('user_check', 'The given Username already exists.'); 
		return FALSE; 
	}else{ 
		return TRUE; 
	} 
} 

// Existing Email check during validation 
public function email_check($str){ 
	$con = array( 
		'returnType' => 'count', 
		'conditions' => array( 
		'user_email' => $str 
		) 
	); 
	$checkEmail = $this->User_model->getEmail($con); 
	if($checkEmail > 0){ 
		$this->form_validation->set_message('email_check', 'The given Email already exists.'); 
		return FALSE; 
	}else{ 
		return TRUE; 
	} 
} 

// Existing DSWD ID check during validation 
public function dswdid_check($str){ 
	$con = array( 
		'returnType' => 'count', 
		'conditions' => array( 
		'dswd_id' => $str 
		) 
	); 
	$checkDswdid = $this->User_model->getDswdid($con); 
	if($checkDswdid > 0){ 
		$this->form_validation->set_message('dswdid_check', 'The given DSWD ID already exists.'); 
		return FALSE; 
	}else{ 
		return TRUE; 
	} 
} 

// Password Strong Checker
public function password_strong($str)
{
   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str) && preg_match('#[/\W/]#', $str)) {
	 
	 
	 return TRUE;
   }
   $this->form_validation->set_message('password_strong', 'Your password must: <br>	  
   1. Be eight (8) - twenty five (25) characters <br>
   2. Have at least one (1) upper case letter <br>
   3. Have at least one (1) lower case letter <br>
   4. Have at least one (1) number <br>
   5. Have at least one (1) special character 
'); 
   return FALSE;
}


// ==================================================================
// =================== DYNAMIC DROPDOWN ADDRESS ====================
// ==================================================================
function fetch_province()
{
 if($this->input->post('region_id'))
 {
  echo $this->User_model->fetch_province_model($this->input->post('region_id'));
 }
}

function fetch_city()
{
 if($this->input->post('province_id'))
 {
  echo $this->User_model->fetch_city_model($this->input->post('province_id'));
 }
}

function fetch_brgy()
{
 if($this->input->post('city_id'))
 {
  echo $this->User_model->fetch_brgy_model($this->input->post('city_id'));
 }
}


// Forgot Password
	public function ForgotPassword()
	{
		  $user_email = $this->input->post('user_email');      
		  $findemail = $this->User_model->ForgotPassword($user_email);  
		  if($findemail){
		   $this->User_model->sendpassword($findemail);        
			}else{
		   $this->session->set_flashdata('msg',' Email not found!');
		   redirect($route);
	   }
	}


// Change Password
	public function changePassword()
    {

        $this->form_validation->set_rules('oldpass', 'old password', 'callback_password_check');
        $this->form_validation->set_rules('newpass', 'new password', 'required|min_length[6]|max_length[25]|callback_password_strong');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/navigation');
						$this->load->view('change_password');
            $this->load->view('templates/footer');
			
			
        }
        else {

            $id = $this->session->userdata('id');

            $newpass = $this->input->post('newpass');

            $this->User_model->update_user($id, array('password' => md5($newpass)));

						$this->session->set_flashdata('msg', 'Your password has been changed.');

            redirect('user/changePassword');
        }
    }

    public function password_check($oldpass)
    {
        $id = $this->session->userdata('id');
        $user = $this->User_model->get_user($id);

        if($user->password !== md5($oldpass)) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    }


	// New user login
	public function new_user()
	{
    if($this->session->userdata('user_type') == ''){
		$this->load->view('new_user');
    		}else if($this->session->userdata('user_type') == 'admin'){
						redirect('/admin');
    			}else if($this->session->userdata('user_type') == 'fo'){
        		redirect('/fo');
					}else if ($this->session->userdata('user_type') == 'co'){
						redirect('/co');
    }else{
        Redirect($route);
    }
	}

}
?>


