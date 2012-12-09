<div style="float: right; width: 60%; margin-right: 100px;">   
    <div style="width:300px;">
<?php echo $this->Session->flash(); ?></div>
    <?php echo $this->Form->create('User'); ?>
	<fieldset style="width: 50%;">
		<legend><?php echo __('Reset Password'); ?></legend>
	<?php
                echo $this->Form->input('password', array('type' => 'password', 'label' => 'New Password'));
		echo $this->Form->input('new_password_confirm', array('type' => 'password'));
	?>


	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
