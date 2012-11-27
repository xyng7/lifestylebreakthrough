<div class="equipment form">
<?php echo $this->Form->create('Equipment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Equipment'); ?></legend>
	<?php
		echo $this->Form->input('equipment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Equipment.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Equipment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Equipment'), array('action' => 'index')); ?></li>
	</ul>
</div>
