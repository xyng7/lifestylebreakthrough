<div class="exercises view">
<h2><?php  echo __('Exercise'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($exercise['Exercise']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($exercise['Exercise']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Images'); ?></dt>
		<dd>
			<?php echo h($exercise['Exercise']['images']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Videos'); ?></dt>
		<dd>
			<?php echo h($exercise['Exercise']['videos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instructions'); ?></dt>
		<dd>
			<?php echo h($exercise['Exercise']['instructions']); ?>
			&nbsp;
		</dd>


<div class="related">
	<h3><?php echo __('Related Body Parts'); ?></h3>
	<?php if (!empty($exercise['BodyPart'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Body Part'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($exercise['BodyPart'] as $bodyPart): ?>
		<tr>
			<td><?php echo $bodyPart['id']; ?></td>
			<td><?php echo $bodyPart['body_part']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php echo __('Related Categories'); ?></h3>
	<?php if (!empty($exercise['Category'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category'); ?></th>
		
	</tr>
	<?php
		$i = 0;
		foreach ($exercise['Category'] as $category): ?>
		<tr>
			<td><?php echo $category['id']; ?></td>
			<td><?php echo $category['category']; ?></td>
		
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php echo __('Related Equipment'); ?></h3>
	<?php if (!empty($exercise['Equipment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Equipment'); ?></th>
		
	</tr>
	<?php
		$i = 0;
		foreach ($exercise['Equipment'] as $equipment): ?>
		<tr>
			<td><?php echo $equipment['id']; ?></td>
			<td><?php echo $equipment['equipment']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
                
                	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Exercise'), array('action' => 'edit', $exercise['Exercise']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Exercise'), array('action' => 'delete', $exercise['Exercise']['id']), null, __('Are you sure you want to delete # %s?', $exercise['Exercise']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercise'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Body Parts'), array('controller' => 'body_parts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Body Part'), array('controller' => 'body_parts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Equipment'), array('controller' => 'equipment', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Equipment'), array('controller' => 'equipment', 'action' => 'add')); ?> </li>
	</ul>
</div>