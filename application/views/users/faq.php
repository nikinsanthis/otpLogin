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
    			
        	</div>
    	</div>
	</div>

	<div class="questions">
        <?php
            foreach ($questions as $que) : 
                $sl_number = 1;
            ?>
                <h5><?= $sl_number = 1; ?>. <?php echo $que['faq_question']; ?></h5>
                <p>Answer : <?php echo $que['faq_question']; ?></p>
            <?php
            endforeach;
    	?>
	</div>
</div>