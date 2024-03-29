<div class="templates index">
    <h4><?php echo __('Templates'); ?></h4>
    <table id="js-datatable" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
               
                <th><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($templates as $template): ?>
                <tr>
                    <td><?php echo h($template['Template']['name']); ?>&nbsp;</td>
                    
                    <td>
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $template['Template']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $template['Template']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $template['Template']['id']), null, __('Are you sure you want to delete # %s?', $template['Template']['name'])); ?>
                    </td></tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p>
        <?php
        /*echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));*/
        ?>	
    </p>
</div>

    <div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Template'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Back'), array('controller' => 'programs', 'action' => 'index')); ?> </li>

    </ul>
</div>
