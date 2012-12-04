<div class="exercises view">
<h3><?php echo __('Exercise: '); echo h($exercise['Exercise']['name']); ?></h3>
<br>
        <dl>
		<dt><?php echo __('Instructions'); ?></dt>
                <?php echo $exercise['Exercise']['instructions']; ?>
                <br><br>
                   <table>
                <tr>
                    
                    <th><?php echo __('Start Picture'); ?></th>
                    <th><?php echo __('End Picture'); ?></th>    
                </tr>
                <tr>
                    <td>        
		
                <?php if($exercise['Exercise']['start_pic'] != null) 
                                { 
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('files/'.$exercise['Exercise']['start_pic'], array('width' => 220, 'height' => 220)); 
                                } 
                                else 
                                { 
                                echo "no image available"; 
                                }
	 
                                ?>&nbsp;</td>
                    <td><?php if($exercise['Exercise']['end_pic'] != null) 
                                { 
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('files/'.$exercise['Exercise']['end_pic'], array('width' => 220, 'height' => 220)); 
                                } 
                                else 
                                { 
                                echo "no image available"; 
                                }
	 
                                ?>&nbsp;</td>
                </tr>
                </table>
                <table>
                <tr>
                    
                    <th><?php echo __('Video'); ?></th>
                        
                </tr>
		<tr>
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



        </dl>

</div>



