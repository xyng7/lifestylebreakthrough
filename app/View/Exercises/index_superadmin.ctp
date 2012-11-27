<div class="exercises index">
	<h2><?php echo __('Exercises'); ?></h2>
	<table id="js-datatable" cellpadding="0" cellspacing="0">
	<thead>
            <tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($exercises as $exercise): ?>
	<tr>
		<td><?php echo h($exercise['Exercise']['name']); ?>&nbsp;</td>
		<td style="float: left;">
			<?php echo $this->Html->link(__('Manage Exercise'), array('action' => 'view', $exercise['Exercise']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $exercise['Exercise']['id']), null, __('Are you sure you want to delete # %s? This exercise may be related to many programs', $exercise['Exercise']['name'])); ?>
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
	
        <h3><?php echo __('Actions'); ?> </h3>
    
                <li><?php echo $this->Html->link(__('New Exercise'), array('action' => 'add')); ?></li>
        
                <p>
                <br>
                <br>
                </p>
        
               
        <h3><?php echo __('Other'); ?></h3>
	<ul>
		
		
		<li><?php echo $this->Html->link(__('Manage Body Parts'), array('controller' => 'body_parts', 'action' => 'index')); ?> </li>
		
		<li><?php echo $this->Html->link(__('Manage Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		
		<li><?php echo $this->Html->link(__('Manage Equipment'), array('controller' => 'equipment', 'action' => 'index')); ?> </li>
		
		
	</ul> 
</div>
