<div class="exercises view">
<h2><?php echo __('Exercise: '); echo h($exercise['Exercise']['name']); ?></h2>
<br>
        <dl>
		
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			
		
                <?php if($exercise['Exercise']['videos'] != null) 
                                { 
                                echo $exercise['Exercise']['videos']; 
                               // echo $this->Html->image('files/'.$instruction['image']); 
                                } 
                                else 
                                { 
                                echo "no video available"; 
                               
                                }?>
                
                </dd>
                <dt><?php echo __('Instructions'); ?></dt>
                <dd><?php echo $exercise['Exercise']['instructions']; ?></dd>
                <dt><?php echo __('Start Picture'); ?></dt>
                <dd><?php if($exercise['Exercise']['start_pic'] != null) 
                                { 
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('files/'.$exercise['Exercise']['start_pic'], array('width' => 200, 'height' => 200)); 
                                } 
                                else 
                                { 
                                echo "no image available"; 
                                }
	 
                                ?>&nbsp;</dd>
                <dt><?php echo __('End Picture'); ?></dt>
                <dd><?php if($exercise['Exercise']['end_pic'] != null) 
                                { 
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('files/'.$exercise['Exercise']['end_pic'], array('width' => 200, 'height' => 200)); 
                                } 
                                else 
                                { 
                                echo "no image available"; 
                                }
	 
                                ?>&nbsp;</dd>
                
	</dl>
<br>

<div class="related">
	<?php if (!empty($exercise['BodyPart'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Body Part'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($exercise['BodyPart'] as $bodyPart): ?>
		<tr>
			<td><?php echo $bodyPart['body_part']; ?></td>
                </tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<?php if (!empty($exercise['Category'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Category'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($exercise['Category'] as $category): ?>
		<tr>
			<td><?php echo $category['category']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<?php if (!empty($exercise['Equipment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Equipment'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($exercise['Equipment'] as $equipment): ?>
		<tr>
			<td><?php echo $equipment['equipment']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>    
                <li><?php echo $this->Html->link(__('List Exercises'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Exercise'), array('action' => 'edit', $exercise['Exercise']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Exercise'), array('action' => 'delete', $exercise['Exercise']['id']), null, __('Are you sure you want to delete # %s? This exercise may be related to many programs', $exercise['Exercise']['name'])); ?> </li>
		
		
	</ul>
</div>
