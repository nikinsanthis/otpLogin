<!-- Login Page -->
<div class="login">
	<h1><a href="">BioQuest </a></h1>
	<div class="login-bottom">
		<h2>Login</h2>

		<?php echo validation_errors(); 
		   if (isset($msg))
		   echo '<p>'.$msg.'</p>';?>

		<?php echo form_open('pages/authenticate'); ?>
			<div class="col-md-7">
				<div class="login-mail">
					<input type="text" placeholder="OTP" name="otp" required="">
					<i class="fa fa-key"></i>
				</div>
			</div>
			<div class="col-md-5 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="authenticateSubmit" value="Login">
				</label>
			</div>
		
			<div class="clearfix"> </div>
		</form>
	</div>
</div>