<div class="instructions form">
<?php echo $this->Form->create('Instruction', array('enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Add Instruction'); ?></legend>
	<?php
		echo $this->Form->input('instruction', array('type' => 'textarea'));
                echo __('Upload Image');
		echo $this->Form->file('image', array('label' =>'','size'=>'50'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		
	</ul>
</div>
