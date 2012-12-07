<div class="categories view">
<h2><?php  echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo h($category['Category']['category']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercise'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Exercises'); ?></h3>
	<?php if (!empty($category['Exercise'])): ?>
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
		foreach ($category['Exercise'] as $exercise): ?>
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
