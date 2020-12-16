<!-- signup Page -->
<div class="login">

	<h1><a href="">BioQuest </a></h1>
	<div class="login-bottom">
		<h2>Register</h2>

		<?php echo validation_errors(); ?> <!-- To show the errors --> 

		<?php echo form_open('pages/signup'); ?>
			<div class="col-md-7">
				<div class="login-mail">
					<input type="text" name="name" placeholder="Name" required="">
					<i class="fa fa-user"></i>
				</div>
				<div class="login-mail">
					<input type="text" name="email" placeholder="Email" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="text" name="userName" placeholder="User Name" required="">
					<i class="fa fa-user"></i>
				</div>
				<div class="login-mail">
					<input type="password" name="password" placeholder="Password" required="">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="password" name="confirmPassword" placeholder="Repeated password" required="">
					<i class="fa fa-lock"></i>
				</div>
			</div>
			<div class="col-md-5 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="Submit">
					</label>
					<p>Already register</p>
				<a href="<?php echo base_url(); ?>" class="hvr-shutter-in-horizontal">Login</a>
			</div>
		</form>
		<div class="clearfix"> </div>
	</div>
</div>