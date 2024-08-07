<?php 
   if($this->session->userdata('id')){
    redirect($route);
    }

	$csrf = array(
		'name' => $this->security->get_csrf_token_name(),
		'hash' => $this->security->get_csrf_hash()
		);

	?>

<!-- REGISTRATION -->
<body id="page-top">
<section id="register">
	<div class="card">
		<header>
			<div class="card-header py-3">
				Account Registration
			</div>
		</header>
		<div class="card-body">
			<main>
				<form method="POST"  action="" autocomplete="off">
					<div class="container">
			
						<div><label class="label">Field Office</label></div>

						<div class="card-option">
							<label for="region_id" class="label">Region<font style="color:red">*</font></label>
							<select name="region_id" id="region" class="form-control input" placeholder="Region" required>
								<option value="" class="text-dark">Select Region</option>
									<?php
										$counter = 1;
										foreach($region as $row)
										{
										echo '<option value="'.$row->region_id.'" class="text-dark">'.$counter.' - '.$row->region_name.'</option>';
											$counter++;
										}
									?>
							</select>
						</div>

						<div class="card-option">
							<label class="label">Province<font style="color:red">*</font></label>
							<select name="province_id" id="province" class="form-control input">
								<option value="">Select Region First</option>
							</select>
						</div>

						<div class="card-option">
							<label class="label">Municipality/City<font style="color:red">*</font></label>
							<select name="city_id" id="city" class="form-control input">
								<option value="">Select Region First</option>
							</select>
						</div>

						<div class="card-option">
							<label class="label">Barangay<font style="color:red">*</font></label>
							<select name="brgy_id" id="brgy" class="form-control input">
								<option value="">Select Region First</option>
							</select>
						</div>

						<hr>
						<div class="card-field">
							<input name="dswd_id" type="text" class="form-control input" placeholder="DSWD ID" required>
							<label for="dswd_id" class="label">DSWD ID No.</label>
						</div>
						<div class="card-field">
							<input name="first_name" type="text" class="form-control input" placeholder="First Name" required>
							<label for="first_name" class="label">First Name</label>
						</div>
						<div class="card-field">
							<input name="middle_name" type="text" class="form-control input" placeholder="Middle Name" required>
							<label for="middle_name" class="label">Middle Name</label>
						</div>
						<div class="card-field">
							<input name="last_name" type="text" class="form-control input" placeholder="Last Name" required>
							<label for="last_name" class="label">Last Name</label>
						</div>
						<div class="card-field">
							<input name="ext_name" type="text" class="form-control input" placeholder="Ext. Name">
							<label for="ext_name" class="label">Ext. Name</label>
						</div>
						<div class="card-option mt-3">
							<select name="sex" class="form-control input" required >
								<option value="">Please Select Sex</option>
								<option value="1">1 - Male</option>
								<option value="2">2 - Female</option>
							</select>
						</div>
						<div class="card-field">
							<input name="user_email" type="email" class="form-control input"value="<?php echo !empty($user['user_email'])?$user['user_email']:''; ?>" placeholder="DSWD ID No" placeholder="Email" required>
										<?php echo form_error('user_email','<p class="help-block text-danger">','</p>'); ?>
							<label for="user_email" class="label">Email</label>
						</div>
						<hr>
						<div class="card-field">
							<input type="text" name="username"  class="form-control input"value="<?php echo !empty($user['username'])?$user['username']:''; ?>" placeholder="Username" required>
										<?php echo form_error('username','<p class="help-block text-danger">','</p>'); ?>
							<label for="username" class="label">Username</label>
						</div>

						<div class="card-field">
							<input type="password" name="password" id="reg_password"   class="form-control input" value="<?php echo !empty($user['password'])?$user['password']:''; ?>" placeholder="Password" required>
										<?php echo form_error('password','<p class="help-block text-danger">','</p>'); ?>
							<span toggle="#reg_password-field" class="fa-solid fa-eye field-icon toggle-reg_password span-eye" title="Show Password"></span>
							<label for="password" class="label">Password</label>

						<span id="message">
							<p>Password must contain the following:</p>
							<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
							<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
							<p id="number" class="invalid">A <b>number</b></p>
							<p id="length" class="invalid">Minimum <b>8 characters</b></p>
						</span>
						</div>

						<div class="card-field">
							<input id="conf_password" name="conf_password" type="password" class="form-control input" value="<?php echo !empty($user['conf_password'])?$user['conf_password']:''; ?>" placeholder="Repeat Password" required>

							<?php echo form_error('conf_password','<p class="help-block text-danger">','</p>'); ?>
							<span toggle="#conf_password-field" class="fa-solid fa-eye field-icon toggle-conf_password span-eye" title="Show Password"></span>
							<label for="conf_password" class="label">Repeat Password</label>
							
						</div>
					</div>


					<div class="container">
						<div class="form-submit">
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
							<button type="submit" name="signupSubmit" value="" class="form-control hvr-back-pulse btn btn-primary submit px-3">SIGN UP</button>
						</div>
					</div>
				</form>
			</main>
			
		<footer>
			<div class="card-footer py-1 text-dark">
				Already have an account? 
				<a href="<?php echo base_url(); ?>" class="sign-in">Sign In</a>
			</div>
		</footer>
	</div>
