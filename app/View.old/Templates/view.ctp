<div class="templates view">
<h3><?php  echo __('Template'); ?></h3>
	<dl>
		
		<dt><?php echo __('Template Name'); ?></dt>
		<dd>
			<?php echo h($template['Template']['name']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($template['Template']['notes']); ?>
			&nbsp;
		</dd>
	</dl>

<div class="related">
	<h3><?php echo __('Exercises'); ?></h3>
	<?php if (!empty($template['Exercise'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>    
                <th><?php echo __('Number'); ?></th>
		<th><?php echo __('Name'); ?></th>
                <th><?php echo __('Sets'); ?></th>
                <th><?php echo __('Reps'); ?></th>
                <th><?php echo __('Rest(Sec)'); ?></th>
                <th><?php echo __('Load(Kg)'); ?></th>
		
	</tr>
	<?php
		$i = 1;
		foreach ($template['Exercise'] as $exercise): ?>
		<tr>
                        
                        <td><?php echo $i; ?></td>
			<td><?php echo $exercise['name']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_templates']['rec_sets']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_templates']['rec_reps']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_templates']['rec_res']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_templates']['rec_load']; ?></td>
                        
		</tr>
                <?php $i++; ?>
	<?php endforeach; ?>
	</table>
            <?php endif; ?>

	
</div>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('List Templates'), array('action' => 'index')); ?> </li>
		
	</ul>
</div>