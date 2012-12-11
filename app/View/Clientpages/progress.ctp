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
     $('.datepicker').each(function(){
    $(this).datepicker({
            dateFormat : 'dd-mm-yy', altFormat : 'yy-mm-dd'
        });
});
    });
</script>
<!-- end -->
<script>
    $(function() {
        $('#search_input').fastLiveFilter('#search_list');
    });
</script>

<div class="programs view">
<h3><?php  echo __('Program Progress'); ?></h3>
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
<div style="width:650px;">
<?php echo $this->Session->flash(); ?></div>
<div class="related">
	<h4><?php //echo __('Exercises'); ?></h4>
	<?php if (!empty($program['Exercise'])): ?>
	<table cellpadding = "0" cellspacing = "0" style="width:650px;">
	<tr>    
                <th><?php echo __('Name'); ?></th>
		<th></th>
                <th><?php echo __('Sets'); ?></th>
                <th><?php echo __('Reps'); ?></th>
                <th><?php echo __('Rest'); ?></th>
                <th><?php echo __('Load'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        <?php echo $this->Form->create('actual');?>
	<?php
		$i = 1;
		foreach ($program['Exercise'] as $exercise): ?>
                <?php 
                    $setsdef = null;
                    $act_reps = null;
                    $act_res = null;
                    $act_load = null;
                    $date = null;
                    if ($exercise['ExercisesProgram']['act_sets'] != null) {
                        $setsdef = $exercise['ExercisesProgram']['act_sets'];
                    }
                    if ($exercise['ExercisesProgram']['act_reps'] != null) {
                        $act_reps = $exercise['ExercisesProgram']['act_reps'];
                    }
                    if ($exercise['ExercisesProgram']['act_res'] != null) {
                        $act_res = $exercise['ExercisesProgram']['act_res'];
                    }
                    if ($exercise['ExercisesProgram']['act_load'] != null) {
                        $act_load = $exercise['ExercisesProgram']['act_load'];
                    }
                    if ($exercise['ExercisesProgram']['date'] != null) {
                        $date = $exercise['ExercisesProgram']['date'];
                    }
                        
                ?>
              
		<tr>
                        <td><b><?php echo $exercise['name']; ?></b></td>
                        <td style="text-align: right;"><b><?php echo __('Recommended'); ?></b></td>
                       
			
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_sets']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_reps']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_res']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_load']; ?></td>
                        <td>
				<?php echo $this->Html->link(__('Exercise Instruction'), array('action' => 'viewExercise', $exercise['id'])); ?>
				
			</td>
                     
                        
		</tr>
                <tr style="background-color: #0F67A1;">
                    <?php 
                   echo $this->Form->input("Exercise.$i.id", array('type' => 'hidden', 'default' => $exercise['id']));
                   echo $this->Form->input("Exercise.$i.rec_sets", array('type' => 'hidden', 'default' => $exercisesPrograms[$i - 1]['exercises_programs']['rec_sets']));
                   echo $this->Form->input("Exercise.$i.rec_reps", array('type' => 'hidden', 'default' => $exercisesPrograms[$i - 1]['exercises_programs']['rec_reps']));
                   echo $this->Form->input("Exercise.$i.rec_res", array('type' => 'hidden', 'default' => $exercisesPrograms[$i - 1]['exercises_programs']['rec_res']));
                   echo $this->Form->input("Exercise.$i.rec_load", array('type' => 'hidden', 'default' => $exercisesPrograms[$i - 1]['exercises_programs']['rec_load']));
                    ?>
                    <td></td>
                    <td style="text-align: center; color: white;"><b><?php echo __('Progress'); ?></b></td>
                    
                    <td><?php echo $this->Form->input("Exercise.$i.actual_sets", array('type' => 'select', 'default' => $setsdef, 'label' => '<div style="color:white;">Sets</div>', 'options' => array(null,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20)));?></td>
                    <td><?php echo $this->Form->input("Exercise.$i.actual_reps", array('type' => 'select', 'default' => $act_reps, 'label' => '<div style="color:white;">Reps</div>', 'options' => array(null,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20)));?></td>
                    <td><?php echo $this->Form->input("Exercise.$i.actual_res", array('type' => 'select', 'default' => $act_res, 'label' => '<div style="color:white;">Rest(sec)</div>', 'options' => array(null,'5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25', '30' => '30', '35' => '35', '40' => '40', '45' => '45', '50' => '50', '55' => '55', '60' => '60', '65' => '65', '70' => '70', '75' => '75', '80' => '80', '85' => '85', '90' => '90')));?></td>
                    <td><?php echo $this->Form->input("Exercise.$i.actual_load", array('type' => 'select', 'default' => $act_load, 'label' => '<div style="color:white;">Load(kg)</div>', 'options' => array(null,'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25')));?></td>
                    <td><?php echo $this->Form->input("Exercise.$i.actual_date", array('type' => 'text', 'default' => $date, 'label' => '<div style="color:white;">Date Completed</div>', 'class' => 'datepicker')); ?></td>
                    
                </tr>
                <?php $i++; ?>
	<?php endforeach; ?>
	</table>
        <?php echo $this->Form->submit(__('Submit Progress'));?>
   
         
<?php endif; ?>
</div>
</div>