</section>


<script>
	var myInput = document.getElementById("reg_password");
	var letter = document.getElementById("letter");
	var capital = document.getElementById("capital");
	var number = document.getElementById("number");
	var length = document.getElementById("length");

	// When the user clicks on the password field, show the message box
	myInput.onfocus = function() {
		document.getElementById("message").style.display = "block";
	}

	// When the user clicks outside of the password field, hide the message box
	myInput.onblur = function() {
		document.getElementById("message").style.display = "none";
	}

	// When the user starts to type something inside the password field
	myInput.onkeyup = function() {
		// Validate lowercase letters
		var lowerCaseLetters = /[a-z]/g;
		if(myInput.value.match(lowerCaseLetters)) {  
			letter.classList.remove("invalid");
			letter.classList.add("valid");
		} else {
			letter.classList.remove("valid");
			letter.classList.add("invalid");
		}
		
		// Validate capital letters
		var upperCaseLetters = /[A-Z]/g;
		if(myInput.value.match(upperCaseLetters)) {  
			capital.classList.remove("invalid");
			capital.classList.add("valid");
		} else {
			capital.classList.remove("valid");
			capital.classList.add("invalid");
		}

		// Validate numbers
		var numbers = /[0-9]/g;
		if(myInput.value.match(numbers)) {  
			number.classList.remove("invalid");
			number.classList.add("valid");
		} else {
			number.classList.remove("valid");
			number.classList.add("invalid");
		}
		
		// Validate length
		if(myInput.value.length >= 8) {
			length.classList.remove("invalid");
			length.classList.add("valid");
		} else {
			length.classList.remove("valid");
			length.classList.add("invalid");
		}
	}
</script>


<!-- DYNAMIC ADDRESS -->
<script>
  $(document).ready(function() {
    $('#region').change(function() {
      const region_id = $('#region').val();
      if (region_id != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>User/fetch_province",
          method: "POST",
          data: { region_id: region_id },
          success: function(data) {
            $('#province').html(data);
            $('#city').html('<option value="">Select Province First</option>');
            $('#brgy').html('<option value="">Select Province First</option>');
          }
        });
      } else {
        $('#province').html('<option value="">Select Province</option>');
        $('#city').html('<option value="">Select Municipality</option>');
        $('#brgy').html('<option value="">Select Barangay</option>');
      }
    });

    $('#province').change(function() {
      const province_id = $('#province').val();
      if (province_id != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>User/fetch_city",
          method: "POST",
          data: { province_id: province_id },
          success: function(data) {
            $('#city').html(data);
            $('#brgy').html('<option value="">Select Municipality First</option>');
          }
        });
      } else {
        $('#city').html('<option value="">Select City</option>');
        $('#brgy').html('<option value="">Select Barangay</option>');
      }
    });

    $('#city').change(function() {
      const city_id = $('#city').val();
      if (city_id != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>User/fetch_brgy",
          method: "POST",
          data: { city_id: city_id },
          success: function(data) {
            $('#brgy').html(data);
          }
        });
      } else {
        $('#brgy').html('<option value="">Select Barangay</option>');
      }
    });
  });
</script>