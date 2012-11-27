<div class="bodyParts view">
<h2><?php  echo __('Body Part'); ?></h2>
	<dl>
		<dt><?php echo __('Body Part'); ?></dt>
		<dd>
			<?php echo h($bodyPart['BodyPart']['body_part']); ?>
			&nbsp;
		</dd>
	</dl>

<br>
<br>
<div class="related">
	<h3><?php echo __('Related Exercises'); ?></h3>
	<?php if (!empty($bodyPart['Exercise'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($bodyPart['Exercise'] as $exercise): ?>
		<tr>
                        <td><?php echo $exercise['name']; ?></td>
			<td>
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
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Body Part'), array('action' => 'edit', $bodyPart['BodyPart']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Body Part'), array('action' => 'delete', $bodyPart['BodyPart']['id']), null, __('Are you sure you want to delete # %s?', $bodyPart['BodyPart']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Body Parts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Body Part'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercise'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
	</ul>
</div>