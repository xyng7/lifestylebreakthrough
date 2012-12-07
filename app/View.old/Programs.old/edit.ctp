<div class="programs form">
<?php echo $this->Form->create('Program'); ?>
	<fieldset>
		<legend><?php echo __('Edit Program'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('client_id');
		echo $this->Form->input('name');
		echo $this->Form->input('start_date', array('dateFormat' => 'DMY', 'minYear' =>date('Y'),'maxYear'=>date('Y')+50));
		echo $this->Form->input('end_date', array('dateFormat' => 'DMY', 'minYear' =>date('Y'),'maxYear'=>date('Y')+50));
		echo $this->Form->input('Exercise', array('type' => 'select','multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Program.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Program.name'))); ?></li>
		<li><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?></li>
		
	</ul>
</div>
