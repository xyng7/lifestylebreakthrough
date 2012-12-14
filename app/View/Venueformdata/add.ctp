<div class="venueformdata form">
<?php echo $this->Form->create('Venueformdatum'); ?>
	<fieldset>
		<legend><?php echo __('Add Venue'); ?></legend>
	<?php
		echo $this->Form->input('venue');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Venues'), array('action' => 'index')); ?></li>
	</ul>
</div>
