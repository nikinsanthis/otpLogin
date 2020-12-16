<div class="banner">
	<h2>
		<a href="index.html">Home</a>
		<i class="fa fa-angle-right"></i>
		<span><?php echo $title ?></span>
	</h2>
</div>

 <div class="inbox-mail">

<!-- user list content -->
<div class="col-md-12 tab-content tab-content-in">
<?php 
echo validation_errors();
if (isset($msg))
		   echo '<p>'.$msg.'</p>';?>
	<div class="tab-pane active text-style" id="tab1">
  		<div class="inbox-right">
         	
            <div class="mailbox-content">
            	<!-- Top  -->
            	<div class="mail-toolbar clearfix">
            		<div class="float-left">
            			<div class="btn-group m-r-sm mail-hidden-options" style="display: inline-block;">
	            			<?php echo $this->session->userdata('usrmail'); ?>
	                	</div>
                	</div>

                	<div class="float-right">
                		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					      Add User
					    </button>
					</div>
				</div>               
                <table class="table">
                	<thead>
                		<tr class="table-row">
                			<th>Sl .No</th>
                            <th>Name</th>
                            <th>Email ID/Username</th>
                            <th>Role</th>                          
                            <th>Country</th>
                            <th>Status</th>
                            <th>Action</th>
                		</tr>
                	</thead>
                    <tbody>
                    	<?php
                    	$sl_number = 1;
                        	foreach ($custom_user as $user) : 
                        	?>
	                        <tr class="table-row"> 
		                        <td><?php echo $sl_number; ?></td>
		                        <td><?php echo $user['user_name']; ?></td>
		                        <td><?php echo $user['user_email']; ?></td>
		                        <td><?php echo $user['user_role']; ?></td>	                          
		                        <td><?php echo $user['user_country']; ?></td>
		                        <td>
									<?php 
									$status = $user['user_status'];
									if($status == "inactive")
									{
										?>
										<a href="<?php echo site_url('/users/updateStatus/'.$user['user_id']).'/active' ?>" class="btn btn-warning">inactive</a>
										<?php
									}
									else
									{
										?>
										<a href="<?php echo site_url('/users/updateStatus/'.$user['user_id']).'/inactive' ?>" class="btn btn-success">Active</a>
										<?php
									} ?>
								</td>
		                        <td><a href="<?php echo site_url('/users/deleteUser/'.$user['user_id']) ?>"><i class="fa fa-trash"></i></a></td>
		                	</tr>
		                	<?php 
                        	$sl_number++;
	                        endforeach; 
	                    ?>
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>

<!-- Pop-up modal to add the user details-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
	      	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Add User</h4>
			</div>
			<?php echo form_open('users/addCustomUser'); ?>
				<div class="modal-body">
					<div class="form-group">
					    <label for="exampleInputEmail1">Name</label>
					    <input type="name" class="form-control" name="custom_name" placeholder="Full Name">
					</div>
				  	<div class="form-group">
					    <label for="exampleInputPassword1">Email ID (will be considered as Username)</label>
					    <input type="email" class="form-control" name="custom_email" placeholder="Email address">
				  	</div>
				  	<div class="form-group">
					    <label for="exampleInputPassword1">Country</label>
					    <!-- <input type="password" class="form-control" name="custom_country" placeholder="Country"> -->
					    <select class="form-control" name="custom_country" placeholder="Country">
					    	<option>Select Country</option>
					    	<?php
					    	foreach ($country as $cntry) :
					    	?>
					    	<option><?php echo $cntry['countryname']; ?></option>
					    	<?php
					    	endforeach;
					    	?>
					    </select>
				  	</div>
				  	<div class="form-group">
					    <label for="exampleInputPassword1">Role</label>
					    <!-- <input type="password" class="form-control" name="custom_role" placeholder="Password"> -->
					    <select class="form-control" name="custom_role" placeholder="Role">
					    	<option value="user">User</option>
					    	<option value="admin">Admin</option>
					    </select>
				  	</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Create</button>
				</div>
			</form>	
	    </div>
	</div>
</div>

<div class="clearfix"> </div>
   </div>
    
</div>