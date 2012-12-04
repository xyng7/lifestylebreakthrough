<?php
echo $this->Html->script(array('jquery-1.8.3', 'datepicker/jquery-ui', 'jquery.fastLiveFilter'));
echo $this->Html->CSS(array('datepicker/jquery-ui'));
?>
<!-- start -->
<?php
echo $this->Html->script('DatePicker');
echo $this->Html->css('datepicker/jquery-ui-1.8.23.custom');
?>

<script>
    $(document).ready(function() {
        $("#datepicker").datepicker({
            dateFormat : 'yy-mm-dd', altFormat : 'yy-mm-dd'
        });
</script>

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
	<h4><?php //echo __('Exercises'); ?></h4>
	<?php if (!empty($program['Exercise'])): ?>
	<table cellpadding = "0" cellspacing = "0" style="width:650px;">
	<tr>    
                <th></th>
		<th><?php echo __('Name'); ?></th>
                <th><?php echo __('Sets'); ?></th>
                <th><?php echo __('Reps'); ?></th>
                <th><?php echo __('Rest'); ?></th>
                <th><?php echo __('Load'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        <?php $this->Form->create('actual');?>
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
                <tr style="background: red;">
                    <td style="text-align: right;"><b><?php echo __('Progress'); ?></b></td>
                    <td></td>
                    <td><?php echo $this->Form->input('actual_sets', array('type' => 'select', 'label' => '', 'options' => array(1,2,3,4,5,6,7,8,9,10)));?></td>
                    <td><?php echo $this->Form->input('actual_reps', array('type' => 'select', 'label' => '', 'options' => array(1,2,3,4,5,6,7,8,9,10)));?></td>
                    <td><?php echo $this->Form->input('actual_res', array('type' => 'select', 'label' => '', 'options' => array(1,2,3,4,5,6,7,8,9,10)));?></td>
                    <td><?php echo $this->Form->input('actual_load', array('type' => 'select', 'label' => '', 'options' => array(1,2,3,4,5,6,7,8,9,10)));?></td>
                    <td></td>
                </tr>
                <?php $i++; ?>
	<?php endforeach; ?>
	</table>
        <?php echo $this->Form->submit(__('actual'));?>
        <?php echo $this->Form->input('date', array('id' => 'datepicker', 'class' => 'datepicker', 'type' => 'text', 'label' => array('text' => '<p align="left">Date</p>', 'style' => 'align:left'))); ?>
<?php endif; ?>
</div>
</div>
