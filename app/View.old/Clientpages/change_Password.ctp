<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Change Password'); ?></legend>
	<?php
		echo $this->Form->input('id');
                echo $this->Form->input('old_password', array('type' => 'password'));
                echo $this->Form->input('password', array('type' => 'password', 'label' => 'New Password'));
		echo $this->Form->input('new_password_confirm', array('type' => 'password'));
        
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

