<?php 
	$csrf = array(
		'name' => $this->security->get_csrf_token_name(),
		'hash' => $this->security->get_csrf_hash()
		);
		
	if($this->session->flashdata('success_register')){ ?>
			<div class="alert alert-info"> 
				<?php echo $this->session->flashdata('success_register'); ?>
			</div>
	<?php } 
	if($this->session->flashdata('error')){ ?>
			<div class="alert alert-danger"> 
				<?php echo $this->session->flashdata('error'); ?>
			</div>
	<?php } ?>

<!-- LOGIN -->

<style>

</style>
<section id="login">
	<form method="POST"  action="<?php echo base_url(); ?>user/authenticate" autocomplete="off">
		<div style="margin-top: 50px;"></div>
		<div style="text-align: center">
			<h2>Social Pension Login Form</h2>
			</div>
				<div class="card">
					<div class="card-header py-3">
						Login
					</div>
						<div class="card-body">
							<div class="field">
								<input type="text" name="username" class="form-control input" placeholder="Username" />
								<label for="username"> Username </label>
							</div>

							<div class="field">
								<input id="log_password" name="password" type="password" class="form-control input" placeholder="Password" required>
								<span toggle="#log_password-field " class="fa-solid fa-eye field-icon toggle-log_password span-eye " title="Show Password"></span>
								<label for="pass" class="label">Password</label>

							</div>

							<div class="text-end">
								<a href="#forgot" data-bs-toggle="modal" data-bs-target="#forgot_password" class="fpassword">Forgot Password?</a>
							</div>
								<br>
							<div>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
								<button type="submit" name="submit" class="form-control submit px-3">Log In</button>
							</div>
						</div>
				
	</form>

				
			<div class="card-footer border-1 text-center text-dark">
				Don't have an account? <a href="<?php echo base_url(); ?>user/registration" class="sign-up">&nbsp;Sign up</a>
			</div>
		</div>
	</div>
</section>	

<!-- Forgot Password -->
<div class="modal fade" id="forgot_password" tabindex="-1" aria-labelledby="forgot_password" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forgot_password">Forgot Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Please enter your email address" required>

      </div>
      <div class="modal-footer">
	  <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

        <button type="button" class="btn btn-primary">Reset</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>