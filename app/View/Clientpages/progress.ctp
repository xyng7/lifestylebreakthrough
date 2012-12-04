<div class="programs view">
<h3><?php  echo __('hihi Program'); ?></h3>
	<dl>
		<dt><?php echo __('Program Name'); ?></dt>
		<dd>
			<?php echo h($program['Program']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo $this->Time->format('d-m-Y', h($program['Program']['start_date'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo $this->Time->format('d-m-Y', h($program['Program']['end_date'])); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($program['Program']['notes']); ?>
			&nbsp;
		</dd>
	</dl>

<br>
<div class="related">
	<h4><?php echo __('Exercises'); ?></h4>
	<?php if (!empty($program['Exercise'])): ?>
	<table cellpadding = "0" cellspacing = "0" style="width:650px;">
	<tr>    
                <th><?php echo __('Number'); ?></th>
		<th><?php echo __('Name'); ?></th>
                <th><?php echo __('Sets'); ?></th>
                <th><?php echo __('Reps'); ?></th>
                <th><?php echo __('Rest'); ?></th>
                <th><?php echo __('Load'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        <?php $this->From->create('actual');?>
	<?php
		$i = 1;
		foreach ($program['Exercise'] as $exercise): ?>
		<tr>
                        
                        <td style="text-align: right;"><b><?php echo __('Recommended'); ?></b></td>
                       
			<td><?php echo $exercise['name']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_sets']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_reps']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_res']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_load']; ?></td>
                        <td>
				<?php echo $this->Html->link(__('Exercise Instruction'), array('action' => 'viewExercise', $exercise['id'])); ?>
				
			</td>
                     
                        
		</tr>
                <tr>
                    <td></td>
                    <td style="text-align: right;"><b><?php echo __('Progress'); ?></b></td>
                    <td><?php echo $this->Form->input('actual_sets', array('type' => 'select'));?></td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td></td>
                </tr>
                <?php $i++; ?>
	<?php endforeach; ?>
	</table>
        <?php echo $this->From->submit(__('actual'));?>
<?php endif; ?>
</div>
</div>
