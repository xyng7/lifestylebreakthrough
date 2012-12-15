<div class="venueformdata index">
	<h4><?php echo __('Request appointment form data - Venues'); ?></h4>
	<table id="js-datatable" cellpadding="0" cellspacing="0">
        <thead>
	<tr>
			<th><?php echo $this->Paginator->sort('venue'); ?></th>
			<th><?php echo __('Actions'); ?></th>
	</tr>
        </thead>
        <tbody>
	<?php
	foreach ($venueformdata as $venueformdatum): ?>
	<tr>
		<td><?php echo h($venueformdatum['Venueformdatum']['venue']); ?>&nbsp;</td>
		<td>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $venueformdatum['Venueformdatum']['id'])); ?><br>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $venueformdatum['Venueformdatum']['id']), null, __('Are you sure you want to delete # %s?', $venueformdatum['Venueformdatum']['venue'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </tbody>
	</table>
	

	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Venue'), array('action' => 'add')); ?></li>
	</ul>
</div>
