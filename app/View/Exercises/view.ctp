<div class="exercises view">
<<<<<<< HEAD
    <h2><?php echo __('Exercise: ');
echo h($exercise['Exercise']['name']);
?></h2>
    <br>
    <dl>
        <dt><?php echo __('Video'); ?></dt>
        <dd>
            <?php
            if ($exercise['Exercise']['videos'] != null) {
                echo $exercise['Exercise']['videos'];
                // echo $this->Html->image('files/'.$instruction['image']); 
            } else {
                echo "no video available";
            }
            ?>
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
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php
                $i = 1;
                foreach ($exercise['Instruction'] as $instruction):
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $instruction['instruction']; ?></td>
                        <td style="width: 100px; hight: 100px;">

                            <?php
                            if ($instruction['image'] != null) {
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('files/' . $instruction['image'], array('width' => 250, 'height' => 250));
                            } else {
                                echo "no image available";
                            }
                            ?>
                            &nbsp;

                        </td>
                        <td>
                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'instructions', 'action' => 'edit', $instruction['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'instructions', 'action' => 'delete', $instruction['id']), null, __('Are you sure you want to delete instruction # %s?', $instruction['instruction'])); 
        ?>
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

        <div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('Add Instruction'), array('controller' => 'instructions', 'action' => 'add', $exercise['Exercise']['id'])); ?> </li>
            </ul>
        </div>
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
                foreach ($exercise['BodyPart'] as $bodyPart):
                    ?>
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
                foreach ($exercise['Category'] as $category):
                    ?>
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
                foreach ($exercise['Equipment'] as $equipment):
                    ?>
                    <tr>
                        <td><?php echo $equipment['equipment']; ?></td>
                    </tr>
            <?php endforeach; ?>
            </table>
<?php endif; ?>

    </div>
=======
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
                                echo $this->Html->image('files/'.$exercise['Exercise']['start_pic'], array('width' => 200, 'height' => 200)); 
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
                                echo $this->Html->image('files/'.$exercise['Exercise']['end_pic'], array('width' => 200, 'height' => 200)); 
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




>>>>>>> f6d68cf349844fd0574c45c99ec385a0ff555df2

</div>



<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>    
        <li><?php echo $this->Html->link(__('List Exercises'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Edit Exercise'), array('action' => 'edit', $exercise['Exercise']['id'])); ?> </li>
        <li><?php                     if (AuthComponent::user('role') === 'superadmin') {
            echo $this->Form->postLink(__('Delete Exercise'), array('action' => 'delete', $exercise['Exercise']['id']), null, __('Are you sure you want to delete # %s? This exercise may be related to many programs', $exercise['Exercise']['name'])); 
        }?> </li>


    </ul>
</div>
