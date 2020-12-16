<!-- Login Page -->
<div class="login">
	<h1><a href="">BioQuest </a></h1>
	<div class="login-bottom">
		<h2>Login</h2>

		<?php echo validation_errors(); 
		   if (isset($msg))
		   echo '<p>'.$msg.'</p>';?>

		<?php echo form_open('pages/signin'); ?>
			<div class="col-md-7">
				<div class="login-mail">
					<input type="text" name="email" placeholder="Email" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" name="password" placeholder="Password" required="">
					<i class="fa fa-lock"></i>
				</div>
			</div>
			<div class="col-md-5 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="Next">
					</label>
					<p>Do not have an account?</p>
				<a href="<?php echo base_url(); ?>signup" class="hvr-shutter-in-horizontal">Signup</a>
			</div>
		
			<div class="clearfix"> </div>
		</form>
	</div>
</div>