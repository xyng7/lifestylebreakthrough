<div class="postcodes form">
<?php echo $this->Form->create('Postcode'); ?>
	<fieldset>
		<legend><?php echo __('Edit Postcode'); ?></legend>
	<?php
		echo $this->Form->input('Pcode');
		echo $this->Form->input('Locality');
		echo $this->Form->input('State');
		echo $this->Form->input('Comments');
		echo $this->Form->input('DeliveryOffice');
		echo $this->Form->input('PresortIndicator');
		echo $this->Form->input('ParcelZone');
		echo $this->Form->input('BSPnumber');
		echo $this->Form->input('BSPname');
		echo $this->Form->input('Category');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Postcode.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Postcode.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Postcodes'), array('action' => 'index')); ?></li>
	</ul>
</div>
