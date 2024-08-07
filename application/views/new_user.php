<?php 
if(!$this->session->userdata('user_id')){
    Redirect($route);
}
?>


<h2 style="color:darkblue">We're reviewing your account.</h2><br>
<i>For security purposes, Your account is pending and for review by our staff before activation. <br>
This usally takes less than an a hour, We'll update you soon!, Please</i> <a href="<?php echo base_url().'user/logout';?>"><font color="red"><span class="glyphicon glyphicon-log-out"></span> Logout</a></font> 