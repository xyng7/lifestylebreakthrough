
<div class="actions">
    <h4><?php echo __('Exercises'); ?></h4>
</div>
<div class="actions">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul>
        <li><?php echo $this->Html->link(__('New Exercise'), array('action' => 'add')); ?></li>
    </ul>
</div>

<table id="js-datatable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?php echo h('Name'); ?></th>
            <th><?php echo h('Start Picture'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($exercises as $exercise): ?>
            <tr>
                <td><?php echo h($exercise['Exercise']['name']); ?> &nbsp;</td>
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
                
                <td>
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $exercise['Exercise']['id'])); ?>
                    <?php
                    if (AuthComponent::user('role') === 'superadmin') {
                        echo $this->Html->link(__('Edit'), array('action' => 'edit', $exercise['Exercise']['id']));
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
    //    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    //));
    ?>	</p>

<div class="paging">
    <?php
    //echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    //echo $this->Paginator->numbers(array('separator' => ''));
    //echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
</div>
<br>



