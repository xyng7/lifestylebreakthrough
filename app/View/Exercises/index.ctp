<div class="exercises index">
	<h3><?php echo __('Exercises'); ?></h3>
	<table id="js-datatable" cellpadding="0" cellspacing="0">
	<thead>
            <tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
                        <th><?php echo h('Start Picture'); ?></th>
                        <th><?php echo h('End Picture'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($exercises as $exercise): ?>
	<tr>
		<td><?php echo h($exercise['Exercise']['name']); ?>&nbsp;</td>
                <td><?php if($exercise['Exercise']['start_pic'] != null) 
                                { 
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('files/'.$exercise['Exercise']['start_pic'], array('width' => 50, 'height' => 50)); 
                                } 
                                else 
                                { 
                                echo "no image available"; 
                                }
	 
                                ?>&nbsp;</td>
                <td><?php if($exercise['Exercise']['end_pic'] != null) 
                                { 
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('files/'.$exercise['Exercise']['end_pic'], array('width' => 50, 'height' => 50)); 
                                } 
                                else 
                                { 
                                echo "no image available"; 
                                }
	 
                                ?>&nbsp;</td>
		<td style="float: left;">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $exercise['Exercise']['id'])); echo " ";
                    if (AuthComponent::user('role') === 'superadmin') {
                        echo $this->Html->link(__('Edit'), array('action' => 'edit', $exercise['Exercise']['id']));echo " ";
                        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $exercise['Exercise']['id']), null, __('Are you sure you want to delete # %s? This exercise may be related to many programs', $exercise['Exercise']['name']));
                    }
                    ?>
			
		</td>
	</tr>
     
<?php endforeach; ?>
        </tbody>
	</table>
	<p>
	<?php
	//echo $this->Paginator->counter(array(
	//'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	//));
	?>	</p>

	<div class="paging">
	<?php
	//	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
	//	echo $this->Paginator->numbers(array('separator' => ''));
	//	echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
        <br>
      
</div>
             

                       <div class="actions">
	
      <h3>Actions</h3>
    
              <li><?php echo $this->Html->link(__('New Exercise'), array('action' => 'add')); ?></li>
        
              <p><br><br></p>
                
       <?php 
          if (AuthComponent::user('role') === 'superadmin') {      
        echo "<h3>Other</h3>";
	echo "<ul>";
		
		
		echo "<li>"; echo $this->Html->link(__('Manage Body Parts'), array('controller' => 'body_parts', 'action' => 'index')); echo "</li>";
		
		echo "<li>"; echo $this->Html->link(__('Manage Categories'), array('controller' => 'categories', 'action' => 'index')); echo "</li>";
		
		echo "<li>"; echo $this->Html->link(__('Manage Equipment'), array('controller' => 'equipment', 'action' => 'index')); echo "</li>";
		
		
	echo "</ul>"; 
echo "</div>";
} ?>