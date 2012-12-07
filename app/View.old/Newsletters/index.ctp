<div class="actions">	
    <h4><?php echo __('Newsletter'); ?></h4>
</div>

<div class="actions">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul>
        <li><?php echo $this->Html->link(__('New Newsletter'), array('action' => 'add')); ?></li>
    </ul>
</div>

<table id="js-datatable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?php echo h('Title'); ?></th>
            <th><?php echo h('Content'); ?></th>
            <th><?php echo h('Created Date'); ?></th>
            <th><?php echo h('User'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($newsletters as $newsletter): ?>
            <tr>
                <td><?php echo h($newsletter['Newsletter']['title']); ?>&nbsp;</td>
                <td><?php echo ($newsletter['Newsletter']['content']); ?>&nbsp;</td>
                <td><?php echo $this->Time->format('d-m-Y', h($newsletter['Newsletter']['created'])); ?>&nbsp;</td>
                <td><?php echo h($newsletter['User']['username']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $newsletter['Newsletter']['id'])); ?> <br>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $newsletter['Newsletter']['id'])); ?> <br>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $newsletter['Newsletter']['id']), null, __('Are you sure you want to delete # %s?', $newsletter['Newsletter']['title'])); ?> <br>
                    <?php echo $this->Form->postLink(__('Send'), array('action' => 'send', $newsletter['Newsletter']['id']), null, __('Newsletter has been send', $newsletter['Newsletter']['title'])); ?>
                
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<p>
    <?php
    /*echo $this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));*/
    ?>	</p>



