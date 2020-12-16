<div class="banner">
	<h2>
		<a href="index.html">Home</a>
		<i class="fa fa-angle-right"></i>
		<span><?php echo $title ?></span>
	</h2>
</div>

<?php

$user_role = $this->session->userdata('user_role'); 
echo $user_role; ?>
<div class="grid-form">
    <div class="grid-form1">
        <h3 id="forms-horizontal">Update Question</h3>
        <form class="form-horizontal" action="<?php echo base_url(); ?>users/updateFAQ" method="POST">
            <?php
            if($user_role == 'admin')
            {
                ?>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Regarding</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $faq['faq_regarding']; ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Question</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $faq['faq_question']; ?>" disabled>
                        <input type="hidden" class="form-control" name="faq_question" value="<?php echo $faq['faq_question']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Owner</label>
                    <div class="col-sm-10">
                        <select name="faq_owner" class="form-control">
                        <option value="">Select Owner</option>
                            <?php 
                            foreach ($admins as $admin) :?>
                                <option value="<?php echo $admin['user_name']; ?>"><?php echo $admin['user_name']; ?></option>
                            <?php 
                            endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Status</label>
                    <div class="col-sm-10">
                        <select name="faq_status" class="form-control">
                            <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Replay</label>
                    <div class="col-sm-10">
                        <textarea name="faq_answer" class="form-control"><?php echo $faq['faq_answer']; ?></textarea>
                    </div>
                </div>
                <?php
            }
            else
            {
                ?>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Regarding</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $faq['faq_regarding']; ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Question</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="faq_question" value="<?php echo $faq['faq_question']; ?>">
                    </div>
                </div>

                <input type="hidden" name="faq_status" value="<?php echo $faq['faq_status']; ?>" >
                <?php
            }
            ?>


            <input type="hidden" value="<?php echo $faq['faq_id']; ?>" name="faq_id">

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-1">
                    <a href="<?php echo base_url(); ?>users/my_faq" class="btn btn-danger">Cancel</a>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>