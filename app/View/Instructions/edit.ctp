<div class="instructions form">
    
<?php echo $this->Form->create('Instruction', array('enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Edit Instruction'); ?></legend>
	<?php
                echo $this->Form->input('instruction', array('type' => 'textarea'));?>
                
                <h4><?php echo __('Image'); ?></h4>
                <?php
                if($instruction['Instruction']['image'] != null) 
                    { 
                        echo $this->Html->image('files/'.$instruction['Instruction']['image'], array('width' => 250, 'height' => 250));
                        //echo $this->Html->image('files/'.$instruction['Instruction']['image']); 
                    } 
                else 
                    { 
                            echo "no image available"; 
                    } 


                
		echo $this->Form->file('image', array('label' => 'Select image'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Instruction.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Instruction.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Back'), array('controller' => 'exercises', 'action' => 'view', $instruction['Instruction']['exercise_id'] )); ?> </li>
		
	</ul>
</div>
