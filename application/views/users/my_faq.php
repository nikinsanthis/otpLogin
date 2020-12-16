<div class="banner">
	<h2>
		<a href="index.html">Home</a>
		<i class="fa fa-angle-right"></i>
		<span><?php echo $title ?></span>
	</h2>
</div>

<div class="asked">
	<div class="mail-toolbar clearfix">
		<div class="float-left">
			<div class="btn-group m-r-sm mail-hidden-options" style="display: inline-block;">
            <?php echo $this->session->userdata('usrmail'); ?>
        	</div>
    	</div>
        <?php 
        if($this->session->userdata('user_role') == 'user')
        {
            ?>
            <div class="float-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Ask Questions
                </button>
            </div>
            <?php
        }
        ?>
                
	</div>

	<div class="questions">

        <table class="table">
            <thead>
                <tr class="table-row">
                    <th>Sl .No</th>
                    <th>Owner</th>
                    <th>Regarding</th>                       
                    <th>Country</th>
                    <th>Query</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sl_number = 1;
                    foreach ($questions as $que) : 
                    ?>
                    <tr class="table-row"> 
                        <td><?php echo $sl_number; ?></td>
                        <td><?php echo $que['faq_owner']; ?></td>
                        <td><?php echo $que['faq_regarding']; ?></td>
                        <td><?php echo $que['faq_usercountry']; ?></td>	                          
                        <td><?php echo $que['faq_question']; ?></td>
                        <td><?php 
                            $status = $que['faq_status'];
                            if($status == "open")
                            {
                                ?>
                                <a href="<?php echo site_url('/users/editFAQ/'.$que['faq_id']) ?>" class="btn btn-warning">OPEN</a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a class="btn btn-success">CLOSED</a>
                                <?php
                            } ?>
                        </td>
                    </tr>
                    <?php 
                    $sl_number++;
                    endforeach; 
                ?>
            </tbody>
        </table>
	</div>

    <!-- Pop-up modal to add the user details-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Ask Question</h4>
                </div>
                <?php echo form_open('users/askQuestion'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="que_name">Name</label>
                            
                            <input type="text" class="form-control" name="que_name" value="<?php echo $userdetail['user_name'] ?>">
                            
                        </div>

                        <div class="form-group">
                            <label for="que_country">Country</label>
                            <input type="text" class="form-control" name="que_country" value="<?php echo $userdetail['user_country'] ?>">
                            
                        </div>

                        <div class="form-group">
                            <label for="que_question_type">Question Regarding</label>
                            <select class="form-control" name="que_question_title" placeholder="Country" >
                                <option value="Enqiure">Enqiure</option>
                                <option value="FAQ">Ask Question</option>
                                <option value="suggestion">Suggestion</option>

                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="que_file">File </label>
                            <input type="file" class="form-control" name="que_file">
                        </div>
                        
                        <div class="form-group">
                            <label for="que_text">Type Question</label>
                            <textarea class="form-control" name="que_text" placeholder="type your question"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>	
            </div>
        </div>
    </div>

</div>