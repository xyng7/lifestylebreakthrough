<div class="instructions view">
<h2><?php  echo __('Instruction'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($instruction['Instruction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exercise'); ?></dt>
		<dd>
			<?php echo $this->Html->link($instruction['Exercise']['name'], array('controller' => 'exercises', 'action' => 'view', $instruction['Exercise']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instruction'); ?></dt>
		<dd>
			<?php echo h($instruction['Instruction']['instruction']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($instruction['Instruction']['image']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Instruction'), array('action' => 'edit', $instruction['Instruction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Instruction'), array('action' => 'delete', $instruction['Instruction']['id']), null, __('Are you sure you want to delete # %s?', $instruction['Instruction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Instructions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instruction'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercise'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
	</ul>
</div>
