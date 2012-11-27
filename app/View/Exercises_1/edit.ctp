<div class="exercises form">
<?php echo $this->Form->create('Exercise'); ?>
	<fieldset>
		<legend><?php echo __('Edit Exercise'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('images');
		echo $this->Form->input('videos');
		echo $this->Form->input('instructions');
		echo $this->Form->input('BodyPart');
		echo $this->Form->input('Category');
		echo $this->Form->input('Equipment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Exercise.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Exercise.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Body Parts'), array('controller' => 'body_parts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Body Part'), array('controller' => 'body_parts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Equipment'), array('controller' => 'equipment', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Equipment'), array('controller' => 'equipment', 'action' => 'add')); ?> </li>
	</ul>
</div>
