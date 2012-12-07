<div class="equipment view">
<h2><?php  echo __('Equipment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($equipment['Equipment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Equipment'); ?></dt>
		<dd>
			<?php echo h($equipment['Equipment']['equipment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Equipment'), array('action' => 'edit', $equipment['Equipment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Equipment'), array('action' => 'delete', $equipment['Equipment']['id']), null, __('Are you sure you want to delete # %s?', $equipment['Equipment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Equipment'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Equipment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercise'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Exercises'); ?></h3>
	<?php if (!empty($equipment['Exercise'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Images'); ?></th>
		<th><?php echo __('Videos'); ?></th>
		<th><?php echo __('Instructions'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($equipment['Exercise'] as $exercise): ?>
		<tr>
			<td><?php echo $exercise['id']; ?></td>
			<td><?php echo $exercise['name']; ?></td>
			<td><?php echo $exercise['images']; ?></td>
			<td><?php echo $exercise['videos']; ?></td>
			<td><?php echo $exercise['instructions']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'exercises', 'action' => 'view', $exercise['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'exercises', 'action' => 'edit', $exercise['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'exercises', 'action' => 'delete', $exercise['id']), null, __('Are you sure you want to delete # %s?', $exercise['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Exercise'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
