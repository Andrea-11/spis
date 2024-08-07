<?php
class User_model extends CI_Model {

  function __construct() { 
    // Set table name 
} 

public $username;
public $password;


public function validate($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $result = $this->db->get('tbl_users', 1);

        return $result;
      }

// Existing Username check during validation 
      function getUser($params = array()){ 
        $this->db->select('*'); 
        $this->db->from('tbl_users'); 
         
        if(array_key_exists("conditions", $params)){ 
            foreach($params['conditions'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("username", $params) || $params['returnType'] == 'single'){ 
                if(!empty($params['username'])){ 
                    $this->db->where('username', $params['username']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('username', 'desc'); 
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

// Existing Email check during validation 
function getEmail($params = array()){ 
    $this->db->select('*'); 
    $this->db->from('tbl_users'); 
     
    if(array_key_exists("conditions", $params)){ 
        foreach($params['conditions'] as $key => $val){ 
            $this->db->where($key, $val); 
        } 
    } 
     
    if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
        $result = $this->db->count_all_results(); 
    }else{ 
        if(array_key_exists("user_email", $params) || $params['returnType'] == 'single'){ 
            if(!empty($params['user_email'])){ 
                $this->db->where('user_email', $params['user_email']); 
            } 
            $query = $this->db->get(); 
            $result = $query->row_array(); 
        }else{ 
            $this->db->order_by('user_email', 'desc'); 
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

// Existing DSWD ID check during validation 
function getDswdid($params = array()){ 
    $this->db->select('*'); 
    $this->db->from('tbl_users'); 
     
    if(array_key_exists("conditions", $params)){ 
        foreach($params['conditions'] as $key => $val){ 
            $this->db->where($key, $val); 
        } 
    } 
     
    if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
        $result = $this->db->count_all_results(); 
    }else{ 
        if(array_key_exists("dswd_id", $params) || $params['returnType'] == 'single'){ 
            if(!empty($params['dswd_id'])){ 
                $this->db->where('dswd_id', $params['dswd_id']); 
            } 
            $query = $this->db->get(); 
            $result = $query->row_array(); 
        }else{ 
            $this->db->order_by('dswd_id', 'desc'); 
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

//Register
function registermodel($userDataxss)
{
    $insert = $this->db->insert('tbl_users', $userDataxss); 
    return true;
}

function select_region()
 {
  $this->db->order_by("region_id", "ASC");
  $this->db->where('region_id!=', '18');
  $query = $this->db->get("lib_region");
  return $query->result();
 }

    // function select_center($region_id)
    // {
    // $this->db->where('region_id', $region_id);
    // $this->db->order_by('center_id', 'ASC');
    // $query = $this->db->get('lib_center');
    // $output = '<option value="" disabled selected>Select Center</option>';
    // foreach($query->result() as $row)
    // {
    // $output .= '<option value="'.$row->center_id.'">'.$row->center_name.'</option>';
    // }
    // return $output;
    // }

    // function select_sector($center_id)
    // {
    //     $this->db->where('center_id', $center_id);
    //     $this->db->order_by('sector_id', 'ASC');
    //     $query = $this->db->get('lib_sector');
    //     $output = ''; 
    //     foreach($query->result() as $row)
    //     {
    //         $output .= '<option value="'.$row->sector_id.'">'.$row->sector_name.'</option>';
    //     }
    //     return $output;
    // }
    

public function ForgotPassword($user_email)
{   
       $this->db->select('user_email');
       $this->db->from('tbl_users'); 
       $this->db->where('user_email', $user_email); 
       $query=$this->db->get();
       return $query->row_array();
}
public function sendpassword($data)
{



    $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
    $userIp=$this->input->ip_address();
 
    $secret = $this->config->item('google_secret');

    $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
     
    $status= json_decode($output, true);


       $user_email = $data['user_email'];
       $query1=$this->db->query("SELECT *  from tbl_users where user_email = '".$user_email."' ");
       $row=$query1->result_array();
       if ($query1->num_rows()>0 && $status['success'])
     
{
       $passwordplain = "";
       $passwordplain  = rand(99,999);
       $reset_password = 'gbvndrs!'.$passwordplain.'$';
       $newpass['password'] = md5($reset_password);
       $this->db->where('user_email', $user_email);
       $this->db->update('tbl_users', $newpass); 


    

       $this->load->library('phpmailer_lib');
        
       // PHPMailer object
       $mail = $this->phpmailer_lib->load();


        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'idbs.spt.tm@gmail.com';
        $mail->Password = 'tqfakdwakoqvtjxb';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;
        $mail->setFrom('idbs.spt.tm@gmail.com', 'NOREPLY');
        $mail->addAddress($user_email);
        $mail->Subject = 'Reset Password';

        $mail_message='Dear '.$row[0]['fname'].','. "\r\n";
        $mail_message.='<br><br>Thank you for contacting us about your forgotten password.<br> <br> The temporary password for you is <b>'.$reset_password.'</b>'."\r\n";
        $mail_message.='<br><br>Please change your password.';
        $mail_message.='<br><br>Thanks & Regards';
        $mail_message.='<br><br>SPIS';    
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;

if ($mail->send() && $status['success']) {


    $this->session->set_flashdata('success_msg','Password sent to your email!');

} else {
  $this->session->set_flashdata('msg','Failed to send password, please try again!');
}
 redirect($route);        
}
else
{  
$this->session->set_flashdata('msg','Sorry Google Recaptcha Unsuccessful!!');
redirect($route);
}
}


// Change Password
public function get_user($id)
{
    $this->db->where('id', $id);
    $query = $this->db->get('tbl_users');
    return $query->row();
}

public function update_user($id, $userdata)
{
    $this->db->where('id', $id);
    $this->db->update('tbl_users', $userdata);
}



// New Account
 var $records_per_page = 10;
 var $start_from = 0;
 var $current_page_number = 1;

 function make_query()
 {
  if(isset($_POST["rowCount"]))
  {
   $this->records_per_page = $_POST["rowCount"];
  }
  else
  {
   $this->records_per_page = 10;
  }
  if(isset($_POST["current"]))
  {
   $this->current_page_number = $_POST["current"];
  }



  $this->start_from = ($this->current_page_number - 1) * $this->records_per_page;
  $this->db->select('*');
  $this->db->from("tbl_users");
  if(!empty($_POST["searchPhrase"]))
  {
   $this->db->like('dswd_id', $_POST["searchPhrase"]);
   $this->db->like('fname', $_POST["searchPhrase"]);
   $this->db->or_like('mname', $_POST["searchPhrase"]);
   $this->db->or_like('lname', $_POST["searchPhrase"]);
   $this->db->or_like('user_email', $_POST["searchPhrase"]);
   $this->db->or_like('designation', $_POST["searchPhrase"]);
   $this->db->or_like('region_id', $_POST["searchPhrase"]);
  }
  if(isset($_POST["sort"]) && is_array($_POST["sort"]))
  {
   foreach($_POST["sort"] as $key => $value)
   {
    $this->db->order_by($key, $value);
   }
  }
  else
  {
  $this->db->where('user_type', '');
  $this->db->order_by('id', 'DESC');
  }
  if($this->records_per_page != -1)
  {
   $this->db->limit($this->records_per_page, $this->start_from);
  }
  $query = $this->db->get();
  return $query->result_array();
 }

 function count_all_data()
 {
  $this->db->select("*");
  $this->db->from("tbl_users");
  $query = $this->db->get();
  return $query->num_rows();
 }

 function insert($data)
 {
  $this->db->insert('tbl_users', $data);
 }

 function new_account_single_data($id)
 {
  $this->db->where('id', $id);
  $query = $this->db->get('tbl_users');
  return $query->result_array();
 }

 function update($data, $id)
 {
  $this->db->where('id', $id);
  $this->db->update('tbl_users', $data);
 }

 function delete($id)
 {
  $this->db->where('id', $id);
  $this->db->delete('tbl_users');
 }

 // User Region List
function fetch_user_region()
{
 $this->db->order_by("region_name", "ASC");
 $query = $this->db->get("lib_region");
 return $query->result();
}

function fetch_province_model($region_id){
    $this->db->where('region_id', $region_id);
    $this->db->order_by('province_name', 'ASC');    
    $query = $this->db->get('lib_province');
    $output = '<option value="">Select province</option>';
    $counter = 1;
    foreach($query->result() as $row)
    {
        $output .= '<option value="'.$row->province_id.'">'.$counter.' - '.$row->province_name.'</option>';
        $counter++;
    }
    return $output;
}

public function fetch_city_model($province_id){
    $this->db->where('province_id', $province_id);
    $this->db->order_by('city_name', 'ASC');
    $query = $this->db->get('lib_municipality');
    $output = '<option value="">Select Municipality</option>';
    $counter = 1;
    foreach($query->result() as $row)
    {
        $output .= '<option value="'.$row->city_id.'">'.$counter.' - '.$row->city_name.'</option>';
        $counter++;
    }
    return $output;
}

public function fetch_brgy_model($city_id){
    $this->db->where('city_id', $city_id);
    $this->db->order_by('brgy_name', 'ASC');
    $query = $this->db->get('lib_barangay');
    $output = '<option value="">Select Barangay</option>';
    $counter = 1;
    foreach($query->result() as $row)
    {
        $output .= '<option value="'.$row->brgy_id.'">'.$counter.' - '.$row->brgy_name.'</option>';
        $counter++;
    }
    return $output;
}


// User List


}
?>