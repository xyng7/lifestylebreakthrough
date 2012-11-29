<div class="exercises view">
<h3><?php echo __('Exercise: '); echo h($exercise['Exercise']['name']); ?></h3>
<br>
        <dl>
		<dt><?php echo __('Instructions'); ?></dt>
                <?php echo $exercise['Exercise']['instructions']; ?>
                <br>
                <br>
                <table>
                <tr>
                    <th><?php echo __('Pictures'); ?></th>
                    <th><?php echo __('Video'); ?></th>
                        
                </tr>
		<tr>
                    <td>        
		<dt><?php echo __('Start Picture'); ?></dt>
                <?php if($exercise['Exercise']['start_pic'] != null) 
                                { 
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('../imgfiles/'.$exercise['Exercise']['start_pic'], array('width' => 200, 'height' => 200)); 
                                
                                } 
                                else 
                                { 
                                echo "no image available"; 
                                }
	 
                                ?>&nbsp;
                                <br>
                                <br>
                <dt><?php echo __('End Picture'); ?></dt>
                <dd><?php if($exercise['Exercise']['end_pic'] != null) 
                                { 
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('../imgfiles/'.$exercise['Exercise']['end_pic'], array('width' => 200, 'height' => 200)); 
                                } 
                                else 
                                { 
                                echo "no image available"; 
                                }
	 
                                ?>&nbsp;</dd>
                </td>
		<td>
                <?php if($exercise['Exercise']['videos'] != null) 
                                { 
                                echo $exercise['Exercise']['videos']; 
                               // echo $this->Html->image('files/'.$instruction['image']); 
                                } 
                                else 
                                { 
                                echo "no video available"; 
                               
                                }?>
                
                </td>
                
                
                </tr>
                </table>
                
	</dl>
<br>

<div class="related">
	<?php if (!empty($exercise['BodyPart'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Body Part'); ?></th>
                <th><?php echo __('Category'); ?></th>
                <th><?php echo __('Equipment'); ?></th>
	</tr>
	<tr><td><?php
		
		foreach ($exercise['BodyPart'] as $bodyPart): ?>
		
			<li><?php echo $bodyPart['body_part']; ?></li>
                
	<?php endforeach; ?></td>
                       <td> <?php
		
		foreach ($exercise['Category'] as $category): ?>
		
			<li><?php echo $category['category']; ?></li>
		<?php endforeach; ?></td>
                    <td><?php    foreach ($exercise['Equipment'] as $equipment): ?>
		
			<li><?php echo $equipment['equipment']; ?></li>
		
	<?php endforeach; ?></td>
                        
	</tr>
        </table>
<?php endif; ?>

	
</div>





</div>



<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>    
                <li><?php echo $this->Html->link(__('List Exercises'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Exercise'), array('action' => 'edit', $exercise['Exercise']['id'])); ?> </li>
		<li><?php                     if (AuthComponent::user('role') === 'superadmin') {
                    echo $this->Form->postLink(__('Delete Exercise'), array('action' => 'delete', $exercise['Exercise']['id']), null, __('Are you sure you want to delete # %s? This exercise may be related to many programs', $exercise['Exercise']['name'])); } ?> </li>
		
		
	</ul>
</div>
