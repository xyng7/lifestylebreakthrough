<div class="postcodes index">
	<h2><?php echo __('Postcodes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Pcode'); ?></th>
			<th><?php echo $this->Paginator->sort('Locality'); ?></th>
			<th><?php echo $this->Paginator->sort('State'); ?></th>
			<th><?php echo $this->Paginator->sort('Comments'); ?></th>
			<th><?php echo $this->Paginator->sort('DeliveryOffice'); ?></th>
			<th><?php echo $this->Paginator->sort('PresortIndicator'); ?></th>
			<th><?php echo $this->Paginator->sort('ParcelZone'); ?></th>
			<th><?php echo $this->Paginator->sort('BSPnumber'); ?></th>
			<th><?php echo $this->Paginator->sort('BSPname'); ?></th>
			<th><?php echo $this->Paginator->sort('Category'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($postcodes as $postcode): ?>
	<tr>
		<td><?php echo h($postcode['Postcode']['Pcode']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['Locality']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['State']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['Comments']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['DeliveryOffice']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['PresortIndicator']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['ParcelZone']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['BSPnumber']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['BSPname']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['Category']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $postcode['Postcode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $postcode['Postcode']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $postcode['Postcode']['id']), null, __('Are you sure you want to delete # %s?', $postcode['Postcode']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Postcode'), array('action' => 'add')); ?></li>
	</ul>
</div>
