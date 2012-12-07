<h3><?php echo __('Welcome! Please login to continue'); ?></h3>

<iframe src="http://lifestylebreakthrough.com.au/templates/lifestyle/images/logo.jpg" width="400" height="400" style="overflow:hidden; border:none;">
	<p>For updates and important announcements, visit http://cakefest.org</p>
</iframe>

<div class="actions">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>	
  
	<ul>
    <fieldset>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    
            <?php echo $this->Form->end(__('Login')); ?>
        </fieldset>
	</ul>
</div>