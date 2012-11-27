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
                
                
	</dl>
<br>
<div class="related">

	<?php if (!empty($exercise['Instruction'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<h3><?php echo __('Instructions'); ?></h3>
        <tr>
		<th><?php echo __('Number'); ?></th>
                <th><?php echo __('Instruction'); ?></th>
		<th><?php echo __('Image'); ?></th>
	</tr>
	<?php
		$i = 1;
		foreach ($exercise['Instruction'] as $instruction): ?>
		<tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $instruction['instruction']; ?></td>
			<td style="width: 100px; hight: 100px;">
                            
                                <?php if($instruction['image'] != null) 
                                { 
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('files/'.$instruction['image'], array('width' => 250, 'height' => 250)); 
                                } 
                                else 
                                { 
                                echo "no image available"; 
                                }
	 
                                ?>
			&nbsp;
                            
                        </td>
			
		</tr>
               <?php $i++; ?>
	<?php endforeach; ?>
	</table>
        <?php else: ?>
        <table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('No Instructions'); ?></th>
	</tr>
        </table>
        <?php endif; ?>
    
	
</div>
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

