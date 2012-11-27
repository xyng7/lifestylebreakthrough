<div class="postcodes view">
<h2><?php  echo __('Postcode'); ?></h2>
	<dl>
		<dt><?php echo __('Pcode'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['Pcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Locality'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['Locality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['State']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['Comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DeliveryOffice'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['DeliveryOffice']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PresortIndicator'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['PresortIndicator']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ParcelZone'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['ParcelZone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BSPnumber'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['BSPnumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BSPname'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['BSPname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['Category']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Postcode'), array('action' => 'edit', $postcode['Postcode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Postcode'), array('action' => 'delete', $postcode['Postcode']['id']), null, __('Are you sure you want to delete # %s?', $postcode['Postcode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Postcodes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postcode'), array('action' => 'add')); ?> </li>
	</ul>
</div>
