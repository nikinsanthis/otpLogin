<div class="banner">
	<h2>
		<a href="index.html">Home</a>
		<i class="fa fa-angle-right"></i>
		<span><?php echo $title ?></span>
	</h2>
</div>


<div class="">
	<div class="login-bottom">
		<h2>Reset Password</h2>

		<?php echo validation_errors(); 
		   if (isset($msg))
		   echo '<p>'.$msg.'</p>';?>

		<?php echo form_open('users/resetpassword'); ?>
			<div class="col-md-7">
				<div class="login-mail">
					<input type="text" name="password" placeholder="Password" required="">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="password" name="confirm_password" placeholder="Confirm Password" required="">
					<i class="fa fa-lock"></i>
				</div>
			</div>
			<div class="col-md-5 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="resetpwd" value="Submit">
					</label>
			</div>
		
			<div class="clearfix"> </div>
		</form>
	</div>
</div>