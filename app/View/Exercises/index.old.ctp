<div class="exercises index">
	<h2><?php echo __('Exercises'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('exercise_name'); ?></th>
			<th><?php echo $this->Paginator->sort('exercise_types'); ?></th>
			<th><?php echo $this->Paginator->sort('exercise_equipments'); ?></th>
			<th><?php echo $this->Paginator->sort('exercise_images'); ?></th>
			<th><?php echo $this->Paginator->sort('exercise_videos'); ?></th>
			<th><?php echo $this->Paginator->sort('exercise_bodypart'); ?></th>
			<th><?php echo $this->Paginator->sort('exercise_instructions'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($exercises as $exercise): ?>
	<tr>
		<td><?php echo h($exercise['Exercise']['id']); ?>&nbsp;</td>
		<td><?php echo h($exercise['Exercise']['exercise_name']); ?>&nbsp;</td>
		<td><?php echo h($exercise['Exercise']['exercise_types']); ?>&nbsp;</td>
		<td><?php echo h($exercise['Exercise']['exercise_equipments']); ?>&nbsp;</td>
		<td><?php echo h($exercise['Exercise']['exercise_images']); ?>&nbsp;</td>
		<td><?php echo h($exercise['Exercise']['exercise_videos']); ?>&nbsp;</td>
		<td><?php echo h($exercise['Exercise']['exercise_bodypart']); ?>&nbsp;</td>
		<td><?php echo h($exercise['Exercise']['exercise_instructions']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $exercise['Exercise']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $exercise['Exercise']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $exercise['Exercise']['id']), null, __('Are you sure you want to delete # %s?', $exercise['Exercise']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Exercise'), array('action' => 'add')); ?></li>
	
	</ul>
        
        <h3><?php echo __('Body Parts'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Body Parts'), array('controller' => 'body_parts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Body Part'), array('controller' => 'body_parts', 'action' => 'add')); ?> </li>
		
	</ul>
        <h3><?php echo __('Categories'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		
	</ul>
        <h3><?php echo __('Equipments'); ?></h3>
        <ul>

		<li><?php echo $this->Html->link(__('List Equipment'), array('controller' => 'equipment', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Equipment'), array('controller' => 'equipment', 'action' => 'add')); ?> </li>
		
	</ul>
</div>


